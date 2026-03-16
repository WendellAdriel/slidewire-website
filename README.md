<div align="center">
    <img src="https://github.com/WendellAdriel/slidewire-website/raw/main/public/slidewire-logo.png" alt="SlideWire logo" height="220"/>
    <p>
        <h1>SlideWire</h1>
        Create beautiful presentations powered by Livewire
    </p>
</div>

SlideWire is a Laravel package for building presentation decks with Livewire. Presentations are built as Blade files, rendered as a full-page Livewire experience, and support navigation, themes, fragments, code highlighting, diagrams, vertical stacks, and timed auto-slide flows.

## Website and docs source

This repository contains the source code for the SlideWire website and documentation published at [slidewire.dev](https://slidewire.dev). It is the place to contribute website improvements, documentation updates, and examples for the SlideWire ecosystem.

## Local development

Use the Composer scripts in this repository to get started quickly:

```bash
composer setup
```

This installs PHP and Node dependencies, prepares the environment file, generates the application key, runs the database migrations, and builds the frontend assets.

To run the local development environment, use:

```bash
composer dev
```

Before opening a pull request, run the project checks:

```bash
composer lint
composer test
```

If you want a single command that runs the full lint and test suite, use:

```bash
composer prepare
```

## Contributing

Check the **[Contributing Guide](CONTRIBUTING.md)** for setup, documentation contribution notes, and the checks required before opening a pull request.
