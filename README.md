#Germania\PathPrefixer

**Recursively prepends a path prefix to path string, array or StdClass objects.**

[![Build Status](https://travis-ci.org/GermaniaKG/PathPrefixer.svg?branch=master)](https://travis-ci.org/GermaniaKG/PathPrefixer)
[![Code Coverage](https://scrutinizer-ci.com/g/GermaniaKG/PathPrefixer/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/PathPrefixer/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/GermaniaKG/PathPrefixer/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/PathPrefixer/?branch=master)

##Installation

```bash
$ composer require germania-kg/pathprefixer
```


##Usage

```php
<?php
use Germania\PathPrefixer\PathPrefixer;

// Root will default to getcwd()
$prefixer = new PathPrefixer( '/path/to/root' );

// Result: "/path/to/root/templates"
echo $prefixer('templates');


// Try on array:
$result = $prefixer([
	'foo' => 'includes',
	'bar' => 'templates'
]);
// Result: 
//	'foo' => '/path/to/root/includes',
//	'bar' => '/path/to/root/templates'


```


##Development and Testing

Develop using `develop` branch, using [Git Flow](https://github.com/nvie/gitflow).   
**Currently, no tests are specified.**

```bash
$ git clone git@github.com:GermaniaKG/PathPrefixer.git pathprefixer
$ cd pathprefixer
$ cp phpunit.xml.dist phpunit.xml
$ phpunit
```
