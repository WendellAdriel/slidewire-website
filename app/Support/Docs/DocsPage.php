<?php

declare(strict_types=1);

namespace App\Support\Docs;

use Illuminate\Support\HtmlString;

/**
 * @phpstan-type DocsNavigationItem array{slug: string, title: string, url: string}
 * @phpstan-type DocsHeading array{id: string, text: string, level: int}
 */
final readonly class DocsPage
{
    /**
     * @param  array<int, DocsNavigationItem>  $navigation
     * @param  array<int, DocsHeading>  $headings
     * @param  DocsNavigationItem|null  $previous
     * @param  DocsNavigationItem|null  $next
     */
    public function __construct(
        public string $slug,
        public string $title,
        public string $description,
        public string $markdown,
        public HtmlString $html,
        public array $navigation,
        public array $headings,
        public ?array $previous,
        public ?array $next,
    ) {
        //
    }

    public function url(): string
    {
        if ($this->slug === '') {
            return route('docs', absolute: false);
        }

        return route('docs.page', ['page' => $this->slug], false);
    }

    public function metaTitle(): string
    {
        if ($this->slug === '') {
            return 'SlideWire Docs';
        }

        return sprintf('%s - SlideWire Docs', $this->title);
    }
}
