# Changelog

- [Introduction](#introduction)
- [v1.4.2](#v142)
- [v1.4.1](#v141)
- [v1.4.0](#v140)
- [v1.3.2](#v132)
- [v1.3.1](#v131)
- [v1.3.0](#v130)
- [v1.2.0](#v120)
- [v1.1.0](#v110)
- [v1.0.1](#v101)

This page tracks notable SlideWire releases so you can quickly review what changed between versions.

<a name="introduction"></a>
## Introduction

SlideWire follows semantic versioning. Patch releases usually focus on targeted fixes and polish, while minor and major releases may introduce new features or broader changes.

If you need the full release history, including pull requests and comparisons, you may also review the [GitHub releases page](https://github.com/WendellAdriel/slidewire/releases).

<a name="v142"></a>
## v1.4.2

`v1.4.2` is a focused patch release that keeps active slides aligned after repeated presentation navigation.

- Fixed stale frame transition animations so moving backward and forward through slide, fade, zoom, and vertical transitions no longer leaves active slides visually offset.

For the complete comparison, see the [`v1.4.1...v1.4.2` release diff](https://github.com/WendellAdriel/slidewire/compare/v1.4.1...v1.4.2).

<a name="v141"></a>
## v1.4.1

`v1.4.1` is a focused patch release that improves the default presentation styling for standalone Markdown slides.

- Fixed the default typography and list styling for Markdown-backed slides so headings, paragraphs, and bullets render more like Blade-authored slides.

For the complete comparison, see the [`v1.4.0...v1.4.1` release diff](https://github.com/WendellAdriel/slidewire/compare/v1.4.0...v1.4.1).

<a name="v140"></a>
## v1.4.0

`v1.4.0` is a feature release that gives SlideWire more flexible authoring workflows for teams that want to build decks outside a single Blade file.

- Added support for standalone Markdown presentations with deck frontmatter, per-slide frontmatter, slide separators, and highlighted code blocks.
- Added support for composed presentation directories so decks may combine ordered Blade and Markdown slide parts.
- Updated `make:slidewire` so you may scaffold Markdown decks or multi-file presentations from the command line.

For the complete comparison, see the [`v1.3.2...v1.4.0` release diff](https://github.com/WendellAdriel/slidewire/compare/v1.3.2...v1.4.0).

<a name="v132"></a>
## v1.3.2

`v1.3.2` is a focused patch release that restores compatibility with Laravel's config caching when SlideWire uses DTO-based configuration.

- Fixed DTO config serialization so `php artisan config:cache` can successfully cache SlideWire configuration values.

For the complete comparison, see the [`v1.3.1...v1.3.2` release diff](https://github.com/WendellAdriel/slidewire/compare/v1.3.1...v1.3.2).

<a name="v131"></a>
## v1.3.1

`v1.3.1` is a focused patch release that restores support for the media split layout in the package guidance and component surface.

- Added support for the media split layout as a documented first-party component again.

For the complete comparison, see the [`v1.3.0...v1.3.1` release diff](https://github.com/WendellAdriel/slidewire/compare/v1.3.0...v1.3.1).

<a name="v130"></a>
## v1.3.0

`v1.3.0` is a feature release that adds a first-party set of presentation-ready UI components for modern SlideWire decks.

- Added first-party UI components for panels, title slides, split layouts, timelines, steps, and agendas.
- Added per-instance `font` overrides to the `text` component so decks can mix configured presentation fonts without custom inline styles.

For the complete comparison, see the [`v1.2.0...v1.3.0` release diff](https://github.com/WendellAdriel/slidewire/compare/v1.2.0...v1.3.0).

<a name="v120"></a>
## v1.2.0

`v1.2.0` is a feature release that improves navigation for fragment-heavy presentations and makes the mobile viewing experience smoother.

- Added fragment-aware navigation so moving between slides respects fragment state.
- Improved mobile scrolling behavior for presentations on smaller screens.
- Included the first community contribution to SlideWire from [@bpotmalnik](https://github.com/bpotmalnik).

For the complete comparison, see the [`v1.1.0...v1.2.0` release diff](https://github.com/WendellAdriel/slidewire/compare/v1.1.0...v1.2.0).

<a name="v110"></a>
## v1.1.0

`v1.1.0` is a feature release that expands SlideWire's presentation building blocks with new content components.

- Added a `text` component for semantic headings, paragraphs, inline text, vertical layouts, and component-level animations.
- Added an `image` component that preserves the native image API while supporting the same animation contract.

For the complete comparison, see the [`v1.0.1...v1.1.0` release diff](https://github.com/WendellAdriel/slidewire/compare/v1.0.1...v1.1.0).

<a name="v101"></a>
## v1.0.1

`v1.0.1` is a focused patch release that improves presentation behavior on smaller screens.

- Fixed slide overflow on smaller screens.

For the complete comparison, see the [`v1.0.0...v1.0.1` release diff](https://github.com/WendellAdriel/slidewire/compare/v1.0.0...v1.0.1).
