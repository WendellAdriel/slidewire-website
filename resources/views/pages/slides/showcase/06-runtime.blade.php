<x-slidewire::slide
    theme="default"
    transition="zoom"
    transition-speed="fast"
    auto-slide="9000"
    background="/cover.png"
    background-video="https://interactive-examples.mdn.mozilla.net/media/cc0-videos/flower.mp4"
    background-video-loop="true"
    background-video-muted="true"
    background-size="cover"
    background-position="center"
    background-repeat="no-repeat"
    background-opacity="0.72"
    background-transition="slide"
>
    <div class="mx-auto flex min-h-full w-full max-w-5xl flex-col justify-center gap-8">
        <x-slidewire::panel variant="glass" title="Fragments plus slide metadata" overline="Motion and backgrounds">
            <div class="space-y-4 text-lg text-slate-50/90 sm:text-base">
                <x-slidewire::fragment>
                    <p>This slide uses the `background` shortcut rather than `background-image`.</p>
                </x-slidewire::fragment>
                <x-slidewire::fragment :index="1">
                    <p>It also layers in a muted looping video background behind the visual overlay.</p>
                </x-slidewire::fragment>
                <x-slidewire::fragment :index="2">
                    <p>Fragments reveal in sequence, keeping the speaker focused on one beat at a time.</p>
                </x-slidewire::fragment>
            </div>
        </x-slidewire::panel>

        <div class="flex flex-wrap gap-3 text-sm text-slate-100/85">
            <span class="rounded-full border border-white/15 bg-white/8 px-3 py-1">slide</span>
            <span class="rounded-full border border-white/15 bg-white/8 px-3 py-1">fade</span>
            <span class="rounded-full border border-white/15 bg-white/8 px-3 py-1">zoom</span>
            <span class="rounded-full border border-white/15 bg-white/8 px-3 py-1">convex</span>
            <span class="rounded-full border border-white/15 bg-white/8 px-3 py-1">concave</span>
            <span class="rounded-full border border-white/15 bg-white/8 px-3 py-1">none</span>
        </div>
    </div>
</x-slidewire::slide>

<x-slidewire::slide
    theme="solarized"
    transition="convex"
    auto-animate="true"
    auto-animate-duration="800"
    auto-animate-easing="ease-in-out"
>
    <div class="mx-auto flex min-h-full w-full max-w-6xl flex-col justify-center gap-8">
        <div class="space-y-4">
            <x-slidewire::text type="inline" animation="fade" class="text-sm uppercase tracking-[0.35em] text-amber-700/75">Auto animate - state one</x-slidewire::text>
            <x-slidewire::text type="heading" animation="slide-up" class="max-w-[24ch] text-5xl font-semibold tracking-tight text-slate-800 text-balance sm:text-4xl">
                Shared element IDs can keep the same content and only change position.
            </x-slidewire::text>
        </div>

        <div class="grid gap-6 lg:grid-cols-[0.72fr_1.28fr] lg:items-center">
            <div class="flex justify-center lg:justify-start">
                <x-slidewire::image data-auto-animate-id="card-visual" src="/slidewire-logo.png" alt="SlideWire logo" animation="zoom-in" class="w-48 sm:w-40" />
            </div>

            <div data-auto-animate-id="card-shell" class="rounded-[2rem] border border-slate-900/10 bg-white/70 p-6 shadow-[0_18px_50px_rgba(15,23,42,0.08)]">
                <p data-auto-animate-id="card-kicker" class="text-sm font-medium text-amber-700">Auto-animate demo</p>
                <h3 data-auto-animate-id="card-title" class="mt-3 text-3xl font-semibold text-slate-900 sm:text-2xl">Keep the content stable.</h3>
                <p data-auto-animate-id="card-copy" class="mt-3 max-w-[36ch] text-lg text-slate-700 sm:text-base">The same logo and text block move into a new position on the next slide.</p>
            </div>
        </div>
    </div>
</x-slidewire::slide>

<x-slidewire::slide
    theme="black"
    transition="concave"
    transition-speed="slow"
    auto-animate="true"
    auto-animate-duration="800"
    auto-animate-easing="ease-in-out"
>
    <div class="mx-auto grid min-h-full w-full max-w-6xl gap-8 lg:grid-cols-[1.18fr_0.82fr] lg:items-center">
        <div data-auto-animate-id="card-shell" class="order-2 rounded-[2rem] border border-white/10 bg-black/55 p-8 backdrop-blur lg:order-1">
            <p data-auto-animate-id="card-kicker" class="text-sm font-medium text-cyan-200/80">Auto-animate demo</p>
            <h3 data-auto-animate-id="card-title" class="mt-3 text-5xl font-semibold tracking-tight text-white sm:text-4xl">Keep the content stable.</h3>
            <p data-auto-animate-id="card-copy" class="mt-4 max-w-[40ch] text-xl text-zinc-200 sm:text-lg">
                The same logo and text block move into a new position on the next slide.
            </p>
        </div>

        <div class="order-1 flex justify-center lg:order-2 lg:justify-end">
            <x-slidewire::image data-auto-animate-id="card-visual" src="/slidewire-logo.png" alt="SlideWire logo" animation="slide-right" class="w-64 sm:w-56" />
        </div>
    </div>
</x-slidewire::slide>

<x-slidewire::slide theme="aurora" transition="none">
    <div class="mx-auto flex min-h-full w-full max-w-6xl flex-col justify-center gap-8">
        <x-slidewire::title-slide
            title="SlideWire can carry the whole story."
            subtitle="From title cards to diagrams, media, auto-animate sequences, and polished navigation, the package gives Laravel and Livewire teams a full presentation surface area."
            overline="Minimal variant"
            variant="minimal"
            align="center"
        />

        <div class="flex flex-wrap justify-center gap-4">
            <a href="/docs" class="inline-flex items-center justify-center rounded-full border border-cyan-300/40 bg-cyan-300/15 px-6 py-3 text-sm font-semibold text-cyan-50 transition hover:border-cyan-200 hover:bg-cyan-300/25">
                Explore the docs
            </a>
            <a href="/" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/8 px-6 py-3 text-sm font-semibold text-white/90 transition hover:border-white/25 hover:bg-white/12">
                Back to home deck
            </a>
            <a href="https://github.com/WendellAdriel/slidewire" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-full border border-fuchsia-300/35 bg-fuchsia-300/10 px-6 py-3 text-sm font-semibold text-fuchsia-50 transition hover:border-fuchsia-200 hover:bg-fuchsia-300/20">
                View on GitHub
            </a>
        </div>
    </div>
</x-slidewire::slide>
