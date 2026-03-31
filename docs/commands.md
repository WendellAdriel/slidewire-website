# Commands

- [`make:slidewire`](#make-slidewire)
- [Arguments and options](#arguments-and-options)
- [Markdown decks](#markdown-decks)
- [Multi-file decks](#multi-file-decks)
- [Interactive mode](#interactive-mode)
- [Overwrite existing files](#overwrite-existing-files)

SlideWire currently ships with a single scaffolding command for creating presentation files, standalone Markdown decks, and composed multi-file decks.

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
