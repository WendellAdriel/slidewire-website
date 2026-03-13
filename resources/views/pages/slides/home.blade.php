<?php

use Livewire\Component;

new class() extends Component
{
    //
}; ?>

<x-slidewire::deck
    theme="neon"
    transition="fade"
    show-controls="false"
    show-progress="false"
    show-fullscreen-button="false"
>
    <x-slidewire::slide class="overflow-hidden">
        <div class="mx-auto grid min-h-full w-full max-w-6xl gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
            <div class="space-y-6 lg:space-y-8">
                <div class="inline-flex items-center gap-3 rounded-full border border-white/15 bg-white/8 px-4 py-2 text-sm font-medium uppercase tracking-[0.3em] text-cyan-100 shadow-[0_0_40px_rgba(34,211,238,0.15)] backdrop-blur">
                    <span class="h-2 w-2 rounded-full bg-cyan-300 shadow-[0_0_12px_rgba(103,232,249,0.9)]"></span>
                    Livewire-powered presentations
                </div>

                <div class="space-y-4">
                    <img src="/slidewire-logo.png" alt="SlideWire logo" class="h-20 w-auto drop-shadow-[0_0_30px_rgba(217,70,239,0.45)] sm:h-24">
                    <h1 class="text-5xl font-semibold tracking-tight text-white sm:text-6xl lg:text-7xl">SlideWire</h1>
                    <p class="max-w-2xl text-lg leading-8 text-cyan-100/90 sm:text-xl">
                        Create beautiful presentations powered by Livewire, with polished navigation, expressive motion, and a Blade-first workflow.
                    </p>
                </div>

                <div class="flex flex-wrap gap-4">
                    <a href="/docs" class="inline-flex items-center justify-center rounded-full border border-cyan-300/40 bg-cyan-300/15 px-6 py-3 text-sm font-semibold text-cyan-50 shadow-[0_0_30px_rgba(34,211,238,0.2)] transition hover:border-cyan-200 hover:bg-cyan-300/25">
                        Explore the docs
                    </a>
                    <a href="https://github.com/WendellAdriel/slidewire" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-full border border-fuchsia-300/35 bg-fuchsia-300/10 px-6 py-3 text-sm font-semibold text-fuchsia-50 transition hover:border-fuchsia-200 hover:bg-fuchsia-300/20">
                        View on GitHub
                    </a>
                </div>

                <div class="text-sm text-cyan-100/80">
                    Tip: click anywhere or press Space to continue.
                </div>
            </div>

            <div class="relative">
                <div class="absolute inset-0 rounded-[2rem] bg-gradient-to-br from-cyan-400/25 via-fuchsia-500/15 to-transparent blur-3xl"></div>
                <div class="relative space-y-4 rounded-[2rem] border border-white/15 bg-slate-950/45 p-6 shadow-[0_0_60px_rgba(168,85,247,0.18)] backdrop-blur-xl sm:p-8">
                    <div class="flex items-center justify-between text-xs uppercase tracking-[0.25em] text-fuchsia-100/75">
                        <span>Why to pick SlideWire</span>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <p class="text-xs uppercase tracking-[0.25em] text-cyan-200/70">Workflow</p>
                            <p class="mt-3 text-2xl font-semibold text-white">Blade-first decks</p>
                            <p class="mt-2 text-sm leading-6 text-cyan-100/80">Build presentations in Laravel with slides, markdown, code, diagrams, and Tailwind layouts.</p>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <p class="text-xs uppercase tracking-[0.25em] text-cyan-200/70">Interactivity</p>
                            <p class="mt-3 text-2xl font-semibold text-white">Livewire runtime</p>
                            <p class="mt-2 text-sm leading-6 text-cyan-100/80">Keep state on the server while still getting polished controls, fragments, and reactive flows.</p>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-fuchsia-300/20 bg-gradient-to-r from-fuchsia-400/10 via-white/5 to-cyan-400/10 p-4 text-sm leading-6 text-cyan-50/85">
                        Themes, Google Fonts, image and video backgrounds, and motion primitives make it easy to turn a plain route into a launch-ready deck.
                    </div>
                </div>
            </div>
        </div>
    </x-slidewire::slide>

    <x-slidewire::slide>
        <div class="mx-auto flex h-full w-full max-w-6xl flex-col justify-between gap-10">
            <div class="max-w-2xl space-y-6">
                <p class="text-sm uppercase tracking-[0.35em] text-cyan-200/75">Why SlideWire</p>
                <h2 class="text-4xl font-semibold text-white sm:text-5xl">A presentation workflow that still feels like Laravel.</h2>
                <p class="text-lg leading-8 text-cyan-100/90">
                    SlideWire keeps deck state on the server with Livewire, so you can build interactive presentations without leaving the Laravel toolset they already use every day.
                </p>
            </div>

            <div class="grid w-full gap-4 md:grid-cols-3">
                <x-slidewire::fragment>
                    <div class="rounded-3xl border border-white/10 bg-white/6 p-5 backdrop-blur">
                        <p class="text-sm font-medium uppercase tracking-[0.2em] text-fuchsia-100/75">Full-page decks</p>
                        <p class="mt-3 text-base leading-7 text-cyan-50/85">Render polished presentations as real application routes.</p>
                    </div>
                </x-slidewire::fragment>
                <x-slidewire::fragment :index="1">
                    <div class="rounded-3xl border border-white/10 bg-white/6 p-5 backdrop-blur">
                        <p class="text-sm font-medium uppercase tracking-[0.2em] text-fuchsia-100/75">Reactive runtime</p>
                        <p class="mt-3 text-base leading-7 text-cyan-50/85">Use Livewire-driven state while keeping the workflow straightforward.</p>
                    </div>
                </x-slidewire::fragment>
                <x-slidewire::fragment :index="2">
                    <div class="rounded-3xl border border-white/10 bg-white/6 p-5 backdrop-blur">
                        <p class="text-sm font-medium uppercase tracking-[0.2em] text-fuchsia-100/75">Beautiful defaults</p>
                        <p class="mt-3 text-base leading-7 text-cyan-50/85">Themes, typography, and controls make decks feel launch-ready fast.</p>
                    </div>
                </x-slidewire::fragment>
            </div>
        </div>
    </x-slidewire::slide>

    <x-slidewire::vertical-slide>
        <x-slidewire::slide>
            <div class="mx-auto grid h-full w-full max-w-6xl gap-8 lg:grid-cols-[0.95fr_1.05fr] lg:items-center">
                <div class="space-y-6">
                    <p class="text-sm uppercase tracking-[0.35em] text-cyan-200/75">Navigation</p>
                    <h2 class="text-4xl font-semibold text-white sm:text-5xl">Move through decks in two dimensions.</h2>
                    <p class="text-lg leading-8 text-cyan-100/90">
                        SlideWire supports keyboard, click, swipe, and hash-based navigation, plus vertical stacks for deeper drill-downs inside a single topic.
                    </p>
                </div>

                <div class="rounded-[2rem] border border-white/10 bg-slate-950/45 p-6 backdrop-blur-xl">
                    <div class="grid gap-4 sm:grid-cols-[1fr_0.8fr]">
                        <div class="rounded-2xl border border-cyan-300/20 bg-cyan-300/8 p-5">
                            <p class="text-xs uppercase tracking-[0.25em] text-cyan-100/75">Horizontal</p>
                            <p class="mt-3 text-2xl font-semibold text-white">Overview to outcome</p>
                            <p class="mt-2 text-sm leading-6 text-cyan-50/80">Left and right navigation lands on the top of each column.</p>
                        </div>
                        <div class="grid gap-3">
                            <div class="rounded-2xl border border-fuchsia-300/20 bg-fuchsia-300/10 p-4 text-sm leading-6 text-fuchsia-50/85">Top</div>
                            <div class="rounded-2xl border border-fuchsia-300/20 bg-fuchsia-300/14 p-4 text-sm leading-6 text-fuchsia-50/85">Detail</div>
                            <div class="rounded-2xl border border-fuchsia-300/20 bg-fuchsia-300/18 p-4 text-sm leading-6 text-fuchsia-50/85">Drill-down</div>
                        </div>
                    </div>
                    <div class="mt-4 flex flex-wrap gap-3 text-sm text-cyan-100/80">
                        <span class="rounded-full border border-white/10 px-3 py-1">Arrow keys</span>
                        <span class="rounded-full border border-white/10 px-3 py-1">Touch gestures</span>
                        <span class="rounded-full border border-white/10 px-3 py-1">Hash deep links</span>
                    </div>
                </div>
            </div>
        </x-slidewire::slide>

        <x-slidewire::slide>
            <div class="mx-auto grid h-full w-full max-w-6xl gap-8 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                <div class="space-y-6">
                    <p class="text-sm uppercase tracking-[0.35em] text-cyan-200/75">Motion</p>
                    <h2 class="text-4xl font-semibold text-white sm:text-5xl">Transitions and reveals stay focused on the story.</h2>
                    <p class="text-lg leading-8 text-cyan-100/90">
                        Fade, slide, zoom, fragments, auto-animate, and auto-slide let each deck control pacing without needing a separate front-end framework.
                    </p>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <div class="rounded-3xl border border-white/10 bg-white/6 p-5 backdrop-blur">
                        <p class="text-sm uppercase tracking-[0.25em] text-fuchsia-100/75">Transitions</p>
                        <p class="mt-3 text-2xl font-semibold text-white">Fade, slide, zoom</p>
                        <p class="mt-2 text-sm leading-6 text-cyan-50/80">Keep deck-wide motion consistent, then override only when a slide needs emphasis.</p>
                    </div>
                    <div class="rounded-3xl border border-white/10 bg-white/6 p-5 backdrop-blur">
                        <p class="text-sm uppercase tracking-[0.25em] text-fuchsia-100/75">Progressive reveals</p>
                        <div class="mt-3 space-y-3 text-sm leading-6 text-cyan-50/85">
                            <x-slidewire::fragment><p>Fragments stage talking points.</p></x-slidewire::fragment>
                            <x-slidewire::fragment :index="1"><p>Auto-animate connects matching elements.</p></x-slidewire::fragment>
                            <x-slidewire::fragment :index="2"><p>Auto-slide works for demos and kiosk loops.</p></x-slidewire::fragment>
                        </div>
                    </div>
                </div>
            </div>
        </x-slidewire::slide>
    </x-slidewire::vertical-slide>

    <x-slidewire::slide>
        <div class="mx-auto grid h-full w-full max-w-6xl gap-8 lg:grid-cols-[0.95fr_1.05fr] lg:items-center">
            <div class="space-y-6">
                <p class="text-sm uppercase tracking-[0.35em] text-cyan-200/75">Workflow</p>
                <h2 class="text-4xl font-semibold text-white sm:text-5xl">Build decks with Blade, markdown, code, and diagrams.</h2>
                <p class="text-lg leading-8 text-cyan-100/90">
                    Build decks in a single Blade file, mix in Tailwind composition, and reach for purpose-built SlideWire components when content needs code samples or visual structure.
                </p>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-slate-950/50 p-6 backdrop-blur-xl">
                <x-slidewire::code language="blade" size="text-sm">
