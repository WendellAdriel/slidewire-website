<x-slidewire::slide theme="white" transition="fade">
    <x-slidewire::two-column-slide ratio="1:1" gap="xl" align="stretch">
        <x-slot name="left">
            <div class="space-y-4">
                <x-slidewire::panel variant="default" title="Code" overline="Controlled highlighting" theme="white">
                    <x-slidewire::code language="blade" font="JetBrainsMono" size="text-sm">
<x-slidewire::slide theme="white" transition="fade">
    <x-slidewire::panel title="Blade first" />
</x-slidewire::slide>
                    </x-slidewire::code>
                </x-slidewire::panel>
            </div>
        </x-slot>

        <x-slot name="right">
            <x-slidewire::panel variant="glass" title="Diagram" overline="Mermaid support" theme="white">
                <x-slidewire::diagram>
flowchart TD
    A[Laravel route] --> B[SlideWire deck]
    B --> C[Livewire runtime]
    C --> D[Themes]
    C --> E[Fragments]
    C --> F[Media]
                </x-slidewire::diagram>
            </x-slidewire::panel>
        </x-slot>
    </x-slidewire::two-column-slide>
</x-slidewire::slide>

<x-slidewire::slide theme="sunset" transition="fade">
    <div class="mx-auto flex min-h-full w-full max-w-6xl flex-col justify-center gap-8">
        <div class="space-y-4">
            <x-slidewire::text type="inline" animation="fade" class="text-sm uppercase tracking-[0.35em] text-orange-100/75">Animation gallery</x-slidewire::text>
            <x-slidewire::text type="heading" animation="slide-up" class="max-w-[24ch] text-5xl font-semibold tracking-tight text-orange-50 text-balance sm:text-4xl">
                Text supports every built-in entry animation, and images share the same motion contract.
            </x-slidewire::text>
        </div>

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5">
            <x-slidewire::panel variant="glass" padding="md"><x-slidewire::text animation="fade" class="text-lg text-orange-50 sm:text-base">fade</x-slidewire::text></x-slidewire::panel>
            <x-slidewire::panel variant="glass" padding="md"><x-slidewire::text animation="pop" class="text-lg text-orange-50 sm:text-base">pop</x-slidewire::text></x-slidewire::panel>
            <x-slidewire::panel variant="glass" padding="md"><x-slidewire::text animation="zoom-in" class="text-lg text-orange-50 sm:text-base">zoom-in</x-slidewire::text></x-slidewire::panel>
            <x-slidewire::panel variant="glass" padding="md"><x-slidewire::text animation="zoom-out" class="text-lg text-orange-50 sm:text-base">zoom-out</x-slidewire::text></x-slidewire::panel>
            <x-slidewire::panel variant="glass" padding="md"><x-slidewire::text animation="typewriter" animation-speed="slow" class="text-lg text-orange-50 sm:text-base">typewriter</x-slidewire::text></x-slidewire::panel>
            <x-slidewire::panel variant="glass" padding="md"><x-slidewire::text animation="slide-left" class="text-lg text-orange-50 sm:text-base">slide-left</x-slidewire::text></x-slidewire::panel>
            <x-slidewire::panel variant="glass" padding="md"><x-slidewire::text animation="slide-right" class="text-lg text-orange-50 sm:text-base">slide-right</x-slidewire::text></x-slidewire::panel>
            <x-slidewire::panel variant="glass" padding="md"><x-slidewire::text animation="slide-up" class="text-lg text-orange-50 sm:text-base">slide-up</x-slidewire::text></x-slidewire::panel>
            <x-slidewire::panel variant="glass" padding="md"><x-slidewire::text animation="slide-down" class="text-lg text-orange-50 sm:text-base">slide-down</x-slidewire::text></x-slidewire::panel>
            <x-slidewire::panel variant="glass" padding="md"><x-slidewire::text animation="blur" class="text-lg text-orange-50 sm:text-base">blur</x-slidewire::text></x-slidewire::panel>
        </div>

        <div class="grid gap-4 sm:grid-cols-3">
            <x-slidewire::panel variant="outlined" padding="md"><x-slidewire::image src="/slidewire-logo.png" alt="Logo fade animation" animation="fade" class="mx-auto w-24" /></x-slidewire::panel>
            <x-slidewire::panel variant="outlined" padding="md"><x-slidewire::image src="/slidewire-logo.png" alt="Logo pop animation" animation="pop" animation-speed="fast" class="mx-auto w-24" /></x-slidewire::panel>
            <x-slidewire::panel variant="outlined" padding="md"><x-slidewire::image src="/slidewire-logo.png" alt="Logo slide-up animation" animation="slide-up" animation-speed="slow" class="mx-auto w-24" /></x-slidewire::panel>
        </div>
    </div>
</x-slidewire::slide>
