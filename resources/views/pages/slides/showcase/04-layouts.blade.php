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
