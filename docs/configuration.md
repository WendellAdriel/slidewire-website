# Configuration

- [Configuration file](#configuration-file)
- [Presentation roots](#presentation-roots)
- [Slide defaults](#slide-defaults)
- [Runtime precedence](#runtime-precedence)
- [Themes](#themes)
- [Highlighting](#highlighting)
- [Fonts](#fonts)

SlideWire keeps its runtime behavior in a single config file so you can set sensible defaults once and keep presentation files focused on content.

<a name="configuration-file"></a>
## Configuration file

SlideWire stores its configuration in `config/slidewire.php`.

The main sections are:

- `presentation_roots`
- `slides`
- `themes`
- `fonts`

<a name="presentation-roots"></a>
## Presentation roots

`presentation_roots` defines the directories where SlideWire looks for presentation files.

```php
'presentation_roots' => [
    resource_path('views/pages/slides'),
],
```

The first configured root is also used by `make:slidewire` when generating new files.

<a name="slide-defaults"></a>
## Slide defaults

`slides` is a `SlidesConfig` DTO that defines the default runtime behavior for decks.

```php
use Phiki\Theme\Theme;
use WendellAdriel\SlideWire\DTOs\HighlightConfig;
use WendellAdriel\SlideWire\DTOs\SlidesConfig;
use WendellAdriel\SlideWire\Enums\SlideTransition;
use WendellAdriel\SlideWire\Enums\SlideTransitionSpeed;

'slides' => new SlidesConfig(
    theme: 'default',
    showControls: true,
    showProgress: true,
    showFullscreenButton: true,
    keyboard: true,
    touch: true,
    transition: SlideTransition::Slide,
    transitionDuration: 350,
    transitionSpeed: SlideTransitionSpeed::Default,
    autoSlide: 0,
    autoSlidePauseOnInteraction: true,
    highlight: new HighlightConfig(
        enabled: true,
        theme: Theme::CatppuccinMocha,
        font: 'JetBrainsMono',
        fontSize: 'text-base',
    ),
),
```

<a name="runtime-precedence"></a>
## Runtime precedence

Most runtime settings are resolved using a three-level chain:

1. slide metadata
2. deck metadata
3. configured defaults

This applies to values such as:

- `theme`
- `transition`
- `transition_speed`
- `transition_duration`
- `auto_slide`
- `auto_slide_pause_on_interaction`

Deck-level settings are the practical place to configure controls, progress, fullscreen visibility, and explicit highlight theme behavior for a whole presentation.

> [!NOTE]
> The `keyboard` and `touch` keys exist in the configuration DTO, but the current deck runtime binds keyboard and touch navigation by default. Treat those values as configuration metadata unless you have customized the deck view.

<a name="themes"></a>
## Themes

SlideWire ships with these built-in themes:

- `default`
- `black`
- `white`
- `aurora`
- `sunset`
- `neon`
- `solarized`

Each theme is a `ThemeConfig` DTO with background and typography settings:

```php
use Phiki\Theme\Theme;
use WendellAdriel\SlideWire\DTOs\ThemeConfig;
use WendellAdriel\SlideWire\DTOs\ThemeFont;

'themes' => [
    'corporate' => new ThemeConfig(
        background: 'bg-slate-900 text-slate-100',
        highlightTheme: Theme::GithubDark,
        title: new ThemeFont('Inter', 'text-slate-100', 'text-4xl'),
        text: new ThemeFont('Inter', 'text-slate-300', 'text-lg'),
    ),
],
```

Apply the theme by name on a deck or slide:

```blade
<x-slidewire::slide theme="corporate">
    <h2>Quarterly Review</h2>
</x-slidewire::slide>
```

<a name="highlighting"></a>
## Highlighting

Highlighting is configured through the nested `highlight` DTO inside `slides`.

Highlight theme resolution follows this order:

1. explicit highlight theme
2. active presentation theme's `highlightTheme`
3. configured default highlight theme

If Phiki is unavailable or highlighting fails, SlideWire falls back to a plain escaped code block.

In practice, explicit highlight theme overrides are most useful on the deck component or directly on the `code` component.

<a name="fonts"></a>
## Fonts

The `fonts` array maps font family names to their loading strategy.

```php
use WendellAdriel\SlideWire\DTOs\FontConfig;
use WendellAdriel\SlideWire\Enums\FontSource;

'fonts' => [
    'Inter' => new FontConfig(FontSource::Google, [400, 600, 700]),
    'JetBrainsMono' => new FontConfig(FontSource::Google, [400, 700]),
    'Georgia' => new FontConfig(FontSource::System),
],
```

Google fonts are automatically injected into the rendered deck. System fonts are used without additional asset loading.
