<?php

declare(strict_types=1);

use App\Support\Docs\DocsRepository;

it('renders the docs index from docs readme', function (): void {
    test()->get('/docs')
        ->assertSuccessful()
        ->assertSee('SlideWire documentation')
        ->assertSee('SlideWire is a Laravel package for building presentation decks with Livewire.')
        ->assertSee('href="/docs/installation"', false)
        ->assertSee('href="/docs/quickstart"', false)
        ->assertSee('href="/docs/routing"', false)
        ->assertSee('href="/docs/remote-control"', false)
        ->assertDontSee('<h2 id="introduction">Introduction</h2>', false)
        ->assertDontSee('href="#introduction"', false);
});

it('embeds the overview video and credits Eric L. Barnes on the docs index', function (): void {
    test()->get('/docs')
        ->assertSuccessful()
        ->assertSee('Overview video')
        ->assertSee('This video offers a quick overview of the package and walks through the core SlideWire workflow.')
        ->assertSee('src="https://www.youtube.com/embed/BazsWOLl-G4"', false)
        ->assertSee('href="https://x.com/ericlbarnes" target="_blank" rel="noreferrer noopener"', false)
        ->assertSee('href="https://laravel-news.com/" target="_blank" rel="noreferrer noopener"', false)
        ->assertSee('Showcase presentation')
        ->assertSee('SlideWire in action')
        ->assertSee('href="/showcase" target="_blank" rel="noreferrer noopener"', false)
        ->assertSee('Open the showcase presentation')
        ->assertSee('Eric L. Barnes')
        ->assertSee('Laravel News');
});

it('removes duplicated lead copy from individual docs pages', function (): void {
    test()->get('/docs/installation')
        ->assertSuccessful()
        ->assertSee('SlideWire installs like a typical Laravel package.')
        ->assertDontSee('<article class="docs-prose" data-docs-article><p>SlideWire installs like a typical Laravel package.', false);
});

it('renders an individual docs page from markdown', function (): void {
    test()->get('/docs/installation')
        ->assertSuccessful()
        ->assertSee('Installation')
        ->assertSee('SlideWire installs like a typical Laravel package.')
        ->assertSee('SlideWire registers its service provider automatically')
        ->assertSee('synthwave-84', false)
        ->assertDontSee('line-number', false);
});

it('rewrites internal markdown links to docs routes', function (): void {
    test()->get('/docs/installation')
        ->assertSuccessful()
        ->assertSee('href="/docs/quickstart"', false)
        ->assertSee('href="/docs/building"', false)
        ->assertDontSee('href="./quickstart.md"', false);
});

it('documents the supported stack and upgrade steps for version 1.5.0', function (): void {
    $content = test()->get('/docs/installation')
        ->assertSuccessful()
        ->assertSee('^12.0')
        ->assertSee('^13.0')
        ->assertSee('^4.2')
        ->assertSee('Upgrading to 1.5.0')
        ->assertSee('href="#upgrading-to-150"', false)
        ->assertSee('id="upgrading-to-150"', false)
        ->assertSee('href="/docs/remote-control"', false)
        ->assertSee('overwrites your customizations')
        ->getContent();

    expect(html_entity_decode(strip_tags((string) $content)))->toContain('composer require wendelladriel/slidewire:"^1.5"');
});

it('returns 404 for unknown docs pages', function (): void {
    test()->get('/docs/not-real')->assertNotFound();
});

it('keeps the docs route name stable', function (): void {
    expect(route(name: 'docs', absolute: false))->toBe('/docs');
});

it('exposes branded docs chrome', function (): void {
    expect(DocsRepository::CURRENT_VERSION)->toBe('v1.5.0');

    $content = test()->get('/docs')
        ->assertSuccessful()
        ->assertSee('data-docs-sidebar', false)
        ->assertSee('data-docs-mobile-toggle', false)
        ->assertSee('data-docs-toc', false)
        ->assertSee('data-docs-version-mobile', false)
        ->assertSee('data-docs-version-desktop', false)
        ->assertSee('wire:navigate', false)
        ->assertSee('SlideWire Docs')
        ->assertSee(DocsRepository::CURRENT_VERSION)
        ->getContent();

    expect(substr_count((string) $content, DocsRepository::CURRENT_VERSION))->toBeGreaterThanOrEqual(2);
});

