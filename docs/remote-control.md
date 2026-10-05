# Remote presenter control

- [Introduction](#introduction)
- [Starting a session](#starting-a-session)
- [Viewer navigation](#viewer-navigation)
- [Session configuration](#session-configuration)
- [Ending a session](#ending-a-session)
- [Troubleshooting](#troubleshooting)

Remote presenter control lets viewers follow your slide and fragment position from their own browsers. You present using a controller link and share a separate viewer link with your audience.

<a name="introduction"></a>
## Introduction

Remote presenter control is available in SlideWire 1.5.0. Session state is stored in Laravel's cache, and viewers receive updates through Livewire polling. No WebSocket server is required.

Presentations opened without a remote session continue to work normally and do not poll for updates.

<a name="starting-a-session"></a>
## Starting a session

First, register the presentation using `Route::slidewire()` in `routes/web.php`:

```php
use Illuminate\Support\Facades\Route;

Route::slidewire('/slides/pitch', 'pitch');
```

The command uses the generated `slidewire.pitch` route name. Keep this name when starting remote sessions. Nested presentation keys such as `team/q1-kickoff` are also supported. See [Routing and presentation discovery](./routing.md) for details.

Before starting a session, make sure the command and web requests use the same persistent cache store with support for atomic locks. A `file` store works for a single local host. For multiple application servers, use a shared store such as Redis. An `array` store does not share session state between the command and web requests.

Start the session with the presentation key, not its URL:

```shell
php artisan slidewire:remote pitch
```

The command prints two URLs:

- The controller URL has a temporary signature and gives the presenter control of the session.
- The viewer URL lets the audience follow the presenter without changing the shared position.

Open the controller URL in your presentation browser and share only the viewer URL. The controller displays a `LIVE` badge, a viewer lock toggle, and an end-session button. New viewers start at the presenter's current position.

> [!WARNING]
> Keep the controller URL private. Anyone with a valid controller link can control the session. Remote links do not replace your application's authentication or presentation route middleware.

By default, sessions last two hours and viewers poll every two seconds. You may override either value when creating a session:

```shell
php artisan slidewire:remote pitch --ttl=30m --poll=500ms
```

Viewers follow slide changes and revealed fragments on their next poll. Polling is not instantaneous, and shorter intervals increase requests to your application. Viewers do not re-render unchanged slides on every poll.

<a name="viewer-navigation"></a>
## Viewer navigation

Viewers are locked to the presenter by default. Navigation arrows are hidden, and keyboard, touch, and other navigation actions cannot move viewers away from the presenter's position. Fullscreen remains available when enabled by the deck's controls settings.

Use the controller's lock toggle, labeled **Let viewers navigate freely**, to allow browsing. This setting applies to all viewers in the session. Navigation arrows return when controls are enabled, and viewers may browse without changing the shared position.

While browsing is unlocked, a viewer stays on their selected slide until the presenter changes the slide or fragment position. That change brings viewers back to the presenter's position.

Use **Lock viewers to the presenter** to disable browsing again. On their next poll, viewers return to the current presenter position even if the presenter has not moved. Their navigation arrows are hidden again. The lock is also enforced on the server.

<a name="session-configuration"></a>
## Session configuration

The `remote` section in `config/slidewire.php` accepts a `RemoteConfig` DTO:

```php
use WendellAdriel\SlideWire\DTOs\RemoteConfig;

'remote' => new RemoteConfig(
    ttl: '2h',
    pollInterval: '2s',
    viewerControls: false,
    cacheStore: null,
),
```

| Option | Default | Purpose |
| --- | --- | --- |
| `ttl` | `'2h'` | Session lifetime. Use a positive whole number followed by `m`, `h`, or `d`. |
| `pollInterval` | `'2s'` | Viewer polling interval. Use a positive whole number followed by `ms` or `s`. |
| `viewerControls` | `false` | Whether viewers may browse freely when the session starts. The presenter may change this during the session. |
| `cacheStore` | `null` | Named store from `config/cache.php`. `null` uses the application's default store. |

For example, `30m`, `2h`, and `1d` are valid session lifetimes. `500ms` and `2s` are valid polling intervals. Zero, negative, fractional, and overflowing values are rejected. Polling intervals cannot exceed 2,147,483,647 milliseconds.

If you published the package configuration before 1.5.0, you may add the `remote` entry to your existing file. When the entry is absent, SlideWire uses the defaults shown above.

To use a dedicated cache store, set `cacheStore` to its configured name:

```php
'remote' => new RemoteConfig(
    cacheStore: 'redis',
),
```

The store must support atomic locks and be accessible to both the Artisan command and every application server serving the presentation. Clearing or losing the session cache ends the remote session. See [Configuration](./configuration.md) for the other package settings.

<a name="ending-a-session"></a>
## Ending a session

Use **End remote session** in the controller and confirm the prompt to stop sharing the presenter's position. Ending a session cannot be undone. Start a new session to generate new links.

Sessions also end when their configured lifetime expires. Navigating does not extend the lifetime, and closing the controller browser does not end the session early.

On their next poll after a session ends or expires, viewers stop following and return to independent browsing. They keep their current slide and revealed fragments. Normal navigation controls return according to the deck settings, and remote polling stops.

Opening a link for a missing or expired session loads the presentation in normal solo mode rather than joining a remote session.

<a name="troubleshooting"></a>
## Troubleshooting

If `slidewire:remote` reports that no route was found, register the presentation with `Route::slidewire()` and pass the same presentation key to the command. The command expects the generated route name to remain unchanged.

If a viewer link opens as a normal presentation, check that the session has not expired or been ended. Also check that the command and web server use the same cache configuration. An in-memory `array` store cannot carry the session from the command to the web server.

If the controller cannot update or end a session, check that the selected cache store supports atomic locks. In a multi-server deployment, every server must share the session cache and lock backend.

If viewers appear delayed, check the polling interval and network connectivity. Updates arrive through polling rather than a continuous connection.
