# Components reference

- [Deck](#deck)
- [Slide](#slide)
- [Vertical slide](#vertical-slide)
- [Fragment](#fragment)
- [Panel](#panel)
- [Title slide](#title-slide)
- [Two column slide](#two-column-slide)
- [Media split slide](#media-split-slide)
- [Timeline slide](#timeline-slide)
- [Steps slide](#steps-slide)
- [Agenda slide](#agenda-slide)
- [Text](#text)
- [Image](#image)
- [Markdown](#markdown)
- [Code](#code)
- [Diagram](#diagram)

SlideWire ships with a focused set of Blade components for building presentations. You may compose decks from low-level primitives like `slide`, `fragment`, `markdown`, and `code`, or reach for first-party layout components when you want modern, theme-aware structure with less repeated markup.

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

<a name="panel"></a>
## Panel

`<x-slidewire::panel>` renders a reusable surface for grouped content such as feature callouts, supporting copy, code snippets, or media.

Supported attributes include:

- `variant` (`default`, `elevated`, `outlined`, `glass`)
- `title`
- `overline`
- `footer`
- `padding` (`md`, `lg`)
- `tone` (`default`, `primary`, `success`, `warning`, `danger`)
- `theme`
- `class`

```blade
<x-slidewire::panel
    title="Launch metrics"
    overline="Quarterly update"
    footer="Next review on Friday"
    variant="glass"
    tone="primary"
>
    <p>Activation is climbing across every launch channel.</p>
</x-slidewire::panel>
```

Use panels when content should feel intentionally framed, but you still want full control over the slot markup.

<a name="title-slide"></a>
## Title slide

`<x-slidewire::title-slide>` provides an opinionated opening layout for deck titles, subtitles, and presenter metadata.

Supported attributes include:

- `title`
- `subtitle`
- `overline`
- `speaker`
- `event`
- `date`
- `align` (`left`, `center`)
- `variant` (`default`, `hero`, `minimal`)
- `theme`

```blade
<x-slidewire::title-slide
    title="SlideWire Launch Kit"
    subtitle="A first-party UI system for presentation-ready decks"
    overline="Product keynote"
    speaker="Wendell Adriel"
    event="SlideWire Summit"
    date="March 2026"
    variant="hero"
    align="center"
/>
```

Use the title slide for opening moments, chapter separators, and simple title cards that should stay consistent across themes.

<a name="two-column-slide"></a>
## Two column slide

`<x-slidewire::two-column-slide>` creates a responsive split layout with named `left` and `right` slots.

Supported attributes include:

- `ratio` (`1:1`, `2:1`, `1:2`)
- `gap` (`md`, `lg`, `xl`)
- `align` (`start`, `center`, `stretch`)
- `reverse`
- `class`

```blade
<x-slidewire::two-column-slide ratio="2:1" gap="xl" align="center">
    <x-slot name="left">
        <x-slidewire::panel title="Why teams switch" variant="glass">
            Blade-first composition with less repeated Tailwind scaffolding.
        </x-slidewire::panel>
    </x-slot>

    <x-slot name="right">
        <x-slidewire::code language="php" size="text-sm">
Route::slidewire('/slides/demo', 'demo/showcase');
        </x-slidewire::code>
    </x-slot>
</x-slidewire::two-column-slide>
```

Use this component when both sides should stay flexible and composable. It also replaces the older media split pattern: if one side should feel more visual, place the image, diagram, or code inside a `panel` or framed wrapper within the relevant slot.

<a name="media-split-slide"></a>
## Media split slide

`<x-slidewire::media-split-slide>` provides a more opinionated split layout when one side should lead with media and the other should support it with copy, code, or structured content.

Supported attributes include:

- `media-position` (`left`, `right`)
- `ratio` (`1:1`, `3:2`, `2:3`)
- `media-style` (`plain`, `framed`, `panel`)
- `gap` (`lg`, `xl`)
- `theme`
- `class`

```blade
<x-slidewire::media-split-slide media-position="right" ratio="3:2" media-style="panel">
    <x-slot name="media">
        <x-slidewire::image
            src="/images/product-shot.png"
            alt="Product dashboard"
            class="w-full rounded-2xl"
        />
    </x-slot>

    <x-slot name="content">
        <x-slidewire::panel title="Launch dashboard" overline="Media-led layout" variant="glass">
            Lead with the visual, then use the content slot for the explanation, callouts, or supporting actions.
        </x-slidewire::panel>
    </x-slot>
</x-slidewire::media-split-slide>
```

Use `plain` when the media should render without extra framing, `framed` when it needs a clearer border, and `panel` when the media side should feel more atmospheric or elevated.

This component works well for screenshots, product reveals, before-and-after comparisons, or any slide where the visual should set the rhythm of the layout.

<a name="timeline-slide"></a>
## Timeline slide

`<x-slidewire::timeline-slide>` and `<x-slidewire::timeline-item>` help you present milestones, roadmap stages, and chronological stories.

Timeline slide attributes include:

- `title`
- `orientation` (`vertical`, `horizontal`)
- `theme`

Timeline item attributes include:

- `title`
- `label`
- `description`
- `status` (`default`, `complete`, `current`, `upcoming`)
- `item-key`
- `theme`

```blade
<x-slidewire::timeline-slide title="Delivery plan">
    <x-slidewire::timeline-item title="Foundation" label="Phase 1" description="Ship shared UI tokens." status="complete" />
    <x-slidewire::timeline-item title="Layouts" label="Phase 2" description="Add split, agenda, and narrative slide patterns." status="current" item-key="shipping" />
    <x-slidewire::timeline-item title="Polish" label="Phase 3" description="Validate with fixtures and browser smoke tests." status="upcoming" />
</x-slidewire::timeline-slide>
```

Use the vertical layout by default, then switch to horizontal when you have only a few high-level milestones.

<a name="steps-slide"></a>
## Steps slide

`<x-slidewire::steps-slide>` and `<x-slidewire::step-item>` are useful for rollout phases, tutorials, and process walkthroughs.

Steps slide attributes include:

- `title`
- `columns` (`1`, `2`, `3`)
- `style` (`cards`, `minimal`, `connected`)
- `theme`

Step item attributes include:

- `title`
- `number`
- `description`
- `style`
- `theme`

```blade
<x-slidewire::steps-slide title="Workflow" columns="3" style="cards">
    <x-slidewire::step-item title="Plan" description="Choose the right structure for the talk." />
    <x-slidewire::step-item title="Compose" description="Fill slots with text, code, or media." />
    <x-slidewire::step-item title="Present" description="Keep the story paced with fragments and transitions." />
</x-slidewire::steps-slide>
```

If `number` is omitted, SlideWire numbers steps automatically.

<a name="agenda-slide"></a>
## Agenda slide

`<x-slidewire::agenda-slide>` and `<x-slidewire::agenda-item>` provide structured chapter and agenda layouts.

Agenda slide attributes include:

- `title`
- `subtitle`
- `style` (`list`, `cards`, `timeline`)
- `highlight`
- `theme`

Agenda item attributes include:

- `title`
- `description`
- `index`
- `active`
- `style`
- `theme`

```blade
<x-slidewire::agenda-slide title="Agenda" subtitle="How we will spend the hour" style="cards">
    <x-slidewire::agenda-item index="1" title="State of the product" description="What changed since last quarter" style="cards" />
    <x-slidewire::agenda-item index="2" title="Launch plan" description="What ships next" style="cards" active />
</x-slidewire::agenda-slide>
```

Use `list` for lighter chapter overviews, then move to `cards` or `timeline` when the structure should carry more visual weight.

<a name="text"></a>
## Text

`<x-slidewire::text>` renders semantic text elements without repeating the same markup and animation metadata by hand.

Supported attributes include:

- `type` (`paragraph`, `inline`, `heading`)
- `font` (any configured family from `config('slidewire.fonts')`)
- `orientation` (`horizontal`, `vertical`)
- `animation`
- `animation-speed` (`fast`, `default`, `slow`)
- `class`
- any additional HTML attributes that make sense on the rendered element

```blade
<x-slidewire::text
    type="heading"
    font="Inter"
    orientation="vertical"
    animation="slide-up"
    animation-speed="slow"
    class="text-4xl font-semibold"
>
    Launch Day
</x-slidewire::text>
```

By default, the text component renders a `<p>` tag with horizontal layout. `type="inline"` renders a `<span>`, while `type="heading"` renders an `<h2>`.

Use `orientation="vertical"` for side labels, editorial layouts, or compact callouts. Use `font` when you want a one-off typography change that still stays within your configured presentation fonts. For longer prose or more custom markup, you may still prefer plain HTML.

<a name="image"></a>
## Image

`<x-slidewire::image>` renders a normal `<img>` tag and adds the same animation contract used by other SlideWire content components.

Supported attributes include:

- all native image attributes like `src`, `alt`, `class`, `width`, `height`, `loading`, `decoding`, and `fetchpriority`
- `animation`
- `animation-speed` (`fast`, `default`, `slow`)

```blade
<x-slidewire::image
    src="/images/product-shot.png"
    alt="Product shot"
    class="w-72 rounded-2xl shadow-2xl"
    loading="lazy"
    animation="pop"
    animation-speed="default"
/>
```

The image component does not replace the native `<img>` API. Instead, it forwards standard attributes directly to the rendered element.

> [!NOTE]
> Always provide useful `alt` text unless the image is purely decorative.

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
