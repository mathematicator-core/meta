<h1 align="center">
    Mathematicator Framework Meta Repository
</h1>

<p align="center">
    <a href="https://mathematicator.com" target="_blank">
        <img src="https://avatars3.githubusercontent.com/u/44620375?s=100&v=4">
    </a>
</p>

[![Integrity check](https://github.com/mathematicator-core/meta/workflows/Integrity%20check/badge.svg)](https://github.com/mathematicator-core/meta/actions?query=workflow%3A%22Integrity+check%22)
[![License: MIT](https://img.shields.io/badge/License-MIT-brightgreen.svg)](./LICENSE)
[![PHPStan Enabled](https://img.shields.io/badge/PHPStan-enabled%20L8-brightgreen.svg?style=flat)](https://phpstan.org/)

**[DEV ONLY PACKAGE]**
**This repository is indended for easy bulk management of
[mathematicator-core](https://github.com/mathematicator-core) packages.**

**The main purpose is to keep all mathematicator-core packages
consistent.**

This package is NOT intended to be loaded as a project
composer dependency.

### Bulk operations

```bash
# Install dependencies for all repos
composer install:all

# Update dependencies in all repos
composer update:all

# Run tests in all repos
composer test:all

# Try to fix errors in all repos
composer fix:all

# Check PHPStan rules in all repos
composer phpstan:all
````

- See all available scripts in "scripts" section of composer.json.

### Consistency specification

- All repos should have the same Codestyle
    - You can check it by `composer cs:all`
    - All repos should have the same `.editorconfig`
- All master branches should be compatible
    - Except dependent Pull requests that should be solved ASAP.
    (Please mark PRs as dependent if so.)
    - You can check it by `composer update`

## Workflows

### Working with meta repository
- Clone this meta repository with all its submodules
- Fork the repository you want to modify
- Change origin to upstream and speficy origin as the forked repository
in submodule placed in libs/*/
- Commit and submit PRs as usual.

### IDE setup
- The recommended IDE is [PHPStorm](https://www.jetbrains.com/phpstorm/),
however you can any other IDE by your preferences.
    - This repository contains .idea/ dir with PHPStorm project definition,
    so you can start fast with zero manual IDE setup.

### Bulk operations
- At the beginning you have to run `composer install:all`
- Then run any other bulk operation, e.g. `composer phpstan:all`

## Development documentation

See [Development documentation](docs/dev.md)

## Contribution

Feel free to open an issue or open a Pull Request.

## Mathematicator Framework tools structure

The biggest advantage is that you can choose which layer best fits
your needs and start build on the top of it, immediately, without the need
to create everything by yourself. Our tools are tested for bugs
and tuned for performance, so you can save a significant amount
of your time, money, and effort.

Framework tend to be modular as much as possible, so you should be able
to create an extension on each layer and its sublayers.

**Mathematicator framework layers** ordered from the most concrete
one to the most abstract one:

<table>
    <tr>
        <td>
            <b>
            <a href="https://github.com/mathematicator-core/search">
                Search
            </a>
            </b>
        </td>
        <td>
            Modular search engine layer that calls its sublayers
            and creates user interface.
        </td>
    </tr>
    <tr>
        <td>
            <b>
            <a href="https://github.com/mathematicator-core/vizualizator">
                Vizualizator
            </a>
            </b>
        </td>
        <td>
            Elegant graphic visualizer that can render to
            SVG, PNG, JPG and Base64.<br />
            <u>Extensions:</u>
            <b>
            <a href="https://github.com/mathematicator-core/mandelbrot-set">
                Mandelbrot set generator
            </a>
            </b>
        </td>
    </tr>
    <tr>
        <td>
            <b>
            <a href="https://github.com/mathematicator-core/calculator">
                Calculator
            </a>
            </b>
        </td>
        <td>
            Modular advance calculations layer.
            <br />
            <u>Extensions:</u>
            <b>
            <a href="https://github.com/mathematicator-core/integral-solver">
                Integral Solver
            </a>,
            <a href="https://github.com/mathematicator-core/statistic">
                Statistics
            </a>
            </b>
        </td>
    </tr>
    <tr>
        <td>
            <b>
            <a href="https://github.com/mathematicator-core/engine">
                Engine
            </a>
            </b>
        </td>
        <td>
            Core logic layer that maintains basic controllers,
            DAOs, translator, common exceptions, routing etc.
        </td>
    </tr>
    <tr>
        <td>
            <b>
            <a href="https://github.com/mathematicator-core/tokenizer">
                Tokenizer
            </a>
            </b>
        </td>
        <td>
            Tokenizer that can convert string (user input / LaTeX) to numbers
            and operators.
        </td>
    </tr>
    <tr>
        <td>
            <b>
            <a href="https://github.com/mathematicator-core/numbers">
                Numbers
            </a>
            </b>
        </td>
        <td>
            Fast & secure storage for numbers with arbitrary precision.
            It supports Human string and LaTeX output and basic conversions.
        </td>
    </tr>
</table>

**Third-party packages:**

⚠️ Not guaranteed!

<table>
    <tr>
        <td>
            <b>
            <a href="https://github.com/cothema/math-php-api">
                REST API
            </a>
            </b>
        </td>
        <td>
            Install the whole pack as a REST API service
            on your server (Docker ready) or
            access it via public cloud REST API.
        </td>
    </tr>
</table>
