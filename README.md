District5 - PHP library creator
====

[![CI](https://github.com/district-5/composer-package-with-tests/actions/workflows/ci.yml/badge.svg?branch=master)](https://github.com/district-5/composer-package-with-tests/actions)
[![Codecov](https://codecov.io/gh/district-5/composer-package-with-tests/branch/master/graph/badge.svg)](https://codecov.io/gh/district-5/composer-package-with-tests)

This repository is a template for creating a PHP library with tests.

It includes a basic structure for the library, as well as a test suite using PHPUnit.

Optionally you can include Codecov to track code coverage.

### Usage...

#### Clone and run...

1. `git clone git@github.com:district-5/composer-package-with-tests.git ./some-new-name`
2. `cd some-new-name`
3. `./convert.sh`

#### When running convert.sh...

   * Questions are asked in the following order:
     1. Base namespace (Default: District5)
     2. Project namespace: Required. Cannot be empty.
     3. Include Codecov in GitHub Actions workflow? (y/n) (Default: y)

Providing the following answers, the following will be generated:

 * Target name: `\District5\MyProject`
   * Answer 1: `District5`
   * Answer 2: `MyProject`


 * Target name: `\Foo\Bar`
   * Answer 1: `Foo`
   * Answer 2: `Bar`

```
Base namespace: Foo
Project namespace: Bar
Resulting Namespace: \Foo\Bar
```

### Reverting...

If you've run a generation, and want to undo the changes, simply issue the following command...

```
git reset HEAD . \
   && git checkout . \
   && git remote set-url origin git@github.com:district-5/composer-package-with-tests.git \
   && composer update \
   && ./vendor/bin/phpunit
```
