## Development documentation

### Git repository

- All repositories contains **pre-commit hooks** to "fail early".
If some test fails or code standards are not met, it will prevent
commit to repository.
    - However if you want to commit even so, you can commit with
    `git commit --no-verify`

### Tests

All new contributions should have its unit tests in `/tests` directory.

Before you send a PR, please, check all tests pass.

This package uses [Nette Tester](https://tester.nette.org/). You can run tests via command:
```bash
composer test
````

Before PR, please run complete code check via command:
```bash
composer cs:install # only first time
composer fix # otherwise pre-commit hook can fail
````

