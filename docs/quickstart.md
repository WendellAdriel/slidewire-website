# Quickstart

- [Create a presentation](#create-a-presentation)
- [Build your slides](#build-your-slides)
- [Register the presentation route](#register-the-presentation-route)
- [Present the deck](#present-the-deck)

This guide walks through the fastest path from a fresh scaffold to a working SlideWire deck.

Before you begin, make sure your app uses Tailwind CSS and includes the SlideWire `@source` entries described in the [installation guide](./installation.md), so the package UI component classes are available in your build.

<a name="create-a-presentation"></a>
## Create a presentation

Generate a starter presentation:

```shell
php artisan make:slidewire demo/product-launch --title="Product Launch"
```

This creates a Blade file in your first configured presentation root.

If you prefer a different starting point, you may scaffold a standalone Markdown deck with `--md` or a composed directory-based deck with `--multi`.

<a name="build-your-slides"></a>
## Build your slides

You may keep a presentation as a simple Blade file, or use the generated Livewire single-file component format.

```blade
<?php

use Livewire\Component;

new class extends Component {
    public string $headline = 'Product Launch';

    public function with(): array
    {
        return [
            'metrics' => [
                'Activation: 62%',
                'Churn: 1.8%',
            ],
        ];
    }
}; ?>

<x-slidewire::deck theme="aurora" transition="fade">
    <x-slidewire::slide>
        <x-slidewire::title-slide
            :title="$headline"
            subtitle="A Blade-first product launch deck"
            overline="SlideWire quickstart"
            speaker="Launch team"
        />
    </x-slidewire::slide>

    <x-slidewire::slide theme="white">
        <x-slidewire::two-column-slide ratio="2:1" gap="xl" align="center">
            <x-slot name="left">
                <x-slidewire::panel
                    title="Launch metrics"
                    overline="Status"
                    footer="Use Blade, slots, and SlideWire primitives together"
                    variant="glass"
                >
                    <div class="space-y-3">
                        @foreach ($metrics as $metric)
                            <x-slidewire::fragment>
                                <p>{{ $metric }}</p>
                            </x-slidewire::fragment>
                        @endforeach
                    </div>
                </x-slidewire::panel>
            </x-slot>

            <x-slot name="right">
                <x-slidewire::agenda-slide
                    title="Deck structure"
                    subtitle="Start with expressive defaults, then customize"
                    style="cards"
                >
                    <x-slidewire::agenda-item index="1" title="Open strong" description="Use title-slide for introductions and chapter cards." style="cards" active />
                    <x-slidewire::agenda-item index="2" title="Compose" description="Layer panels, text, markdown, code, and media as needed." style="cards" />
                </x-slidewire::agenda-slide>
            </x-slot>
        </x-slidewire::two-column-slide>
    </x-slidewire::slide>
</x-slidewire::deck>
```

The compiler supports public Livewire properties and render data returned from `with()`. You may start with raw HTML, or reach for first-party components like `title-slide`, `panel`, `agenda-slide`, and `text` when they reduce repeated layout markup.

<a name="register-the-presentation-route"></a>
## Register the presentation route

```php
use Illuminate\Support\Facades\Route;

Route::slidewire('/slides/product-launch', 'demo/product-launch');
```

<a name="present-the-deck"></a>
## Present the deck

Open `/slides/product-launch` and navigate with the keyboard, by clicking the stage, or by swiping on touch devices.

If you want to customize the deck further, continue with [components reference](./components.md) and [presentation features](./presentation-features.md).
