# Installation

- [Requirements](#requirements)
- [Install the package](#install-the-package)
- [Publish optional assets](#publish-optional-assets)
- [Create your first presentation](#create-your-first-presentation)
- [Register a route](#register-a-route)

SlideWire installs like a typical Laravel package. After requiring the package, you may scaffold a presentation, register a route, and open the deck immediately.

<a name="requirements"></a>
## Requirements

SlideWire currently requires the same core stack validated by the package itself:

- PHP `^8.4`
- Laravel `^12.0`
- Livewire `^4.0`

Code highlighting is powered by `phiki/phiki`, which is installed automatically as a package dependency.

<a name="install-the-package"></a>
## Install the package

```shell
composer require wendelladriel/slidewire
```

SlideWire registers its service provider automatically, so no manual provider registration is needed.

<a name="publish-optional-assets"></a>
## Publish optional assets

You may publish the package assets if you want to customize them.

```shell
php artisan vendor:publish --tag=slidewire-config
php artisan vendor:publish --tag=slidewire-views
php artisan vendor:publish --tag=slidewire-stubs
```

This publishes:

- `config/slidewire.php`
- `resources/views/vendor/slidewire`
- `stubs/slidewire`

> [!NOTE]
> If frontend changes are not reflected in the browser, make sure your app assets are running with `npm run dev` or have been built with `npm run build`.

<a name="create-your-first-presentation"></a>
## Create your first presentation

Use the scaffold command to generate a presentation file:

```shell
php artisan make:slidewire demo/hello --title="Hello SlideWire"
```

By default, the file is created at:

```text
resources/views/pages/slides/demo/hello.blade.php
```

The generated scaffold is a Livewire single-file component that already includes a deck, slides, and a fragment so you can start editing immediately.

<a name="register-a-route"></a>
## Register a route

Register the presentation with the route macro provided by SlideWire:

```php
use Illuminate\Support\Facades\Route;

Route::slidewire('/slides/hello', 'demo/hello');
```

Then open `/slides/hello` in your browser.

From there, you may continue with the [quickstart](./quickstart.md) or jump to the [presentation workflow](./building.md).
