# Commands

- [`make:slidewire`](#make-slidewire)
- [Arguments and options](#arguments-and-options)
- [Markdown decks](#markdown-decks)
- [Multi-file decks](#multi-file-decks)
- [Interactive mode](#interactive-mode)
- [Overwrite existing files](#overwrite-existing-files)
- [`slidewire:remote`](#slidewireremote)

SlideWire provides commands for scaffolding presentations and starting remote presenter sessions.

<a name="make-slidewire"></a>
## `make:slidewire`

Use `make:slidewire` to generate a new presentation scaffold.

```shell
php artisan make:slidewire team/q1-kickoff --title="Q1 Kickoff"
```

By default, the generated file is written to the first configured presentation root and uses the package's Blade stub.

That stub is a Livewire single-file component with starter slides, so you can begin editing immediately.

Command signature:

```text
make:slidewire
    {name? : The presentation path, e.g. team/q1-kickoff}
    {--presentation= : The presentation path override}
    {--title= : The first slide title}
    {--md : Create a standalone Markdown deck}
    {--multi : Create a multi-file deck}
    {--force : Overwrite existing files}
```

<a name="arguments-and-options"></a>
## Arguments and options

- `name`: optional presentation key such as `team/q1-kickoff`
- `--presentation=`: explicit presentation key that overrides `name`
- `--title=`: title used in the starter presentation
- `--md`: create a standalone Markdown deck at `{presentation}.md`
- `--multi`: create a composed presentation directory with starter files
- `--force`: overwrite an existing presentation file

<a name="markdown-decks"></a>
## Markdown decks

If you want a content-first starting point, use the `--md` flag:

```shell
php artisan make:slidewire team/q1-kickoff --title="Q1 Kickoff" --md
```

This creates a standalone Markdown deck with starter frontmatter, slide separators, and a highlighted code example.

<a name="multi-file-decks"></a>
## Multi-file decks

If you want to start with composition, use the `--multi` flag:

```shell
php artisan make:slidewire team/q1-kickoff --title="Q1 Kickoff" --multi
```

This creates a presentation directory with a `deck.blade.php` file, a Blade intro slide, and a Markdown slide part so you can start with a mixed-source deck.

> [!NOTE]
> `--md` and `--multi` are mutually exclusive. Use `--md` for a single Markdown file or `--multi` for a composed deck directory.

<a name="interactive-mode"></a>
## Interactive mode

If you run the command without a presentation name, SlideWire prompts for:

- the presentation path
- the presentation title

```shell
php artisan make:slidewire
```

<a name="overwrite-existing-files"></a>
## Overwrite existing files

If the destination file or directory already exists, the command fails unless `--force` is supplied.

```shell
php artisan make:slidewire team/q1-kickoff --title="Q1 Kickoff" --force
```

<a name="slidewireremote"></a>
## `slidewire:remote`

Use `slidewire:remote` to start a session where viewers follow the presenter's slide and fragment position:

```shell
php artisan slidewire:remote team/q1-kickoff --ttl=2h --poll=2s
```

The presentation must be registered with `Route::slidewire()` using its generated route name. The command prints a signed controller URL for the presenter and a separate viewer URL to share with the audience.

Command signature:

```text
slidewire:remote
    {presentation : The presentation key (e.g. pitch)}
    {--ttl= : Session TTL using DSL format (e.g. 30m, 2h, 1d)}
    {--poll= : Viewer poll interval (e.g. 500ms, 2s)}
```

- `presentation`: required presentation key, such as `team/q1-kickoff`, rather than the presentation URL.
- `--ttl=`: session lifetime as a positive whole number with an `m`, `h`, or `d` suffix. Defaults to `RemoteConfig::ttl` (`2h`).
- `--poll=`: viewer polling interval as a positive whole number with an `ms` or `s` suffix. Defaults to `RemoteConfig::pollInterval` (`2s`).

Remote sessions require a persistent cache store with atomic lock support, shared by the command and web requests. See [Remote presenter control](./remote-control.md) for cache setup, viewer permissions, and session lifecycle.
