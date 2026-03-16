# CONTRIBUTING

Contributions are welcome, and are accepted via pull requests.
Please review these guidelines before submitting any pull requests.

For major changes, please open an issue first describing what you want to add or change.

## Process

1. Fork the project.
2. Create a new branch.
3. Make your changes, run the required checks, then commit and push.
4. Open a pull request describing what changed and why.

## Guidelines

* Please ensure the required checks pass before opening a pull request.
* Send a coherent commit history, making sure each individual commit in your pull request is meaningful.
* You may need to [rebase](https://git-scm.com/book/en/v2/Git-Branching-Rebasing) to avoid merge conflicts.

## Setup

Clone your fork, then install the development dependencies and prepare the application:

```bash
composer setup
```

To start the local development environment, run:

```bash
composer dev
```

## Contributing to the docs

The SlideWire documentation source lives in the `docs/` directory, and the website that renders those docs lives in this repository as well.

If you are updating documentation:

* Keep the writing style consistent with the existing guides in `docs/`.
* Update navigation or related links when adding, renaming, or removing pages.
* Preview the site locally with `composer dev` so you can verify the docs render correctly.

## Required checks

Run these checks before opening a pull request:

```bash
composer lint
composer test
```

If you prefer a single command, run:

```bash
composer prepare
```

If your changes affect the frontend output, also build the assets to verify the production bundle:

```bash
npm run build
```
