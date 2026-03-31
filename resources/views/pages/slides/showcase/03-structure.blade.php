<x-slidewire::vertical-slide>
    <x-slidewire::slide theme="default" transition="slide">
        <x-slidewire::two-column-slide ratio="2:1" gap="xl" align="center">
            <x-slot name="left">
                <div class="space-y-6">
                    <x-slidewire::text type="inline" animation="fade" class="text-sm uppercase tracking-[0.35em] text-cyan-100/75">Vertical navigation</x-slidewire::text>
                    <x-slidewire::text type="heading" animation="slide-up" class="max-w-[24ch] text-5xl font-semibold tracking-tight text-white text-balance sm:text-4xl">
                        One topic can branch downward without leaving the main storyline.
                    </x-slidewire::text>
                    <x-slidewire::text class="max-w-[48ch] text-xl text-pretty text-slate-200 sm:text-lg">
                        This slide is the top of a vertical stack. Press Down to drill deeper, then Up to come back out and continue horizontally.
                    </x-slidewire::text>
                </div>
            </x-slot>

            <x-slot name="right">
                <x-slidewire::panel variant="glass" title="How it feels" overline="Nested flow">
                    <div class="space-y-3 text-base leading-7 text-slate-100/85 sm:text-sm sm:leading-6">
                        <p>Left and right move between primary sections.</p>
                        <p>Up and down explore the active vertical stack.</p>
                        <p>Space still advances linearly through the story.</p>
                    </div>
                </x-slidewire::panel>
            </x-slot>
        </x-slidewire::two-column-slide>
    </x-slidewire::slide>

    <x-slidewire::slide theme="black" transition="slide" transition-speed="slow">
        <div class="mx-auto flex min-h-full w-full max-w-6xl flex-col justify-center gap-8">
            <div class="space-y-4">
                <x-slidewire::text type="inline" animation="fade" class="text-sm uppercase tracking-[0.35em] text-zinc-300/75">Vertical detail slide</x-slidewire::text>
                <x-slidewire::text type="heading" animation="slide-left" class="max-w-[24ch] text-5xl font-semibold tracking-tight text-zinc-50 text-balance sm:text-4xl">
                    Use the vertical layer for drill-downs, not detours.
                </x-slidewire::text>
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                <x-slidewire::panel variant="default" title="Chapter overview" overline="Top slide">
                    <p class="text-base leading-7 text-zinc-100/80 sm:text-sm sm:leading-6">Set context before the audience dives into detail.</p>
                </x-slidewire::panel>
                <x-slidewire::panel variant="elevated" title="Deep detail" overline="This slide">
                    <p class="text-base leading-7 text-zinc-100/80 sm:text-sm sm:leading-6">Explain the mechanics, code, or workflow that supports the broader point.</p>
                </x-slidewire::panel>
                <x-slidewire::panel variant="outlined" title="Return path" overline="Back up">
                    <p class="text-base leading-7 text-zinc-100/80 sm:text-sm sm:leading-6">Move back to the top of the stack, then continue through the main deck.</p>
                </x-slidewire::panel>
            </div>
        </div>
    </x-slidewire::slide>
</x-slidewire::vertical-slide>

<x-slidewire::slide theme="solarized" transition="fade">
    <div class="mx-auto flex min-h-full w-full max-w-6xl flex-col justify-center gap-8">
        <div class="space-y-4">
            <x-slidewire::text type="inline" animation="fade" class="text-sm uppercase tracking-[0.35em] text-amber-700/75">Agenda layouts</x-slidewire::text>
            <x-slidewire::text type="heading" animation="slide-up" class="max-w-[24ch] text-5xl font-semibold tracking-tight text-slate-800 text-balance sm:text-4xl">
                Agenda slides shape the same outline three different ways.
            </x-slidewire::text>
        </div>

        <div class="grid gap-4 xl:grid-cols-3">
            <x-slidewire::agenda-slide title="List" subtitle="Simple section scanning" style="list" highlight="2" theme="solarized">
                <x-slidewire::agenda-item index="1" title="Foundation" description="Deck setup, routes, and defaults." style="list" theme="solarized" />
                <x-slidewire::agenda-item index="2" title="Composition" description="Panels, split layouts, text, images, and code." active style="list" theme="solarized" />
                <x-slidewire::agenda-item index="3" title="Motion" description="Fragments, transitions, and auto-animate." style="list" theme="solarized" />
            </x-slidewire::agenda-slide>

            <x-slidewire::agenda-slide title="Cards" subtitle="Chunkier chapter tiles" style="cards" highlight="1" theme="solarized">
                <x-slidewire::agenda-item index="1" title="Laravel cadence" description="Single-file decks feel natural in a Blade app." active style="cards" theme="solarized" />
                <x-slidewire::agenda-item index="2" title="Livewire runtime" description="Navigation and state stay reactive." style="cards" theme="solarized" />
            </x-slidewire::agenda-slide>

            <x-slidewire::agenda-slide title="Timeline" subtitle="Good for roadmap pacing" style="timeline" highlight="3" theme="solarized">
                <x-slidewire::agenda-item index="1" title="Start with structure" description="Open with the frame for the talk." style="timeline" theme="solarized" />
                <x-slidewire::agenda-item index="2" title="Demonstrate primitives" description="Show every core component in context." style="timeline" theme="solarized" />
                <x-slidewire::agenda-item index="3" title="Land the deck" description="End with links and next steps." active style="timeline" theme="solarized" />
            </x-slidewire::agenda-slide>
        </div>
    </div>