it('renders heading anchors and readme next navigation', function (): void {
    $content = test()->get('/docs')
        ->assertSuccessful()
        ->assertSee('id="available-guides"', false)
        ->assertSee('href="/docs/installation"', false)
        ->assertSee('href="/docs/changelog"', false)
        ->assertSee('Next', false)
        ->getContent();

    $overviewPosition = strpos((string) $content, 'href="/docs"');
    $changelogPosition = strpos((string) $content, 'href="/docs/changelog"');
    $installationPosition = strpos((string) $content, 'href="/docs/installation"');

    expect($overviewPosition)->not->toBeFalse();
    expect($changelogPosition)->not->toBeFalse();
    expect($installationPosition)->not->toBeFalse();
    expect($overviewPosition)->toBeLessThan($changelogPosition);
    expect($changelogPosition)->toBeLessThan($installationPosition);
});

it('renders the changelog page from markdown', function (): void {
    test()->get('/docs/changelog')
        ->assertSuccessful()
        ->assertSee('Changelog')
        ->assertSee('SlideWire follows semantic versioning.')
        ->assertSee('v1.5.0')
        ->assertSee('remote presenter control')
        ->assertSee('href="/docs/remote-control"', false)
        ->assertSee('https://github.com/WendellAdriel/slidewire/compare/v1.4.2...v1.5.0')
        ->assertSee('v1.4.2')
        ->assertSee('active slides aligned after repeated presentation navigation')
        ->assertSee('stale frame transition animations')
        ->assertSee('v1.4.1')
        ->assertSee('default presentation styling for standalone Markdown slides')
        ->assertSee('typography and list styling')
        ->assertSee('v1.4.0')
        ->assertSee('Markdown presentations')
        ->assertSee('multi-file presentations')
        ->assertSee('v1.3.2')
        ->assertSee('config caching')
        ->assertSee('DTO config serialization')
        ->assertSee('v1.3.1')
        ->assertSee('media split layout')
        ->assertSee('v1.3.0')
        ->assertSee('first-party set of presentation-ready UI components')
        ->assertSee('per-instance')
        ->assertSee('font')
        ->assertSee('v1.1.0')
        ->assertSee('Added a')
        ->assertSee('semantic headings')
        ->assertSee('native image API')
        ->assertSee('v1.0.1')
        ->assertSee('Fixed slide overflow on smaller screens.');
});

it('includes fathom analytics on docs pages in production', function (): void {
    app()->detectEnvironment(fn (): string => 'production');

    test()->get('/docs')
        ->assertSuccessful()
        ->assertSee('src="https://cdn.usefathom.com/script.js"', false)
        ->assertSee('data-site="CSCGEHNX"', false);
});

it('does not include analytics on docs pages outside production', function (): void {
    app()->detectEnvironment(fn (): string => 'local');

    test()->get('/docs')
        ->assertSuccessful()
        ->assertDontSee('src="https://cdn.usefathom.com/script.js"', false)
        ->assertDontSee('data-site="CSCGEHNX"', false);
});

it('documents the new layout, text, and image components in the components reference', function (): void {
    test()->get('/docs/components')
        ->assertSuccessful()
        ->assertSee('Panel')
        ->assertSee('Title slide')
        ->assertSee('Two column slide')
        ->assertSee('Media split slide')
        ->assertSee('Timeline slide')
        ->assertSee('Steps slide')
        ->assertSee('Agenda slide')
        ->assertSee('Text')
        ->assertSee('Image')
        ->assertSee('font')
        ->assertSee('orientation')
        ->assertSee('animation')
        ->assertSee('animation-speed')
        ->assertSee('loading')
        ->assertSee('alt')
        ->assertSee('media-position')
        ->assertSee('media-style')
        ->assertDontSee('Speaker slide');
});

it('updates the quickstart guide with first-party ui components', function (): void {
    test()->get('/docs/quickstart')
        ->assertSuccessful()
        ->assertSee('title-slide')
        ->assertSee('panel')
        ->assertSee('agenda-slide')
        ->assertSee('two-column-slide')
        ->assertSee('--md')
        ->assertSee('--multi');
});

