<?php

declare(strict_types=1);

namespace App\Support\Docs;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Phiki\Adapters\Laravel\Facades\Phiki;
use Phiki\Theme\Theme;
use Throwable;

/**
 * @phpstan-type DocsNavigationItem array{slug: string, title: string, url: string}
 * @phpstan-type DocsHeading array{id: string, text: string, level: int}
 */
final readonly class DocsRepository
{
    public const CURRENT_VERSION = 'v1.2.0';

    private string $docsPath;

    public function __construct(?string $docsPath = null)
    {
        $this->docsPath = $docsPath ?? base_path('docs');
    }

    public function find(?string $slug = null): ?DocsPage
    {
        $slug = $this->normalizeSlug($slug);
        $files = $this->pageFiles();
        $file = $files[$slug] ?? null;

        if ($file === null) {
            return null;
        }

        $markdown = file_get_contents($file);

        if ($markdown === false) {
            return null;
        }

        $navigation = $this->navigation();
        $position = array_search($slug, array_column($navigation, 'slug'), true);

        [$html, $headings] = $this->render($markdown, $slug);

        return new DocsPage(
            slug: $slug,
            title: $this->pageTitle($slug, $markdown),
            description: $this->pageDescription($markdown),
            markdown: $markdown,
            html: new HtmlString($html),
            navigation: $navigation,
            headings: $headings,
            previous: $position === false || $position === 0 ? null : $navigation[$position - 1],
            next: $position === false || $position === count($navigation) - 1 ? null : $navigation[$position + 1],
        );
    }

    /**
     * @return array<int, DocsNavigationItem>
     */
    public function navigation(): array
    {
        $labels = $this->readmeLabels();

        return array_map(function (string $slug) use ($labels): array {
            $file = $this->pageFiles()[$slug];
            $markdown = file_get_contents($file) ?: '';

            return [
                'slug' => $slug,
                'title' => $labels[$slug] ?? $this->pageTitle($slug, $markdown),
                'url' => $slug === ''
                    ? route('docs', absolute: false)
                    : route('docs.page', ['page' => $slug], false),
            ];
        }, $this->orderedSlugs());
    }

    /**
     * @return array<string, string>
     */
    private function pageFiles(): array
    {
        return once(function (): array {
            $files = glob($this->docsPath . '/*.md') ?: [];
            $pages = [];

            foreach ($files as $file) {
                $name = pathinfo($file, PATHINFO_FILENAME);
                $slug = $name === 'README' ? '' : $this->normalizeSlug($name);
                $pages[$slug] = $file;
            }

            ksort($pages);

            return $pages;
        });
    }

    /**
     * @return array<int, string>
     */
    private function orderedSlugs(): array
    {
        return once(function (): array {
            $slugs = [''];

            foreach (array_keys($this->readmeLabels()) as $slug) {
                if (array_key_exists($slug, $this->pageFiles()) && ! in_array($slug, $slugs, true)) {
                    $slugs[] = $slug;
                }
            }

            foreach (array_keys($this->pageFiles()) as $slug) {
                if (! in_array($slug, $slugs, true)) {
                    $slugs[] = $slug;
                }
            }

            return $slugs;
        });
    }

    /**
     * @return array<string, string>
     */
    private function readmeLabels(): array
    {
        return once(function (): array {
            $readme = $this->pageFiles()[''] ?? null;

            if ($readme === null) {
                return [];
            }

            $markdown = file_get_contents($readme) ?: '';
            preg_match_all('/^\-\s+\[([^\]]+)\]\(\.\/([^\)#]+)\.md(?:#[^)]+)?\)$/m', $markdown, $matches, PREG_SET_ORDER);

            $labels = ['' => 'Overview'];

            foreach ($matches as $match) {
                $labels[$this->normalizeSlug($match[2])] = trim($match[1]);
            }

            return $labels;
        });
    }

    private function pageTitle(string $slug, string $markdown): string
    {
        if (preg_match('/^#\s+(.+)$/m', $markdown, $matches) === 1) {
            return trim($matches[1]);
        }

        return $slug === '' ? 'SlideWire documentation' : Str::headline($slug);
    }

    private function pageDescription(string $markdown): string
    {
        foreach (preg_split('/\R/', $markdown) ?: [] as $line) {
            $line = trim($line);

            if ($line === '') {
                continue;
            }

            if (Str::startsWith($line, ['#', '- [', '<a ', '```', '> [!'])) {
                continue;
            }

            return (string) Str::of($line)->squish();
        }

        return 'Documentation for building presentation experiences with SlideWire.';
    }

    /**
     * @return array{0: string, 1: array<int, DocsHeading>}
     */
    private function render(string $markdown, string $slug): array
    {
        $html = Str::markdown($markdown, [
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);

        $dom = new DOMDocument('1.0', 'UTF-8');
        $previousErrors = libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="utf-8" ?><div id="docs-root">' . $html . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        libxml_use_internal_errors($previousErrors);

        $xpath = new DOMXPath($dom);
        $root = $xpath->query('//*[@id="docs-root"]')->item(0);

        if (! $root instanceof DOMElement) {
            return [$html, []];
        }

        $this->rewriteLinks($xpath);
        $this->transformVideoEmbeds($xpath, $dom);
        $this->transformBlockquotes($xpath, $dom);
        $this->highlightCodeBlocks($xpath, $dom);
        $this->removeDuplicateLeadContent($xpath, $markdown);
        $this->removeOverviewIntroList($xpath, $slug);
        $this->removeEmptyParagraphs($xpath);
        $headings = $this->hydrateHeadings($xpath);

        return [$this->innerHtml($root), $headings];
    }

    private function removeOverviewIntroList(DOMXPath $xpath, string $slug): void
    {
        if ($slug !== '') {
            return;
        }

        $heading = $xpath->query('//*[@id="docs-root"]/h1[1]')->item(0);

        if (! $heading instanceof DOMElement) {
            return;
        }

        $candidate = $heading->nextSibling;

        while ($candidate !== null && ! $candidate instanceof DOMElement) {
            $candidate = $candidate->nextSibling;
        }

        if (! $candidate instanceof DOMElement || $candidate->tagName !== 'ul') {
            return;
        }

        $links = $xpath->query('.//a[@href]', $candidate);

        if ($links === false || $links->length === 0) {
            return;
        }

        $heading->parentNode?->removeChild($heading);
        $candidate->parentNode?->removeChild($candidate);
    }

    private function removeDuplicateLeadContent(DOMXPath $xpath, string $markdown): void
    {
        $description = $this->pageDescription($markdown);

        if ($description === '') {
            return;
        }

        $root = $xpath->query('//*[@id="docs-root"]')->item(0);

        if (! $root instanceof DOMElement) {
            return;
        }

        $children = [];

        foreach ($root->childNodes as $child) {
            if ($child instanceof DOMElement) {
                $children[] = $child;
            }
        }

        foreach ($children as $index => $child) {
            if ($child->tagName !== 'p') {
                continue;
            }

            $text = (string) Str::of($child->textContent)->squish();

            if ($text !== $description) {
                continue;
            }

            if ($index > 0) {
                $previous = $children[$index - 1];

                if ($previous->tagName === 'h2' && Str::lower(trim($previous->textContent)) === 'introduction') {
                    $previous->parentNode?->removeChild($previous);
                }
            }

            $child->parentNode?->removeChild($child);

            return;
        }
    }

    /**
     * @return array<int, DocsHeading>
     */
    private function hydrateHeadings(DOMXPath $xpath): array
    {
        $nodes = [];

        foreach ($xpath->query('//*[@id="docs-root"]//h2 | //*[@id="docs-root"]//h3') as $heading) {
            if ($heading instanceof DOMElement) {
                $nodes[] = $heading;
            }
        }

        $used = [];
        $headings = [];

        foreach ($nodes as $heading) {
            $text = trim($heading->textContent);

            if ($text === '') {
                continue;
            }

            $id = $this->uniqueHeadingId((string) Str::slug($text), $used);
            $heading->setAttribute('id', $id);

            $headings[] = [
                'id' => $id,
                'text' => $text,
                'level' => (int) substr($heading->tagName, 1),
            ];
        }

        return $headings;
    }

    private function rewriteLinks(DOMXPath $xpath): void
    {
        $links = [];

        foreach ($xpath->query('//*[@id="docs-root"]//a[@href]') as $link) {
            if ($link instanceof DOMElement) {
                $links[] = $link;
            }
        }

        foreach ($links as $link) {
            $href = trim($link->getAttribute('href'));

            if ($href === '') {
                continue;
            }

            if (Str::startsWith($href, ['http://', 'https://'])) {
                $link->setAttribute('target', '_blank');
                $link->setAttribute('rel', 'noreferrer noopener');

                continue;
            }

            if (Str::startsWith($href, ['mailto:', '#'])) {
                continue;
            }

            if (preg_match('/^(?:\.\/)?([^#]+)\.md(#[^?]+)?$/', $href, $matches) !== 1) {
                continue;
            }

            $target = strtolower(pathinfo($matches[1], PATHINFO_FILENAME));
            $anchor = $matches[2] ?? '';

            if ($target === 'readme') {
                $link->setAttribute('href', route('docs', absolute: false) . $anchor);

                continue;
            }

            $slug = $this->normalizeSlug($target);

            if (! array_key_exists($slug, $this->pageFiles())) {
                continue;
            }

            $link->setAttribute('href', route('docs.page', ['page' => $slug], false) . $anchor);
        }
    }

    private function transformVideoEmbeds(DOMXPath $xpath, DOMDocument $dom): void
    {
        $paragraphs = [];

        foreach ($xpath->query('//*[@id="docs-root"]//p') as $paragraph) {
            if ($paragraph instanceof DOMElement) {
                $paragraphs[] = $paragraph;
            }
        }

        foreach ($paragraphs as $paragraph) {
            $link = $this->standaloneParagraphLink($paragraph);

            if (! $link instanceof DOMElement) {
                continue;
            }

            $embedUrl = $this->youtubeEmbedUrl($link->getAttribute('href'));

            if ($embedUrl === null) {
                continue;
            }

            $this->replaceNodeWithHtml($dom, $paragraph, $this->renderVideoEmbed($embedUrl));
        }
    }

    private function standaloneParagraphLink(DOMElement $paragraph): ?DOMElement
    {
        $link = null;

        foreach ($paragraph->childNodes as $child) {
            if ($child instanceof DOMElement) {
                if ($child->tagName !== 'a' || $link instanceof DOMElement) {
                    return null;
                }

                $link = $child;

                continue;
            }

            if (trim($child->textContent) !== '') {
                return null;
            }
        }

        return $link;
    }

    private function youtubeEmbedUrl(string $url): ?string
    {
        $parts = parse_url($url);

        if (! is_array($parts)) {
            return null;
        }

        $host = Str::lower($parts['host'] ?? '');
        $path = trim($parts['path'] ?? '', '/');

        if ($host === 'youtu.be' && $path !== '') {
            return 'https://www.youtube.com/embed/' . $path;
        }

        if (! in_array($host, ['youtube.com', 'www.youtube.com'], true)) {
            return null;
        }

        if ($path === 'watch') {
            parse_str($parts['query'] ?? '', $query);

            if (! is_string($query['v'] ?? null) || $query['v'] === '') {
                return null;
            }

            return 'https://www.youtube.com/embed/' . $query['v'];
        }

        if (Str::startsWith($path, ['embed/', 'shorts/'])) {
            $segments = explode('/', $path);
            $videoId = $segments[1] ?? null;

            if (! is_string($videoId) || $videoId === '') {
                return null;
            }

            return 'https://www.youtube.com/embed/' . $videoId;
        }

        return null;
    }

    private function renderVideoEmbed(string $embedUrl): string
    {
        return sprintf(
            '<div class="docs-video-embed"><iframe src="%s" title="SlideWire overview video" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>',
            e($embedUrl),
        );
    }

    private function transformBlockquotes(DOMXPath $xpath, DOMDocument $dom): void
    {
        $quotes = [];

        foreach ($xpath->query('//*[@id="docs-root"]//blockquote') as $quote) {
            if ($quote instanceof DOMElement) {
                $quotes[] = $quote;
            }
        }

        foreach ($quotes as $quote) {
            $firstParagraph = $quote->firstChild;

            while ($firstParagraph !== null && ! $firstParagraph instanceof DOMElement) {
                $firstParagraph = $firstParagraph->nextSibling;
            }

            if (! $firstParagraph instanceof DOMElement) {
                continue;
            }

            if ($firstParagraph->tagName !== 'p') {
                continue;
            }

            $text = trim($firstParagraph->textContent);

            if (preg_match('/^\[!(NOTE|TIP|WARNING)\]\s*(.*)$/s', $text, $matches) !== 1) {
                continue;
            }

            $type = strtolower($matches[1]);
            $body = trim($matches[2]);

            if ($body === '') {
                $quote->removeChild($firstParagraph);
            } else {
                $firstParagraph->nodeValue = $body;
            }

            $this->replaceNodeWithHtml($dom, $quote, $this->renderCallout($quote, $type, $matches[1]));
        }
    }

    private function renderCallout(DOMElement $quote, string $type, string $label): string
    {
        $configuration = match ($type) {
            'warning' => ['color' => 'amber', 'icon' => 'exclamation-triangle'],
            'tip' => ['color' => 'violet', 'icon' => 'sparkles'],
            default => ['color' => 'cyan', 'icon' => 'information-circle'],
        };

        return Blade::render(<<<'BLADE'
            <div class="docs-callout docs-callout-{{ $type }}">
                <div class="docs-callout-header">
                    <div class="docs-callout-icon">
                        <flux:icon :name="$icon" class="size-6" />
                    </div>

                    <div class="docs-callout-title">{{ $label }}</div>
                </div>

                <div class="docs-callout-body">{!! $content !!}</div>
            </div>
            BLADE, [
            'icon' => $configuration['icon'],
            'label' => $label,
            'type' => $type,
            'content' => $this->innerHtml($quote),
        ], deleteCachedView: true);
    }

    private function removeEmptyParagraphs(DOMXPath $xpath): void
    {
        $paragraphs = [];

        foreach ($xpath->query('//*[@id="docs-root"]//p') as $paragraph) {
            if ($paragraph instanceof DOMElement) {
                $paragraphs[] = $paragraph;
            }
        }

        foreach ($paragraphs as $paragraph) {
            if (trim($paragraph->textContent) === '' && $paragraph->childNodes->count() === 0) {
                $paragraph->parentNode?->removeChild($paragraph);
            }
        }
    }

    private function highlightCodeBlocks(DOMXPath $xpath, DOMDocument $dom): void
    {
        $blocks = [];

        foreach ($xpath->query('//*[@id="docs-root"]//pre/code') as $code) {
            if ($code instanceof DOMElement) {
                $blocks[] = $code;
            }
        }

        foreach ($blocks as $code) {
            $pre = $code->parentNode;

            if (! $pre instanceof DOMElement) {
                continue;
            }

            $grammar = 'text';

            if (preg_match('/language-([A-Za-z0-9_+#.-]+)/', $code->getAttribute('class'), $matches) === 1) {
                $grammar = $matches[1];
            }

            try {
                $source = rtrim(html_entity_decode($code->textContent, ENT_QUOTES | ENT_HTML5, 'UTF-8'), "\r\n");

                $highlighted = (string) Phiki::codeToHtml(
                    $source,
                    $grammar,
                    Theme::Synthwave_84,
                );
            } catch (Throwable) {
                continue;
            }

            $this->replaceNodeWithHtml($dom, $pre, $highlighted);
        }
    }

    private function replaceNodeWithHtml(DOMDocument $dom, DOMNode $node, string $html): void
    {
        $replacement = new DOMDocument('1.0', 'UTF-8');
        $previousErrors = libxml_use_internal_errors(true);
        $replacement->loadHTML('<?xml encoding="utf-8" ?><div id="replacement">' . $html . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        libxml_use_internal_errors($previousErrors);

        $xpath = new DOMXPath($replacement);
        $wrapper = $xpath->query('//*[@id="replacement"]')->item(0);

        if (! $wrapper instanceof DOMElement || ! $node->parentNode instanceof DOMNode) {
            return;
        }

        foreach (iterator_to_array($wrapper->childNodes) as $child) {
            $node->parentNode->insertBefore($dom->importNode($child, true), $node);
        }

        $node->parentNode->removeChild($node);
    }

    private function innerHtml(DOMElement $element): string
    {
        $html = '';

        foreach ($element->childNodes as $child) {
            $html .= $element->ownerDocument->saveHTML($child);
        }

        return $html;
    }

    /**
     * @param  array<string, int>  $used
     */
    private function uniqueHeadingId(string $id, array &$used): string
    {
        $id = $id !== '' ? $id : 'section';

        if (! array_key_exists($id, $used)) {
            $used[$id] = 1;

            return $id;
        }

        ++$used[$id];

        return sprintf('%s-%d', $id, $used[$id]);
    }

    private function normalizeSlug(?string $slug): string
    {
        return Str::of((string) $slug)
            ->lower()
            ->replace('\\', '/')
            ->replace('..', '')
            ->trim('/')
            ->value();
    }
}
