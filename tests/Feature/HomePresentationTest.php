<?php

declare(strict_types=1);

it('renders the home route as a slidewire presentation', function (): void {
    $response = test()->get('/');

    $response->assertSuccessful()
        ->assertSee('SlideWire')
        ->assertSee('Create beautiful presentations powered by Livewire')
        ->assertSee('src="/slidewire-logo.png"', false)
        ->assertSee('href="/docs"', false)
        ->assertSee('href="https://github.com/WendellAdriel/slidewire"', false)
        ->assertSee('Tip: click anywhere or press Space to continue.')
        ->assertSee('target="_blank"', false)
        ->assertSee('rel="noopener noreferrer"', false);
});

it('keeps the home route name stable', function (): void {
    expect(route(name: 'home', absolute: false))->toBe('/');
});

it('applies the expected deck controls and theme configuration', function (): void {
    $response = test()->get('/');
    $content = $response->getContent();

    $response->assertSuccessful()
        ->assertDontSee('aria-label="Slide controls"', false)
        ->assertDontSee('role="progressbar"', false)
        ->assertDontSee('Enter fullscreen');

    expect($content)
        ->toContain('slidewire-theme-neon')
        ->toContain('data-theme="neon"')
        ->toContain('Sora text-cyan-100 text-lg')
        ->toContain('family=Sora:wght@400;500;600;700')
        ->toContain('JetBrainsMono');
});

it('showcases the major slidewire features on the homepage deck', function (): void {
    $content = test()->get('/')
        ->assertSuccessful()
        ->assertSee('A presentation workflow that still feels like Laravel.')
        ->assertSee('Move through decks in two dimensions.')
        ->assertSee('Transitions and reveals stay focused on the story.')
        ->assertSee('Build decks with Blade, markdown, code, and diagrams.')
        ->assertSee('Brand decks with fonts, backgrounds, and richer visuals out of the box.')
        ->assertSee('SlideWire ships with a Boost AI skill for beautiful deck creation.')
        ->getContent();

    expect($content)
        ->toContain('data-text-type="heading"')
        ->toContain('data-text-type="paragraph"')
        ->toContain('data-style="cards"')
        ->toContain('data-animation="typewriter"');
});

it('includes pirsch analytics on the homepage deck', function (): void {
    test()->get('/')
        ->assertSuccessful()
        ->assertSee('src="https://api.pirsch.io/pa.js"', false)
        ->assertSee('id="pianjs"', false)
        ->assertSee('data-code="hOO5Fej7RTPRYHpp7NYLPc2zdvBaqYEv"', false);
});
