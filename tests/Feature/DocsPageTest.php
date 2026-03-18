<?php

declare(strict_types=1);

it('renders the docs index from docs readme', function (): void {
    test()->get('/docs')
        ->assertSuccessful()
        ->assertSee('SlideWire documentation')
        ->assertSee('SlideWire is a Laravel package for building presentation decks with Livewire.')
        ->assertSee('href="/docs/installation"', false)
        ->assertSee('href="/docs/quickstart"', false)
        ->assertSee('href="/docs/routing"', false)
        ->assertDontSee('<h2 id="introduction">Introduction</h2>', false)
        ->assertDontSee('href="#introduction"', false);
});

it('embeds the overview video and credits Eric L. Barnes on the docs index', function (): void {
    test()->get('/docs')
        ->assertSuccessful()
        ->assertSee('Overview video')
        ->assertSee('This video offers a quick overview of the package and walks through the core SlideWire workflow.')
        ->assertSee('src="https://www.youtube.com/embed/BazsWOLl-G4"', false)
        ->assertSee('href="https://x.com/ericlbarnes"', false)
        ->assertSee('href="https://laravel-news.com/"', false)
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

it('returns 404 for unknown docs pages', function (): void {
    test()->get('/docs/not-real')->assertNotFound();
});

it('keeps the docs route name stable', function (): void {
    expect(route(name: 'docs', absolute: false))->toBe('/docs');
});

it('exposes branded docs chrome', function (): void {
    test()->get('/docs')
        ->assertSuccessful()
        ->assertSee('data-docs-sidebar', false)
        ->assertSee('data-docs-mobile-toggle', false)
        ->assertSee('data-docs-toc', false)
        ->assertSee('wire:navigate', false)
        ->assertSee('SlideWire Docs');
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
        ->assertSee('v1.1.0')
        ->assertSee('Added a')
        ->assertSee('semantic headings')
        ->assertSee('native image API')
        ->assertSee('v1.0.1')
        ->assertSee('Fixed slide overflow on smaller screens.');
});

it('includes pirsch analytics on docs pages', function (): void {
    test()->get('/docs')
        ->assertSuccessful()
        ->assertSee('src="https://api.pirsch.io/pa.js"', false)
        ->assertSee('id="pianjs"', false)
        ->assertSee('data-code="hOO5Fej7RTPRYHpp7NYLPc2zdvBaqYEv"', false);
});

it('documents the text and image components in the components reference', function (): void {
    test()->get('/docs/components')
        ->assertSuccessful()
        ->assertSee('Text')
        ->assertSee('Image')
        ->assertSee('orientation')
        ->assertSee('animation')
        ->assertSee('animation-speed')
        ->assertSee('loading')
        ->assertSee('alt');
});

it('documents component-level animations in the presentation features guide', function (): void {
    test()->get('/docs/presentation-features')
        ->assertSuccessful()
        ->assertSee('Component-level animations')
        ->assertSee('fast')
        ->assertSee('slow')
        ->assertSee('zoom-in')
        ->assertSee('slide-up')
        ->assertSee('typewriter');
});
