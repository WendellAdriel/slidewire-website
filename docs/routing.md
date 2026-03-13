# Routing and presentation discovery

- [Registering presentations](#registering-presentations)
- [Route names](#route-names)
- [Nested presentations](#nested-presentations)
- [Presentation discovery](#presentation-discovery)
- [Path normalization](#path-normalization)

SlideWire uses a route macro and a presentation resolver so you can map clean URLs to Blade-based presentations.

<a name="registering-presentations"></a>
## Registering presentations

SlideWire registers a `Route::slidewire()` macro. This macro creates the Livewire route that renders a presentation deck and stores the presentation key in the route defaults.

```php
use Illuminate\Support\Facades\Route;

Route::slidewire('/slides/demo', 'demo/showcase');
```

If the presentation cannot be resolved, the deck route returns a `404` response.

<a name="route-names"></a>
## Route names

Route names are generated from the presentation key:

```php
Route::slidewire('/slides/demo', 'demo/showcase');

// slidewire.demo.showcase
```

This applies to nested keys as well.

<a name="nested-presentations"></a>
## Nested presentations

Nested presentation keys are supported out of the box:

```php
Route::slidewire('/slides/q1', 'sales/q1-launch');
Route::slidewire('/slides/retro', 'engineering/retro/sprint-42');
```

These routes resolve to presentation files inside the configured presentation roots.

<a name="presentation-discovery"></a>
## Presentation discovery

Presentation files are discovered from the directories listed in `config/slidewire.php`:

```php
'presentation_roots' => [
    resource_path('views/pages/slides'),
],
```

When SlideWire resolves a presentation, it looks for Blade files ending in `.blade.php`.

For example, the key `team/q1-kickoff` resolves to:

```text
resources/views/pages/slides/team/q1-kickoff.blade.php
```

<a name="path-normalization"></a>
## Path normalization

Presentation keys are normalized before lookup:

- leading and trailing slashes are trimmed
- backslashes are converted to forward slashes
- `..` segments are stripped

This allows keys from different sources to resolve consistently while avoiding directory traversal issues.

> [!WARNING]
> SlideWire discovers Blade presentation files only. Standalone Markdown presentation files are not currently resolved by the path resolver.