<x-slidewire::deck theme="neon">
    <x-slidewire::slide>
        <x-slidewire::markdown>
## Blade-first workflow
        </x-slidewire::markdown>
    </x-slidewire::slide>
</x-slidewire::deck>
                </x-slidewire::code>
                <div class="mt-4 grid gap-3 sm:grid-cols-3 text-sm text-cyan-50/85">
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-4">Markdown</div>
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-4">Code blocks</div>
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-4">Mermaid diagrams</div>
                </div>
            </div>
        </div>
    </x-slidewire::slide>

    <x-slidewire::slide>
        <div class="mx-auto grid h-full w-full max-w-6xl gap-5 sm:gap-8 lg:grid-cols-[1.05fr_0.95fr] lg:items-center">
            <div class="space-y-4 rounded-[2rem] border border-white/10 bg-slate-950/65 p-5 shadow-[0_0_60px_rgba(15,23,42,0.45)] backdrop-blur-xl sm:space-y-6 sm:p-7">
                <p class="text-sm uppercase tracking-[0.35em] text-cyan-200/75">Customization</p>
                <h2 class="text-3xl font-semibold text-white sm:text-4xl lg:text-5xl">Brand decks with fonts, backgrounds, and richer visuals out of the box.</h2>
                <p class="text-base leading-7 text-cyan-100/90 sm:text-lg sm:leading-8">
                    SlideWire automatically loads configured Google Fonts and gives each deck room for gradients, overlays, theme-driven styling, and media-backed slides when you want extra visual storytelling.
                </p>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="rounded-3xl border border-cyan-300/20 bg-cyan-300/10 p-4 sm:p-5">
                        <p class="text-sm uppercase tracking-[0.25em] text-cyan-100/75">Google Fonts</p>
                        <p class="mt-3 text-2xl font-semibold text-white sm:text-3xl">Inter + JetBrains Mono</p>
                        <p class="mt-2 text-sm leading-6 text-cyan-50/80">Configured fonts are injected automatically, so display and code typography feel polished with zero extra wiring.</p>
                    </div>
                    <div class="rounded-3xl border border-fuchsia-300/20 bg-fuchsia-300/10 p-4 sm:p-5">
                        <p class="text-sm uppercase tracking-[0.25em] text-fuchsia-100/75">Visual depth</p>
                        <p class="mt-3 text-2xl font-semibold text-white sm:text-3xl">Media + overlays</p>
                        <p class="mt-2 text-sm leading-6 text-fuchsia-50/80">Use image or video backgrounds when needed, then layer neon gradients and translucent panels on top.</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 text-xs text-cyan-100/80 sm:hidden">
                    <span class="rounded-full border border-white/10 px-3 py-1">Google Fonts</span>
                    <span class="rounded-full border border-white/10 px-3 py-1">Theme presets</span>
                    <span class="rounded-full border border-white/10 px-3 py-1">Highlight themes</span>
                    <span class="rounded-full border border-white/10 px-3 py-1">Image/Video backgrounds</span>
                </div>
            </div>

            <div class="hidden space-y-4 rounded-[2rem] border border-white/10 bg-slate-950/55 p-6 backdrop-blur-xl sm:block">
                <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                    <p class="text-sm uppercase tracking-[0.25em] text-cyan-100/75">Google Fonts config</p>
                    <x-slidewire::code language="blade" size="text-sm">
