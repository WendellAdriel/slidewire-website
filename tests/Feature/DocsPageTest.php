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
    test()->get('/docs')
        ->assertSuccessful()
        ->assertSee('id="available-guides"', false)
        ->assertSee('href="/docs/installation"', false)
        ->assertSee('Next', false);
});
