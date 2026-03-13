# Components reference

- [Deck](#deck)
- [Slide](#slide)
- [Vertical slide](#vertical-slide)
- [Fragment](#fragment)
- [Markdown](#markdown)
- [Code](#code)
- [Diagram](#diagram)

SlideWire ships with a small set of focused Blade components for building presentations. Most decks are composed entirely from these primitives.

<a name="deck"></a>
## Deck

`<x-slidewire::deck>` is the presentation wrapper. It defines deck-level defaults and establishes theme and highlight context for nested content.

Common attributes include:

- `theme`
- `transition`
- `transition-speed`
- `transition-duration`
- `auto-slide`
- `auto-slide-pause-on-interaction`
- `show-controls`
- `show-progress`
- `show-fullscreen-button`
- `highlight-theme`

```blade
<x-slidewire::deck theme="aurora" transition="fade" highlight-theme="solarized-light">
    ...
</x-slidewire::deck>
```

Use deck attributes for presentation-wide defaults, then override them only where a specific slide needs different behavior.

<a name="slide"></a>
## Slide

`<x-slidewire::slide>` defines a single slide frame.

Common slide attributes include:

- `theme`
- `transition`
- `transition-speed`
- `transition-duration`
- `auto-slide`
- `auto-animate`
- `auto-animate-duration`
- `auto-animate-easing`
- `background-image`
- `background-video`
- `background-video-loop`
- `background-video-muted`
- `background-size`
- `background-position`
- `background-repeat`
- `background-opacity`
- `background-transition`

```blade
<x-slidewire::slide
    theme="white"
    transition="zoom"
    auto-slide="2500"
    background-image="https://example.com/bg.jpg"
    background-size="cover"
    background-position="center"
>
    <h2>Feature overview</h2>
</x-slidewire::slide>
```

Slide attributes become metadata that SlideWire uses at render time for transitions, timing, theme resolution, and background media.

<a name="vertical-slide"></a>
## Vertical slide

`<x-slidewire::vertical-slide>` groups multiple slides into a vertical stack.

```blade
<x-slidewire::vertical-slide>
    <x-slidewire::slide><h2>Top</h2></x-slidewire::slide>
    <x-slidewire::slide><h2>Bottom</h2></x-slidewire::slide>
</x-slidewire::vertical-slide>
```

<a name="fragment"></a>
## Fragment

`<x-slidewire::fragment>` reveals content progressively before SlideWire advances to the next slide.

```blade
<x-slidewire::slide>
    <h2>Roadmap</h2>

    <x-slidewire::fragment :index="0">
        <p>Design system refresh</p>
    </x-slidewire::fragment>

    <x-slidewire::fragment :index="1">
        <p>Public beta</p>
    </x-slidewire::fragment>
</x-slidewire::slide>
```

If explicit indexes are omitted, fragments are still counted and revealed in order.

<a name="markdown"></a>
## Markdown

`<x-slidewire::markdown>` converts Markdown to HTML and highlights fenced code blocks.

~~~blade
<x-slidewire::markdown size="text-lg">
## Metrics

```php
echo 'highlighted';
```

Regular Markdown content also works.
</x-slidewire::markdown>
~~~

Fenced Blade examples are preserved safely, so component syntax inside code fences is not compiled as live Blade.

This makes the markdown component a good fit for speaker notes, text-heavy slides, and code walkthroughs.

<a name="code"></a>
## Code

`<x-slidewire::code>` renders a single highlighted code block.

```blade
<x-slidewire::code language="php" theme="solarized-light" font="FiraCode" size="text-lg">
Route::slidewire('/slides/demo', 'demo/showcase');
</x-slidewire::code>
```

When no explicit theme is provided, SlideWire resolves the highlight theme using this order:

1. explicit component or deck highlight theme
2. active presentation theme
3. configured default highlight theme

<a name="diagram"></a>
## Diagram

`<x-slidewire::diagram>` renders Mermaid source that is processed in the browser.

```blade
<x-slidewire::diagram theme="dark">
flowchart LR
    A[Start] --> B[Ship It]
</x-slidewire::diagram>
```

SlideWire marks diagram blocks for runtime rendering and lazy-loads Mermaid in the presentation view.

Use this component when you want architecture diagrams, flows, or sequence charts without leaving the presentation file.
