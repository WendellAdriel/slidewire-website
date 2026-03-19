<x-slot:title>{{ $page->metaTitle() }}</x-slot>
<x-slot:metaTitle>{{ $page->metaTitle() }}</x-slot>
<x-slot:metaDescription>{{ $page->description }}</x-slot>
<x-slot:metaImage>{{ url('/cover.png') }}</x-slot>

<div class="docs-shell min-h-screen" data-docs-shell x-data="{ mobileMenuOpen: false }" @keydown.escape.window="mobileMenuOpen = false">
    <header class="docs-mobile-header lg:hidden" data-docs-header>
        <button
            type="button"
            class="docs-mobile-toggle"
            data-docs-mobile-toggle
            @click="mobileMenuOpen = ! mobileMenuOpen"
            :aria-expanded="mobileMenuOpen"
            aria-controls="docs-mobile-menu"
            aria-label="Toggle docs menu"
        >
            <flux:icon.bars-2 class="size-5" />
        </button>

        <a href="{{ route('docs', absolute: false) }}" wire:navigate.hover class="flex min-w-0 flex-1 items-center gap-3 text-sm font-semibold text-white" @click="mobileMenuOpen = false">
            <img src="/slidewire-logo.png" alt="SlideWire logo" class="h-8 w-auto">
            <span>SlideWire Docs</span>
        </a>

        <div class="ml-auto text-right" data-docs-version-mobile>
            <p class="text-[0.65rem] font-medium tracking-[0.18em] text-cyan-200/60">Current version</p>
            <p class="text-sm font-semibold text-cyan-50">{{ $currentVersion }}</p>
        </div>

    </header>

    <div
        x-cloak
        x-show="mobileMenuOpen"
        x-transition.opacity
        class="docs-mobile-backdrop lg:hidden"
        @click="mobileMenuOpen = false"
        aria-hidden="true"
    ></div>

    <aside
        id="docs-mobile-menu"
        class="docs-mobile-menu lg:hidden"
        data-docs-sidebar
        x-cloak
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="-translate-x-full opacity-0"
        x-transition:enter-end="translate-x-0 opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="translate-x-0 opacity-100"
        x-transition:leave-end="-translate-x-full opacity-0"
    >
        <div class="docs-menu-inner">
            <div class="docs-menu-brand">
                <a href="{{ route('docs', absolute: false) }}" wire:navigate.hover class="flex items-center gap-3 text-white" @click="mobileMenuOpen = false">
                    <img src="/slidewire-logo.png" alt="SlideWire logo" class="h-10 w-auto">
                    <div class="min-w-0 flex-1">
                        <p class="text-balance text-base font-semibold tracking-[0.14em] text-cyan-200/70 sm:text-lg">SlideWire Docs</p>
                    </div>
                </a>

                <button type="button" class="docs-close-button" @click="mobileMenuOpen = false" aria-label="Close docs menu">
                    <flux:icon.x-mark class="size-5" />
                </button>
            </div>

            <nav class="docs-menu-nav">
                @foreach ($page->navigation as $item)
                    <a
                        href="{{ $item['url'] }}"
                        wire:navigate.hover
                        wire:key="docs-mobile-sidebar-{{ $item['slug'] === '' ? 'index' : $item['slug'] }}"
                        class="docs-menu-link @if ($item['slug'] === $page->slug) docs-menu-link-current @endif"
                        @click="mobileMenuOpen = false"
                    >
                        {{ $item['title'] }}
                    </a>
                @endforeach
            </nav>

            <a href="https://github.com/WendellAdriel/slidewire" target="_blank" rel="noopener noreferrer" class="docs-github-link">
                View GitHub
            </a>
        </div>
    </aside>

    <flux:main class="docs-main">
        <div class="docs-canvas">
            <div class="docs-main-grid">
                <aside class="docs-sidebar-column" data-docs-sidebar>
                    <div class="docs-menu-card">
                        <a href="{{ route('docs', absolute: false) }}" wire:navigate.hover class="flex items-center gap-3 text-white">
                            <img src="/slidewire-logo.png" alt="SlideWire logo" class="h-10 w-auto">
                            <div class="min-w-0 flex-1">
                                <p class="text-balance text-base font-semibold tracking-[0.14em] text-cyan-200/70 xl:text-lg">SlideWire Docs</p>
                            </div>
                        </a>

                        <div class="rounded-2xl border border-cyan-300/16 bg-cyan-300/7 px-4 py-3" data-docs-version-desktop>
                            <p class="text-xs font-medium tracking-[0.18em] text-cyan-200/60">Current version</p>
                            <p class="mt-1 text-lg font-semibold text-white">{{ $currentVersion }}</p>
                        </div>

                        <nav class="docs-menu-nav">
                            @foreach ($page->navigation as $item)
                                <a
                                    href="{{ $item['url'] }}"
                                    wire:navigate.hover
                                    wire:key="docs-sidebar-{{ $item['slug'] === '' ? 'index' : $item['slug'] }}"
                                    class="docs-menu-link @if ($item['slug'] === $page->slug) docs-menu-link-current @endif"
                                >
                                    {{ $item['title'] }}
                                </a>
                            @endforeach
                        </nav>

                        <a href="https://github.com/WendellAdriel/slidewire" target="_blank" rel="noopener noreferrer" class="docs-github-link">
                            View GitHub
                        </a>
                    </div>
                </aside>

                <section class="docs-article-shell">
                    <div class="docs-hero">
                        <flux:badge>Docs</flux:badge>

                        <div class="space-y-3">
                            <flux:heading size="xl" level="1" class="text-white">{{ $page->title }}</flux:heading>
                            <flux:text class="max-w-3xl text-sm leading-7 text-slate-100/88 sm:text-base">{{ $page->description }}</flux:text>
                        </div>
                    </div>

                    <article class="docs-prose" data-docs-article>
                        {!! $page->html !!}
                    </article>

                    <flux:separator class="my-8 border-white/10" />

                    <div class="grid gap-3 sm:grid-cols-2">
                        @if ($page->previous !== null)
                            <a href="{{ $page->previous['url'] }}" wire:navigate.hover class="docs-pagination-card">
                                <span class="docs-pagination-label">Previous</span>
                                <span class="docs-pagination-title">{{ $page->previous['title'] }}</span>
                            </a>
                        @else
                            <div class="hidden sm:block"></div>
                        @endif

                        @if ($page->next !== null)
                            <a href="{{ $page->next['url'] }}" wire:navigate.hover class="docs-pagination-card sm:text-right">
                                <span class="docs-pagination-label">Next</span>
                                <span class="docs-pagination-title">{{ $page->next['title'] }}</span>
                            </a>
                        @endif
                    </div>
                </section>

                @if ($page->headings !== [])
                    <aside
                        class="docs-toc"
                        data-docs-toc
                        x-data="{
                            activeId: @js($page->headings[0]['id'] ?? null),
                            observer: null,
                            init() {
                                this.$nextTick(() => {
                                    const headings = Array.from(document.querySelectorAll('[data-docs-article] h2[id], [data-docs-article] h3[id]'))

                                    if (headings.length === 0) {
                                        return
                                    }

                                    const syncActiveHeading = () => {
                                        const offset = window.scrollY + 180
                                        let current = headings[0]

                                        headings.forEach((heading) => {
                                            if (heading.offsetTop <= offset) {
                                                current = heading
                                            }
                                        })

                                        this.activeId = current.id
                                    }

                                    this.observer?.disconnect()

                                    this.observer = new IntersectionObserver((entries) => {
                                        const visible = entries
                                            .filter((entry) => entry.isIntersecting)
                                            .sort((left, right) => left.boundingClientRect.top - right.boundingClientRect.top)

                                        if (visible.length > 0) {
                                            this.activeId = visible[0].target.id
                                        } else {
                                            syncActiveHeading()
                                        }
                                    }, {
                                        rootMargin: '-18% 0px -68% 0px',
                                        threshold: [0, 1],
                                    })

                                    headings.forEach((heading) => this.observer.observe(heading))
                                    syncActiveHeading()

                                    window.addEventListener('scroll', syncActiveHeading, { passive: true })

                                    this.$el.addEventListener('alpine:destroy', () => {
                                        this.observer?.disconnect()
                                        window.removeEventListener('scroll', syncActiveHeading)
                                    }, { once: true })
                                })
                            },
                        }"
                    >
                        <div class="docs-toc-card">
                            <p class="docs-toc-eyebrow">On this page</p>

                            <nav class="space-y-1">
                                @foreach ($page->headings as $heading)
                                    <a
                                        href="#{{ $heading['id'] }}"
                                        class="docs-toc-link @if ($heading['level'] === 3) docs-toc-link-child @endif"
                                        :class="activeId === @js($heading['id']) ? 'docs-toc-link-active' : ''"
                                        wire:key="docs-toc-{{ $heading['id'] }}"
                                    >
                                        {{ $heading['text'] }}
                                    </a>
                                @endforeach
                            </nav>
                        </div>
                    </aside>
                @endif
            </div>
        </div>
    </flux:main>
</div>
