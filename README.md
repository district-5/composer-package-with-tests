District5 - PHP library creator
====

This repository is a template for creating a PHP library with tests.

It includes a basic structure for the library, as well as a test suite using PHPUnit.

Optionally you can include Codecov to track code coverage.

### Usage...

##### Quick route...

1. `git clone git@github.com:district-5/composer-package-with-tests.git ./some-new-name`
2. `cd some-new-name`
3. `./convert.sh`

##### Full steps...

1. `git clone git@github.com:district-5/composer-package-with-tests.git`
2. Edit the files, replacing `ComposerTemplateTests` with the name of your package and append `Tests`. For example...
   `MyPackageTests`
3. Edit the files, replacing `ComposerTemplate` with the name of your package. For example... `MyPackage`.
4. The files you'll change are `composer.json`, `phpunit.xml` and several files across the `src` and `tests` directory.
5. Install the autoloader with `composer install`
6. Run the test suite `./vendor/bin/phpunit`

### Undoing the change...

If you've run a generation, and want to undo the changes, simply issue the following command...

```
git reset HEAD . \
   && git checkout . \
   && git remote set-url origin git@github.com:district-5/composer-package-with-tests.git \
   && composer update \
   && ./vendor/bin/phpunit
```
