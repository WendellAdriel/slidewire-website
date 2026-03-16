# Presentation features

- [Navigation](#navigation)
- [Controls and fullscreen](#controls-and-fullscreen)
- [Transitions](#transitions)
- [Fragments](#fragments)
- [Auto-slide](#auto-slide)
- [Auto-animate](#auto-animate)
- [Component-level animations](#component-level-animations)
- [Backgrounds and media](#backgrounds-and-media)
- [Code highlighting](#code-highlighting)
- [Diagrams](#diagrams)

SlideWire includes the runtime features you typically need for presenting in the browser, from navigation and fragments to media backgrounds and code rendering.

<a name="navigation"></a>
## Navigation

SlideWire supports several navigation modes:

- keyboard navigation with the arrow keys and `Space`
- click or tap navigation on the stage
- swipe navigation on touch devices
- hash deep-linking with `#/slide/H` and `#/slide/H/V`

In stacked decks, left and right move between horizontal columns, while up and down move inside the current vertical stack.

<a name="controls-and-fullscreen"></a>
## Controls and fullscreen

The presentation view can render:

- directional controls
- a progress bar
- a fullscreen toggle

These options are controlled through deck-level settings or config defaults.

Vertical controls are only shown when the compiled deck contains at least one vertical stack.

<a name="transitions"></a>
## Transitions

SlideWire accepts these transition names:

- `slide`
- `fade`
- `zoom`
- `convex`
- `concave`
- `none`

```blade
<x-slidewire::slide transition="zoom" transition-speed="fast">
    <h2>Zoom transition</h2>
</x-slidewire::slide>
```

`transition-speed` may be `fast`, `default`, or `slow`.

> [!NOTE]
> The runtime has custom transition behavior for `fade`, `zoom`, and `none`. Other values are still accepted and fall back to the package's default slide-style transition behavior.

<a name="fragments"></a>
## Fragments

Fragments let you reveal content incrementally before moving to the next slide.

```blade
<x-slidewire::slide>
    <h2>Reveal points gradually</h2>

    <x-slidewire::fragment :index="0"><p>Point A</p></x-slidewire::fragment>
    <x-slidewire::fragment :index="1"><p>Point B</p></x-slidewire::fragment>
</x-slidewire::slide>
```

When `nextSlide()` is triggered, SlideWire reveals fragments first and only advances once the current slide has no more fragments to show.

<a name="auto-slide"></a>
## Auto-slide

You may advance slides automatically after a delay in milliseconds.

```blade
<x-slidewire::deck auto-slide="3000">
    <x-slidewire::slide>
        <h2>Advances in 3 seconds</h2>
    </x-slidewire::slide>
</x-slidewire::deck>
```

Per-slide values override deck and config defaults:

```blade
<x-slidewire::slide auto-slide="1200">
    <h2>Shorter delay on this slide</h2>
</x-slidewire::slide>
```

<a name="auto-animate"></a>
## Auto-animate

Auto-animate lets matching elements transition smoothly between consecutive slides.

```blade
<x-slidewire::slide auto-animate="true" auto-animate-duration="700" auto-animate-easing="ease">
    <h2 data-auto-animate-id="title">Before</h2>
    <div data-auto-animate-id="card">A</div>
</x-slidewire::slide>

<x-slidewire::slide auto-animate="true" auto-animate-duration="700" auto-animate-easing="ease">
    <h2 data-auto-animate-id="title">After</h2>
    <div data-auto-animate-id="card">B</div>
</x-slidewire::slide>
```

<a name="component-level-animations"></a>
## Component-level animations

`text` and `image` components support element-level entry animations through `animation` and `animation-speed`.

```blade
<x-slidewire::text type="heading" animation="slide-up">
    Product Launch
</x-slidewire::text>

<x-slidewire::image
    src="/images/product-shot.png"
    alt="Product shot"
    animation="pop"
    animation-speed="default"
/>
```

`animation-speed` accepts the same values as slide transitions:

- `fast`
- `default`
- `slow`

When the attribute is omitted, component animations default to `default`.

Supported animation names are:

- `fade`
- `pop`
- `zoom-in`
- `zoom-out`
- `slide-left`
- `slide-right`
- `slide-up`
- `slide-down`
- `blur`
- `typewriter` (`text` only)

Component animations run inside the existing SlideWire runtime when slides enter. If the user prefers reduced motion, SlideWire keeps the content visible and skips the animated effect.

> [!NOTE]
> `typewriter` is designed for text content. When used on images, SlideWire treats it as a no-op instead of throwing an error.

<a name="backgrounds-and-media"></a>
## Backgrounds and media

Use Tailwind classes for solid or gradient slide backgrounds:

```blade
<x-slidewire::slide class="bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 text-white">
    <h2>Gradient background</h2>
</x-slidewire::slide>
```

Use metadata attributes for image and video backgrounds:

```blade
<x-slidewire::slide
    background-image="https://example.com/bg.jpg"
    background-size="cover"
    background-position="center"
    background-repeat="no-repeat"
    background-opacity="0.35"
>
    <h2>Image background</h2>
</x-slidewire::slide>
```

```blade
<x-slidewire::slide
    background-video="https://example.com/loop.mp4"
    background-video-loop="true"
    background-video-muted="true"
>
    <h2>Video background</h2>
</x-slidewire::slide>
```

`background-transition` is passed through as metadata when present.

Use Tailwind classes for the slide's visual shell, and use background metadata when you need dedicated image or video layers.

<a name="code-highlighting"></a>
## Code highlighting

SlideWire highlights code in both the `code` and `markdown` components. Theme-aware highlighting is resolved automatically, and font and size may be customized per component.

```blade
<x-slidewire::code language="php" font="JetBrainsMono" size="text-base">
echo 'hello';
</x-slidewire::code>
```

<a name="diagrams"></a>
## Diagrams

Mermaid diagrams are supported through the `diagram` component:

```blade
<x-slidewire::diagram>
sequenceDiagram
    Alice->>Bob: Hello Bob, how are you?
    Bob-->>Alice: I am good thanks!
</x-slidewire::diagram>
```

Diagrams are rendered in the browser after the slide becomes active.
