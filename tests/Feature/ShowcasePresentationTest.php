<?php

declare(strict_types=1);

it('renders the showcase route as a complete slidewire deck', function (): void {
    $response = test()->get('/showcase');

    $response->assertSuccessful()
        ->assertSee('Every SlideWire primitive in one deck.')
        ->assertSee('Title slides set the tone fast.')
        ->assertSee('Variants used in this showcase')
        ->assertSee('Four panel variants cover most presentation surfaces.')
        ->assertSee('Laravel and Livewire in one file')
        ->assertSee('Agenda slides shape the same outline three different ways.')
        ->assertSee('One process, three presentation moods.')
        ->assertSee('Timeline slides cover orientations and item states.')
        ->assertSee('Shared element IDs can keep the same content and only change position.')
        ->assertSee('SlideWire can carry the whole story.')
        ->assertSee('href="/docs"', false)
        ->assertSee('href="/"', false)
        ->assertSee('href="https://github.com/WendellAdriel/slidewire"', false);
});

it('registers the showcase route name', function (): void {
    expect(route(name: 'showcase', absolute: false))->toBe('/showcase');
});

it('exercises the major slidewire features and variations in the showcase deck', function (): void {
    $content = test()->get('/showcase')
        ->assertSuccessful()
        ->getContent();

    expect($content)
        ->toContain('data-theme="aurora"')
        ->toContain('data-theme="white"')
        ->toContain('data-theme="neon"')
        ->toContain('data-theme="sunset"')
        ->toContain('data-theme="default"')
        ->toContain('data-theme="black"')
        ->toContain('data-theme="solarized"')
        ->toContain('data-background-image="/cover.png"')
        ->toContain('data-background-video="https://interactive-examples.mdn.mozilla.net/media/cc0-videos/flower.mp4"')
        ->toContain('data-auto-slide="9000"')
        ->toContain('data-auto-animate="true"')
        ->toContain('data-style="timeline"')
        ->toContain('data-style="connected"')
        ->toContain('data-status="current"')
        ->toContain('data-orientation="vertical"')
        ->toContain('data-orientation="horizontal"')
        ->toContain('data-animation="typewriter"')
        ->toContain('data-fragment-index="2"')
        ->toContain('slide-showcase-02-title-slides-0')
        ->toContain('slide-showcase-01-intro-0')
        ->toContain('Laravel and Livewire in one file');
});