it('documents markdown and composed presentations in the workflow and routing guides', function (): void {
    test()->get('/docs/building')
        ->assertSuccessful()
        ->assertSee('Markdown presentations')
        ->assertSee('Composed presentations')
        ->assertSee('highlight-theme: catppuccin-mocha')
        ->assertSee('deck.blade.php')
        ->assertSee('02-agenda.md');

    test()->get('/docs/routing')
        ->assertSuccessful()
        ->assertSee('Blade files, Markdown decks, or composed presentation directories')
        ->assertSee('{presentation}.md')
        ->assertSee('{presentation}/')
        ->assertDontSee('Standalone Markdown presentation files are not currently resolved');
});

it('documents markdown and multi-file scaffolding in the commands guide', function (): void {
    test()->get('/docs/commands')
        ->assertSuccessful()
        ->assertSee('Markdown decks')
        ->assertSee('Multi-file decks')
        ->assertSee('{--md : Create a standalone Markdown deck}')
        ->assertSee('{--multi : Create a multi-file deck}')
        ->assertSee('deck.blade.php')
        ->assertSee('mutually exclusive');
});

it('documents component-level animations in the presentation features guide', function (): void {
    test()->get('/docs/presentation-features')
        ->assertSuccessful()
        ->assertSee('Component-level animations')
        ->assertSee('fast')
        ->assertSee('slow')
        ->assertSee('zoom-in')
        ->assertSee('slide-up')
        ->assertSee('typewriter')
        ->assertSee('href="/docs/remote-control"', false)
        ->assertSee('locked viewers hide navigation arrows');
});

it('documents remote presenter setup and the session lifecycle', function (): void {
    $content = test()->get('/docs/remote-control')
        ->assertSuccessful()
        ->assertSee('Remote presenter control')
        ->assertSee('SlideWire 1.5.0')
        ->assertSee('Starting a session')
        ->assertSee('Viewer navigation')
        ->assertSee('Session configuration')
        ->assertSee('Ending a session')
        ->assertSee('Troubleshooting')
        ->assertSee('slidewire:remote')
        ->assertSee('This setting applies to all viewers in the session.')
        ->assertSee('Fullscreen remains available')
        ->assertSee('They keep their current slide and revealed fragments.')
        ->assertSee('atomic locks')
        ->assertSee('Keep the controller URL private.')
        ->assertSee('href="/docs/routing"', false)
        ->assertSee('href="/docs/configuration"', false)
        ->assertSee('href="#starting-a-session"', false)
        ->assertSee('id="starting-a-session"', false)
        ->getContent();

    expect(strip_tags((string) $content))->toContain('php artisan slidewire:remote pitch --ttl=30m --poll=500ms');
});

it('links remote control between presentation features and configuration', function (): void {
    $page = app(DocsRepository::class)->find('remote-control');

    expect($page)->not->toBeNull()
        ->and($page->previous['slug'])->toBe('presentation-features')
        ->and($page->next['slug'])->toBe('configuration');
});

it('documents remote command options and configuration defaults', function (): void {
    test()->get('/docs/commands')
        ->assertSuccessful()
        ->assertSee('slidewire:remote')
        ->assertSee('{presentation : The presentation key (e.g. pitch)}')
        ->assertSee('{--ttl= : Session TTL using DSL format (e.g. 30m, 2h, 1d)}')
        ->assertSee('{--poll= : Viewer poll interval (e.g. 500ms, 2s)}')
        ->assertSee('href="#slidewireremote"', false)
        ->assertSee('id="slidewireremote"', false)
        ->assertSee('href="/docs/remote-control"', false)
        ->assertDontSee('single scaffolding command');

    test()->get('/docs/configuration')
        ->assertSuccessful()
        ->assertSee('Remote sessions')
        ->assertSee('RemoteConfig')
        ->assertSee('pollInterval')
        ->assertSee('viewerControls')
        ->assertSee('cacheStore')
        ->assertSee('atomic lock support')
        ->assertSee('href="/docs/remote-control"', false);
});
