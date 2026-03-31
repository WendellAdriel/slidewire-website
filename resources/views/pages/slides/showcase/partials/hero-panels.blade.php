<div class="grid gap-4 lg:grid-cols-3">
    <x-slidewire::panel variant="glass" padding="md" title="Deck defaults" overline="Runtime">
        <p class="text-base leading-7 text-cyan-50/85 sm:text-sm sm:leading-6">
            Controls, progress, fullscreen, touch, keyboard, and shared transitions are enabled so the deck behaves like a presentation, not a static page.
        </p>
    </x-slidewire::panel>

    <x-slidewire::panel variant="glass" padding="md" title="Theme coverage" overline="Built in">
        <p class="text-base leading-7 text-cyan-50/85 sm:text-sm sm:leading-6">
            Aurora, white, neon, sunset, default, black, and solarized all appear as real slide themes across the deck.
        </p>
    </x-slidewire::panel>

    <x-slidewire::panel variant="glass" padding="md" title="Use it like a speaker" overline="Navigation">
        <div class="space-y-2 text-base leading-7 text-cyan-50/85 sm:text-sm sm:leading-6">
            <x-slidewire::fragment>
                <p>Press Space or click to advance.</p>
            </x-slidewire::fragment>
            <x-slidewire::fragment :index="1">
                <p>Use arrows or swipe to change direction.</p>
            </x-slidewire::fragment>
            <x-slidewire::fragment :index="2">
                <p>Watch for a vertical drill-down later in the deck.</p>
            </x-slidewire::fragment>
        </div>
    </x-slidewire::panel>
</div>