</x-slidewire::slide>

<x-slidewire::slide theme="aurora" transition="zoom">
    <div class="mx-auto flex min-h-full w-full max-w-6xl flex-col justify-center gap-8">
        <div class="grid gap-6 xl:grid-cols-[0.86fr_1.14fr] xl:items-end">
            <div class="space-y-5">
                <x-slidewire::text type="inline" animation="fade" class="text-sm uppercase tracking-[0.35em] text-cyan-100/75">Steps layouts</x-slidewire::text>
                <x-slidewire::text type="heading" animation="slide-up" class="max-w-[22ch] text-5xl font-semibold tracking-tight text-emerald-50 text-balance sm:text-4xl">
                    One process, three presentation moods.
                </x-slidewire::text>
                <x-slidewire::text class="max-w-[42ch] text-xl text-pretty text-cyan-100/85 sm:text-lg">
                    Showcase the full workflow with the connected variant, then use cards or a minimal list when the same story needs a lighter footprint.
                </x-slidewire::text>
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                <x-slidewire::panel variant="glass" padding="md" title="Cards" overline="Compact overview">
                    <p class="text-base leading-7 text-cyan-50/85 sm:text-sm sm:leading-6">Best when each step has equal weight.</p>
                </x-slidewire::panel>
                <x-slidewire::panel variant="glass" padding="md" title="Minimal" overline="Lean outline">
                    <p class="text-base leading-7 text-cyan-50/85 sm:text-sm sm:leading-6">Best for setup notes and onboarding.</p>
                </x-slidewire::panel>
                <x-slidewire::panel variant="glass" padding="md" title="Connected" overline="Full narrative">
                    <p class="text-base leading-7 text-cyan-50/85 sm:text-sm sm:leading-6">Best for launch plans and rollout flows.</p>
                </x-slidewire::panel>
            </div>
        </div>

        <x-slidewire::steps-slide title="Connected - 2 columns" columns="2" style="connected" theme="aurora">
            <x-slidewire::step-item title="Route" description="Publish the deck at a real URL." style="connected" theme="aurora" />
            <x-slidewire::step-item title="Theme" description="Choose the visual system for the whole presentation." style="connected" theme="aurora" />
            <x-slidewire::step-item title="Animate" description="Add transitions and reveals only where they help." style="connected" theme="aurora" />
            <x-slidewire::step-item title="Share" description="Ship docs, source, and the live demo together." style="connected" theme="aurora" />
        </x-slidewire::steps-slide>

        <div class="grid gap-6 xl:grid-cols-[1.05fr_0.95fr] xl:items-start">
            <x-slidewire::steps-slide title="Cards - 3 columns" columns="3" style="cards" theme="aurora">
                <x-slidewire::step-item title="Plan" description="Frame it." theme="aurora" />
                <x-slidewire::step-item title="Build" description="Compose it." theme="aurora" />
                <x-slidewire::step-item title="Present" description="Run it." theme="aurora" />
            </x-slidewire::steps-slide>

            <x-slidewire::steps-slide title="Minimal - 1 column" columns="1" style="minimal" theme="aurora">
                <x-slidewire::step-item number="01" title="Prompt" description="Describe the deck." style="minimal" theme="aurora" />
                <x-slidewire::step-item number="02" title="Generate" description="Scaffold the file." style="minimal" theme="aurora" />
                <x-slidewire::step-item number="03" title="Refine" description="Polish the pacing." style="minimal" theme="aurora" />
            </x-slidewire::steps-slide>
        </div>
    </div>
</x-slidewire::slide>
