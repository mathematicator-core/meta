<h1 align="center">
    Mathematicator Meta Repository
</h1>

<p align="center">
    <a href="https://mathematicator.com" target="_blank">
        <img src="https://avatars3.githubusercontent.com/u/44620375?s=100&v=4">
    </a>
</p>

**[DEV ONLY PACKAGE]**
[![Integrity check](https://github.com/mathematicator-core/meta/workflows/Integrity%20check/badge.svg)](https://github.com/mathematicator-core/meta/actions?query=workflow%3A%22Integrity+check%22)
[![License: MIT](https://img.shields.io/badge/License-MIT-brightgreen.svg)](./LICENSE)


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
