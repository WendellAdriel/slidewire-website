<?php

declare(strict_types=1);

it('renders the docs placeholder page', function (): void {
    test()->get('/docs')
        ->assertSuccessful()
        ->assertSee('Documentation is coming soon.')
        ->assertSee('This placeholder route is ready for the full SlideWire documentation experience.')
        ->assertSee('href="/"', false)
        ->assertSee('href="https://github.com/WendellAdriel/slidewire"', false);
});

it('keeps the docs route available', function (): void {
    expect(route(name: 'docs', absolute: false))->toBe('/docs');
});
