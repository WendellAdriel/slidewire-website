# Quickstart

- [Create a presentation](#create-a-presentation)
- [Build your slides](#build-your-slides)
- [Register the presentation route](#register-the-presentation-route)
- [Present the deck](#present-the-deck)

This guide walks through the fastest path from a fresh scaffold to a working SlideWire deck.

<a name="create-a-presentation"></a>
## Create a presentation

Generate a starter presentation:

```shell
php artisan make:slidewire demo/product-launch --title="Product Launch"
```

This creates a Blade file in your first configured presentation root.

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
        <div class="mx-auto max-w-5xl space-y-6">
            <flux:heading size="xl">{{ $headline }}</flux:heading>

            <x-slidewire::fragment :index="0">
                <flux:text>Private beta is complete.</flux:text>
            </x-slidewire::fragment>

            <x-slidewire::fragment :index="1">
                <flux:text>Pilot customers are now live.</flux:text>
            </x-slidewire::fragment>
        </div>
    </x-slidewire::slide>

    <x-slidewire::slide theme="white">
        <div class="mx-auto max-w-4xl space-y-6">
            <x-slidewire::markdown>
## Launch metrics

@foreach ($metrics as $metric)
- {{ $metric }}
@endforeach
            </x-slidewire::markdown>
        </div>
    </x-slidewire::slide>
</x-slidewire::deck>
```

The compiler supports public Livewire properties and render data returned from `with()`.

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
