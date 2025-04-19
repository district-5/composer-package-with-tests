Composer library template
====

A boilerplate composer library, featuring PHPUnit.

### Usage...

##### Quick route...

1. `git clone git@github.com:district-5/composer-package-with-tests.git`
2. `cd composer-package-with-tests`
3. `./convert.sh` OR `./convert.sh MyNamespaceName`

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
