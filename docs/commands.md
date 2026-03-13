# Commands

- [`make:slidewire`](#make-slidewire)
- [Arguments and options](#arguments-and-options)
- [Interactive mode](#interactive-mode)
- [Overwrite existing files](#overwrite-existing-files)

SlideWire currently ships with a single scaffolding command for creating presentation files.

<a name="make-slidewire"></a>
## `make:slidewire`

Use `make:slidewire` to generate a new presentation scaffold.

```shell
php artisan make:slidewire team/q1-kickoff --title="Q1 Kickoff"
```

The generated file is written to the first configured presentation root and uses the package stub.

That stub is a Livewire single-file component and includes Flux UI-based starter slides, so you can begin editing immediately.

Command signature:

```text
make:slidewire
    {name? : The presentation path, e.g. team/q1-kickoff}
    {--presentation= : The presentation path override}
    {--title= : The first slide title}
    {--force : Overwrite existing files}
```

<a name="arguments-and-options"></a>
## Arguments and options

- `name`: optional presentation key such as `team/q1-kickoff`
- `--presentation=`: explicit presentation key that overrides `name`
- `--title=`: title used in the starter presentation
- `--force`: overwrite an existing presentation file

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

If the destination file already exists, the command fails unless `--force` is supplied.

```shell
php artisan make:slidewire team/q1-kickoff --title="Q1 Kickoff" --force
```