<x-slidewire::deck theme="neon">
    <x-slidewire::slide>
        <h2>Styled with loaded fonts</h2>
    </x-slidewire::slide>
</x-slidewire::deck>
                    </x-slidewire::code>
                </div>
                <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                    <p class="text-sm uppercase tracking-[0.25em] text-fuchsia-100/75">Media-ready slides</p>
                    <x-slidewire::code language="blade" size="text-sm">
<x-slidewire::slide background-image="/img/hero.jpg" />
<x-slidewire::slide background-video="/video/demo.mp4" />
                    </x-slidewire::code>
                </div>
                <div class="flex flex-wrap gap-3 text-sm text-cyan-100/80">
                    <span class="rounded-full border border-white/10 px-3 py-1">Theme presets</span>
                    <span class="rounded-full border border-white/10 px-3 py-1">Highlight themes</span>
                    <span class="rounded-full border border-white/10 px-3 py-1">Image/Video backgrounds</span>
                </div>
            </div>
        </div>
    </x-slidewire::slide>

    <x-slidewire::slide>
        <div class="mx-auto flex h-full w-full max-w-5xl flex-col justify-center gap-8">
            <div class="max-w-3xl space-y-5 rounded-[2rem] border border-white/10 bg-slate-950/60 p-8 backdrop-blur-xl">
                <p class="text-sm uppercase tracking-[0.35em] text-cyan-200/75">AI ready</p>
                <h2 class="text-4xl font-semibold text-white sm:text-5xl">SlideWire ships with a Boost AI skill for beautiful deck creation.</h2>
                <p class="text-lg leading-8 text-cyan-100/90">
                    AI agents can use the bundled SlideWire Boost skill to scaffold decks, choose the right components, structure horizontal and vertical flow, and refine visuals without guessing at package conventions.
                </p>
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                <div class="rounded-3xl border border-white/10 bg-white/8 p-5 backdrop-blur">
                    <p class="text-sm uppercase tracking-[0.25em] text-fuchsia-100/75">Workflow aware</p>
                    <p class="mt-3 text-base leading-7 text-cyan-50/85">Steers agents toward `make:slidewire`, single-file decks, and route macro registration.</p>
                </div>
                <div class="rounded-3xl border border-white/10 bg-white/8 p-5 backdrop-blur">
                    <p class="text-sm uppercase tracking-[0.25em] text-fuchsia-100/75">Component smart</p>
                    <p class="mt-3 text-base leading-7 text-cyan-50/85">Helps agents reach for slides, fragments, markdown, code, and diagrams at the right time.</p>
                </div>
                <div class="rounded-3xl border border-white/10 bg-white/8 p-5 backdrop-blur">
                    <p class="text-sm uppercase tracking-[0.25em] text-fuchsia-100/75">Design guided</p>
                    <p class="mt-3 text-base leading-7 text-cyan-50/85">Encourages strong themes, deliberate motion, readable spacing, and presenter-friendly pacing.</p>
                </div>
            </div>
        </div>
    </x-slidewire::slide>

    <x-slidewire::slide>
        <div class="mx-auto flex h-full w-full max-w-5xl flex-col items-center justify-center gap-8 text-center">
            <p class="text-sm uppercase tracking-[0.35em] text-cyan-200/75">Get started</p>
            <h2 class="text-4xl font-semibold text-white sm:text-5xl">Explore the package, then build your own deck.</h2>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/docs" class="inline-flex items-center justify-center rounded-full border border-cyan-300/40 bg-cyan-300/15 px-6 py-3 text-sm font-semibold text-cyan-50 transition hover:border-cyan-200 hover:bg-cyan-300/25">
                    Explore the docs
                </a>
                <a href="https://github.com/WendellAdriel/slidewire" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-full border border-fuchsia-300/35 bg-fuchsia-300/10 px-6 py-3 text-sm font-semibold text-fuchsia-50 transition hover:border-fuchsia-200 hover:bg-fuchsia-300/20">
                    Visit GitHub
                </a>
            </div>
        </div>
    </x-slidewire::slide>
</x-slidewire::deck>
