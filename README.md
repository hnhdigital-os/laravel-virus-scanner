# Laravel Virus Scanner

This package has been developed by H&H|Digital, an Australian botique developer. Visit us at [hnh.digital](http://hnh.digital).

[![Latest Stable Version](https://poser.pugx.org/bluora/laravel-virus-scanner/v/stable.svg)](https://packagist.org/packages/bluora/laravel-virus-scanner) [![Total Downloads](https://poser.pugx.org/bluora/laravel-virus-scanner/downloads.svg)](https://packagist.org/packages/bluora/laravel-virus-scanner) [![Latest Unstable Version](https://poser.pugx.org/bluora/laravel-virus-scanner/v/unstable.svg)](https://packagist.org/packages/bluora/laravel-virus-scanner) [![License](https://poser.pugx.org/bluora/laravel-virus-scanner/license.svg)](https://packagist.org/packages/bluora/laravel-virus-scanner)

[![Build Status](https://travis-ci.org/bluora/laravel-virus-scanner.svg?branch=master)](https://travis-ci.org/bluora/laravel-virus-scanner) [![StyleCI](https://styleci.io/repos/73760736/shield?branch=master)](https://styleci.io/repos/73760736) [![Test Coverage](https://codeclimate.com/github/bluora/laravel-virus-scanner/badges/coverage.svg)](https://codeclimate.com/github/bluora/laravel-virus-scanner/coverage) [![Issue Count](https://codeclimate.com/github/bluora/laravel-virus-scanner/badges/issue_count.svg)](https://codeclimate.com/github/bluora/laravel-virus-scanner) [![Code Climate](https://codeclimate.com/github/bluora/laravel-virus-scanner/badges/gpa.svg)](https://codeclimate.com/github/bluora/laravel-virus-scanner) 

Provides a Laravel console command wrapper around clamscan.

## Install

Via composer:

`$ composer require-dev bluora/laravel-virus-scanner dev-master`

Enable the console command by editing app/Console/Kernel.php:

```php
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
      ...
      \Bluora\LaravelVirusScanner\VirusScannerCommand::class,
    ];
```

## Usage

Run the console command using the following:

`# php artisan virus:scan storage`

The path can be a file or a folder. 

Any infected files are renamed by prepending '.virus.'.

## Contributing

Please see [CONTRIBUTING](https://github.com/bluora/laravel-virus-scanner/blob/master/CONTRIBUTING.md) for details.

## Credits

* [Rocco Howard](https://github.com/therocis)
* [All Contributors](https://github.com/bluora/laravel-virus-scanner/contributors)

## License

The MIT License (MIT). Please see [License File](https://github.com/bluora/laravel-virus-scanner/blob/master/LICENSE) for more information.
