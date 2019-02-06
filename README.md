# Germania KG · PathPrefixer

**Recursively prepends a path prefix to path string, array or StdClass objects.**

[![Packagist](https://img.shields.io/packagist/v/germania-kg/pathprefixer.svg?style=flat)](https://packagist.org/packages/germania-kg/pathprefixer)
[![PHP version](https://img.shields.io/packagist/php-v/germania-kg/pathprefixer.svg)](https://packagist.org/packages/germania-kg/pathprefixer)
[![Build Status](https://img.shields.io/travis/GermaniaKG/PathPrefixer.svg?label=Travis%20CI)](https://travis-ci.org/GermaniaKG/PathPrefixer)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/GermaniaKG/PathPrefixer/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/PathPrefixer/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/GermaniaKG/PathPrefixer/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/PathPrefixer/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/GermaniaKG/PathPrefixer/badges/build.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/PathPrefixer/build-status/master)


## Installation with Composer

```bash
$ composer require germania-kg/pathprefixer
```


## Usage

```php
<?php
use Germania\PathPrefixer\PathPrefixer;

// Root will default to getcwd()
$prefixer = new PathPrefixer( '/path/to/root' );

echo $prefixer('templates');
// Result: "/path/to/root/templates"


// Try on array:
$result = $prefixer([
	'foo' => 'includes',
	'bar' => 'templates'
]);
// Result: 
//	'foo' => '/path/to/root/includes',
//	'bar' => '/path/to/root/templates'
```

### Custom path separators

Per default, the `DIRECTORY_SEPARATOR` constant will be used for glueing the prefix and the path.
You may pass a custom seperator as well:

```php
<?php
$prefixer = new PathPrefixer( '/path/to/root', "@" );

echo $prefixer('templates');
// Result: "/path/to/root@templates"
```

## Issues

See [issues list.][i0]

[i0]: https://github.com/GermaniaKG/PathPrefixer/issues 

## Development

```bash
$ git clone https://github.com/GermaniaKG/PathPrefixer.git
$ cd PathPrefixer
$ composer install
```

## Unit tests

Either copy `phpunit.xml.dist` to `phpunit.xml` and adapt to your needs, or leave as is. Run [PhpUnit](https://phpunit.de/) test or composer scripts like this:

```bash
$ composer test
# or
$ vendor/bin/phpunit
```

