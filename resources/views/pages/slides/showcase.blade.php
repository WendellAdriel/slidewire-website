<?php

use Livewire\Component;

new class() extends Component
{
    //
}; ?>

<x-slot:title>SlideWire Showcase</x-slot>

<x-slidewire::deck
    theme="aurora"
    transition="slide"
    transition-speed="default"
    transition-duration="700"
    auto-slide-pause-on-interaction="true"
    show-controls="true"
    show-progress="true"
    show-fullscreen-button="true"
    keyboard="true"
    touch="true"
>
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
        </div>
    </x-slidewire::slide>

    <x-slidewire::slide theme="white" transition="fade" transition-speed="fast">
        <div class="mx-auto flex min-h-full w-full max-w-6xl flex-col justify-center gap-8">
            <x-slidewire::title-slide
                title="Title slides set the tone fast."
                subtitle="The hero variant opens a deck, the default variant anchors section intros, and the minimal variant closes things out without extra scaffolding."
                overline="Title slide component"
                speaker="Left aligned default"
                variant="default"
                align="left"
                theme="white"
            />

            <div class="grid gap-4 lg:grid-cols-[1.2fr_0.8fr]">
                <x-slidewire::panel variant="outlined" title="Variants used in this showcase" overline="Coverage" theme="white">
                    <div class="grid gap-4 sm:grid-cols-3">
                        <div class="rounded-[1.5rem] border border-zinc-950/10 bg-zinc-950/[0.03] p-4">
                            <p class="text-sm font-medium text-zinc-500">Hero</p>
                            <p class="mt-2 text-lg font-semibold text-zinc-950">Slide 1</p>
                        </div>
                        <div class="rounded-[1.5rem] border border-zinc-950/10 bg-zinc-950/[0.03] p-4">
                            <p class="text-sm font-medium text-zinc-500">Default</p>
                            <p class="mt-2 text-lg font-semibold text-zinc-950">This slide</p>
                        </div>
                        <div class="rounded-[1.5rem] border border-zinc-950/10 bg-zinc-950/[0.03] p-4">
                            <p class="text-sm font-medium text-zinc-500">Minimal</p>
                            <p class="mt-2 text-lg font-semibold text-zinc-950">Final slide</p>
                        </div>
                    </div>
                </x-slidewire::panel>

                <x-slidewire::panel variant="default" title="Theme list" overline="Slides" theme="white">
                    <div class="flex flex-wrap gap-3 text-sm font-medium text-zinc-700">
                        <span class="rounded-full border border-zinc-950/10 px-3 py-1">aurora</span>
                        <span class="rounded-full border border-zinc-950/10 px-3 py-1">white</span>
                        <span class="rounded-full border border-zinc-950/10 px-3 py-1">neon</span>
                        <span class="rounded-full border border-zinc-950/10 px-3 py-1">sunset</span>
                        <span class="rounded-full border border-zinc-950/10 px-3 py-1">default</span>
                        <span class="rounded-full border border-zinc-950/10 px-3 py-1">black</span>
                        <span class="rounded-full border border-zinc-950/10 px-3 py-1">solarized</span>
                    </div>
                </x-slidewire::panel>
            </div>
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

    <x-slidewire::slide theme="white" transition="fade">
        <div class="mx-auto flex min-h-full w-full max-w-6xl flex-col justify-center gap-8">
            <div class="grid gap-6 xl:grid-cols-[0.9fr_1.1fr] xl:items-end">
                <div class="space-y-4">
                    <x-slidewire::text type="inline" animation="fade" class="text-sm uppercase tracking-[0.35em] text-zinc-500">Timelines</x-slidewire::text>
                    <x-slidewire::text type="heading" animation="slide-up" class="max-w-[22ch] text-5xl font-semibold tracking-tight text-zinc-950 text-balance sm:text-4xl">
                        Timeline slides cover orientations and item states.
                    </x-slidewire::text>
                    <x-slidewire::text class="max-w-[42ch] text-xl text-pretty text-zinc-600 sm:text-lg">
                        Use the vertical layout for richer milestone detail, then switch to a horizontal row when the audience only needs the broad progression.
                    </x-slidewire::text>
                </div>

                <div class="grid gap-3 sm:grid-cols-4">
                    <div class="rounded-[1.5rem] border border-zinc-950/10 bg-zinc-950/[0.03] p-4">
                        <p class="text-sm font-medium text-zinc-500">Default</p>
                        <p class="mt-2 text-base font-semibold text-zinc-950">Neutral</p>
                    </div>
                    <div class="rounded-[1.5rem] border border-emerald-500/20 bg-emerald-50 p-4">
                        <p class="text-sm font-medium text-emerald-700">Complete</p>
                        <p class="mt-2 text-base font-semibold text-emerald-900">Finished</p>
                    </div>
                    <div class="rounded-[1.5rem] border border-sky-500/20 bg-sky-50 p-4">
                        <p class="text-sm font-medium text-sky-700">Current</p>
                        <p class="mt-2 text-base font-semibold text-sky-900">Active</p>
                    </div>
                    <div class="rounded-[1.5rem] border border-amber-500/20 bg-amber-50 p-4">
                        <p class="text-sm font-medium text-amber-700">Upcoming</p>
                        <p class="mt-2 text-base font-semibold text-amber-900">Next up</p>
                    </div>
                </div>
            </div>

            <div class="grid gap-6 xl:grid-cols-[0.92fr_1.08fr] xl:items-start">
                <x-slidewire::timeline-slide title="Vertical orientation" orientation="vertical" theme="white" class="self-start">
                    <x-slidewire::timeline-item label="Phase 1" title="Default" description="Neutral milestone for supporting context." status="default" theme="white" />
                    <x-slidewire::timeline-item label="Phase 2" title="Complete" description="Finished work gets a success state." status="complete" theme="white" />
                    <x-slidewire::timeline-item label="Phase 3" title="Current" description="The active beat gets stronger emphasis." status="current" theme="white" />
                    <x-slidewire::timeline-item label="Phase 4" title="Upcoming" description="Future work uses the warning palette." status="upcoming" theme="white" />
                </x-slidewire::timeline-slide>

                <div class="space-y-4">
                    <x-slidewire::panel variant="outlined" title="Horizontal orientation" overline="Compressed view" theme="white">
                        <p class="text-base leading-7 text-zinc-600 sm:text-sm sm:leading-6">
                            Keep each item shorter here. Horizontal timelines work best as a quick roadmap, not a dense explanation block.
                        </p>
                    </x-slidewire::panel>

                    <x-slidewire::timeline-slide
                        orientation="horizontal"
                        theme="white"
                        class="[&_.slidewire-timeline-list]:xl:grid-cols-3 [&_.slidewire-timeline-item]:min-h-52 [&_.slidewire-timeline-item]:p-6 [&_.slidewire-timeline-title]:text-3xl [&_.slidewire-timeline-title]:sm:text-2xl [&_.slidewire-timeline-description]:text-xl [&_.slidewire-timeline-description]:sm:text-lg"
                    >
                        <x-slidewire::timeline-item item-key="a" title="Plan" description="Set direction." status="complete" theme="white" />
                        <x-slidewire::timeline-item item-key="b" title="Build" description="Author slides." status="current" theme="white" />
                        <x-slidewire::timeline-item item-key="c" title="Launch" description="Ship live." status="upcoming" theme="white" />
                    </x-slidewire::timeline-slide>
                </div>
            </div>
        </div>
    </x-slidewire::slide>

    <x-slidewire::slide theme="black" transition="slide">
        <div class="mx-auto flex min-h-full w-full max-w-6xl flex-col justify-center gap-8">
            <div class="space-y-4">
                <x-slidewire::text type="inline" animation="fade" class="text-sm uppercase tracking-[0.35em] text-zinc-300/75">Two column slide</x-slidewire::text>
                <x-slidewire::text type="heading" animation="slide-up" class="max-w-[24ch] text-5xl font-semibold tracking-tight text-zinc-50 text-balance sm:text-4xl">
                    Ratios, gaps, alignment, and reverse order are all configurable.
                </x-slidewire::text>
            </div>

            <div class="space-y-4">
                <x-slidewire::two-column-slide ratio="1:1" gap="md" align="start" class="rounded-[2rem] border border-white/10 bg-white/[0.03] p-5">
                    <x-slot name="left"><div class="rounded-[1.25rem] border border-white/10 bg-white/5 p-4 text-sm text-zinc-100">ratio 1:1</div></x-slot>
                    <x-slot name="right"><div class="rounded-[1.25rem] border border-white/10 bg-white/5 p-4 text-sm text-zinc-100">gap md, align start</div></x-slot>
                </x-slidewire::two-column-slide>

                <x-slidewire::two-column-slide ratio="2:1" gap="lg" align="center" class="rounded-[2rem] border border-white/10 bg-white/[0.03] p-5">
                    <x-slot name="left"><div class="rounded-[1.25rem] border border-cyan-300/20 bg-cyan-300/10 p-4 text-sm text-cyan-50">ratio 2:1</div></x-slot>
                    <x-slot name="right"><div class="rounded-[1.25rem] border border-cyan-300/20 bg-cyan-300/10 p-4 text-sm text-cyan-50">gap lg, align center</div></x-slot>
                </x-slidewire::two-column-slide>

                <x-slidewire::two-column-slide ratio="1:2" gap="xl" align="stretch" reverse class="rounded-[2rem] border border-white/10 bg-white/[0.03] p-5">
                    <x-slot name="left"><div class="rounded-[1.25rem] border border-fuchsia-300/20 bg-fuchsia-300/10 p-4 text-sm text-fuchsia-50">ratio 1:2</div></x-slot>
                    <x-slot name="right"><div class="rounded-[1.25rem] border border-fuchsia-300/20 bg-fuchsia-300/10 p-4 text-sm text-fuchsia-50">gap xl, reverse, align stretch</div></x-slot>
                </x-slidewire::two-column-slide>
            </div>
        </div>
    </x-slidewire::slide>

    <x-slidewire::slide theme="neon" transition="fade">
        <div class="mx-auto flex min-h-full w-full max-w-6xl flex-col justify-center gap-8">
            <div class="space-y-4">
                <x-slidewire::text type="inline" animation="fade" class="text-sm uppercase tracking-[0.35em] text-cyan-200/75">Media split layout</x-slidewire::text>
                <x-slidewire::text type="heading" animation="slide-up" class="max-w-[24ch] text-5xl font-semibold tracking-tight text-white text-balance sm:text-4xl">
                    Media split layouts still offer a focused content-plus-visual format.
                </x-slidewire::text>
            </div>

            <div class="space-y-4">
                <x-slidewire::media-split-slide media-position="left" ratio="1:1" media-style="plain" gap="lg" class="rounded-[2rem] border border-white/10 bg-white/[0.03] p-5">
                    <x-slot name="media">
                        <x-slidewire::image src="/slidewire-logo.png" alt="SlideWire logo" animation="slide-left" class="mx-auto w-40" />
                    </x-slot>
                    <x-slot name="content">
                        <x-slidewire::panel variant="outlined" title="Plain" overline="media-style">
                            <p class="text-base leading-7 text-cyan-50/85 sm:text-sm sm:leading-6">Use plain output when the media already carries its own framing.</p>
                        </x-slidewire::panel>
                    </x-slot>
                </x-slidewire::media-split-slide>

                <x-slidewire::media-split-slide media-position="right" ratio="3:2" media-style="framed" gap="xl" class="rounded-[2rem] border border-white/10 bg-white/[0.03] p-5">
                    <x-slot name="media">
                        <x-slidewire::image src="/cover.png" alt="SlideWire cover artwork" animation="zoom-in" class="w-full rounded-[1.25rem]" />
                    </x-slot>
                    <x-slot name="content">
                        <x-slidewire::panel variant="glass" title="Framed" overline="media-position right">
                            <p class="text-base leading-7 text-cyan-50/85 sm:text-sm sm:leading-6">A bordered media wrapper gives screenshots more presence.</p>
                        </x-slidewire::panel>
                    </x-slot>
                </x-slidewire::media-split-slide>

                <x-slidewire::media-split-slide media-position="left" ratio="2:3" media-style="panel" gap="xl" class="rounded-[2rem] border border-white/10 bg-white/[0.03] p-5">
                    <x-slot name="media">
                        <x-slidewire::image src="/cover.png" alt="SlideWire cover artwork" animation="blur" class="w-full rounded-[1.25rem]" />
                    </x-slot>
                    <x-slot name="content">
                        <x-slidewire::panel variant="elevated" title="Panel" overline="ratio 2:3">
                            <p class="text-base leading-7 text-cyan-50/85 sm:text-sm sm:leading-6">The panel style wraps the media side in a more atmospheric shell.</p>
                        </x-slidewire::panel>
                    </x-slot>
                </x-slidewire::media-split-slide>
            </div>
        </div>
    </x-slidewire::slide>

    <x-slidewire::slide theme="white" transition="fade">
        <x-slidewire::two-column-slide ratio="1:1" gap="xl" align="stretch">
            <x-slot name="left">
                <div class="space-y-4">
                    <x-slidewire::panel variant="outlined" title="Markdown" overline="Narrative authoring" theme="white">
                        <x-slidewire::markdown size="text-sm">
## Laravel and Livewire in one file

- Start with `make:slidewire`
- Author in Blade with Tailwind
- Mix prose, bullets, and code fences

```php
Route::slidewire('/showcase', 'showcase');
```
                        </x-slidewire::markdown>
                    </x-slidewire::panel>

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
</x-slidewire::deck>
