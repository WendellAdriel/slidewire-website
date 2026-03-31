<x-slidewire::slide
    theme="aurora"
    transition="zoom"
    transition-speed="slow"
    class="relative overflow-hidden"
>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(110,231,183,0.18),transparent_30%),radial-gradient(circle_at_top_right,rgba(34,211,238,0.16),transparent_28%),radial-gradient(circle_at_bottom,rgba(16,185,129,0.14),transparent_35%)]"></div>
    <div class="absolute inset-0 opacity-25 [background-image:linear-gradient(rgba(255,255,255,0.07)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.07)_1px,transparent_1px)] [background-size:3.5rem_3.5rem]"></div>
    <div class="absolute inset-x-0 top-0 h-40 bg-gradient-to-b from-white/8 to-transparent"></div>
    <div class="mx-auto flex min-h-full w-full max-w-6xl flex-col justify-between gap-8">
        <x-slidewire::title-slide
            title="Every SlideWire primitive in one deck."
            subtitle="A modern Laravel and Livewire showcase built to exercise themes, components, motion, media, layout helpers, and presenter-focused flow."
            overline="SlideWire showcase"
            speaker="Laravel + Livewire"
            event="Feature tour"
            date="Mon Mar 23 2026"
            variant="hero"
            align="center"
        />

        @include('pages.slides.showcase.partials.hero-panels')
    </div>
</x-slidewire::slide>

<x-slidewire::slide theme="neon" transition="convex">
    <div class="mx-auto flex min-h-full w-full max-w-6xl flex-col justify-center gap-8">
        <div class="space-y-4">
            <x-slidewire::text type="inline" animation="fade" class="text-sm uppercase tracking-[0.35em] text-cyan-200/75">Panel component</x-slidewire::text>
            <x-slidewire::text type="heading" animation="slide-up" class="max-w-[24ch] text-5xl font-semibold tracking-tight text-white text-balance sm:text-4xl">
                Four panel variants cover most presentation surfaces.
            </x-slidewire::text>
            <x-slidewire::text class="max-w-[48ch] text-xl text-pretty text-cyan-100/90 sm:text-lg">
                Use default, elevated, outlined, and glass wrappers to frame stats, code, media, and supporting content without rebuilding the shell each time.
            </x-slidewire::text>
        </div>

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            <x-slidewire::panel variant="default" title="Default" overline="Balanced" footer="Padding lg">
                <p class="text-base leading-7 text-cyan-50/85 sm:text-sm sm:leading-6">A flexible surface for most content blocks.</p>
            </x-slidewire::panel>
            <x-slidewire::panel variant="elevated" title="Elevated" overline="Depth" footer="Padding md" padding="md">
                <p class="text-base leading-7 text-cyan-50/85 sm:text-sm sm:leading-6">Add more lift when the card needs stronger emphasis.</p>
            </x-slidewire::panel>
            <x-slidewire::panel variant="outlined" title="Outlined" overline="Crisp" footer="Structured lists">
                <p class="text-base leading-7 text-cyan-50/85 sm:text-sm sm:leading-6">Sharp framing works well on lighter or denser slides.</p>
            </x-slidewire::panel>
            <x-slidewire::panel variant="glass" title="Glass" overline="Atmospheric" footer="Great over media">
                <p class="text-base leading-7 text-cyan-50/85 sm:text-sm sm:leading-6">Keep backgrounds visible while preserving contrast.</p>
            </x-slidewire::panel>
        </div>
    </div>
</x-slidewire::slide>

<x-slidewire::slide theme="sunset" transition="fade">
    <x-slidewire::two-column-slide ratio="2:1" gap="xl" align="center">
        <x-slot name="left">
            <div class="space-y-6">
                <x-slidewire::text type="inline" animation="fade" class="text-sm uppercase tracking-[0.35em] text-orange-100/75">Text and image primitives</x-slidewire::text>
                <x-slidewire::text type="heading" animation="slide-right" class="max-w-[24ch] text-5xl font-semibold tracking-tight text-orange-50 text-balance sm:text-4xl">
                    Semantic wrappers keep motion and typography close to the content.
                </x-slidewire::text>
                <x-slidewire::text animation="blur" animation-speed="slow" class="max-w-[48ch] text-xl text-pretty text-amber-100/90 sm:text-lg">
                    Headings, paragraphs, inline labels, vertical editorial copy, and image entry effects all travel through dedicated SlideWire components.
                </x-slidewire::text>

                <div class="grid gap-4 sm:grid-cols-2">
                    <x-slidewire::panel variant="glass" title="Text types" overline="Heading, inline, paragraph">
                        <div class="space-y-3">
                            <x-slidewire::text type="inline" animation="fade" class="text-sm font-medium text-orange-100/80">Inline label</x-slidewire::text>
                            <x-slidewire::text type="heading" animation="zoom-in" class="text-3xl font-semibold text-orange-50 sm:text-2xl">Heading wrapper</x-slidewire::text>
                            <x-slidewire::text class="text-base text-orange-50/85 sm:text-sm">Paragraph wrapper with built-in animation metadata.</x-slidewire::text>
                        </div>
                    </x-slidewire::panel>

                    <x-slidewire::panel variant="glass" title="Orientation and fonts" overline="Vertical + custom font">
                        <div class="flex items-start gap-4">
                            <x-slidewire::text type="heading" orientation="vertical" animation="slide-up" class="text-2xl font-semibold text-orange-50 sm:text-xl">
                                Livewire
                            </x-slidewire::text>
                            <x-slidewire::text font="JetBrainsMono" animation="typewriter" class="text-base text-orange-50/85 sm:text-sm">
                                blade-first();
                            </x-slidewire::text>
                        </div>
                    </x-slidewire::panel>
                </div>
            </div>
        </x-slot>

        <x-slot name="right">
            <div class="grid gap-4">
                <x-slidewire::image src="/slidewire-logo.png" alt="SlideWire logo" animation="pop" class="mx-auto w-48 drop-shadow-[0_0_40px_rgba(251,146,60,0.3)] sm:w-40" />
                <x-slidewire::panel variant="glass" padding="md" title="Image component" overline="Animation ready">
                    <x-slidewire::image src="/cover.png" alt="SlideWire cover artwork" animation="zoom-out" class="w-full rounded-[1.5rem] border border-white/10" />
                </x-slidewire::panel>
            </div>
        </x-slot>
    </x-slidewire::two-column-slide>
</x-slidewire::slide>
