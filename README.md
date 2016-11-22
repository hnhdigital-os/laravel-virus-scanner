# Laravel Virus Scan

[![Latest Stable Version](https://poser.pugx.org/bluora/laravel-virus-scanner/v/stable.svg)](https://packagist.org/packages/bluora/laravel-virus-scanner) [![Total Downloads](https://poser.pugx.org/bluora/laravel-virus-scanner/downloads.svg)](https://packagist.org/packages/bluora/laravel-virus-scanner) [![Latest Unstable Version](https://poser.pugx.org/bluora/laravel-virus-scanner/v/unstable.svg)](https://packagist.org/packages/bluora/laravel-virus-scanner) [![License](https://poser.pugx.org/bluora/laravel-virus-scanner/license.svg)](https://packagist.org/packages/bluora/laravel-virus-scanner)

[![Build Status](https://travis-ci.org/bluora/laravel-virus-scanner.svg?branch=master)](https://travis-ci.org/bluora/laravel-virus-scanner) [![StyleCI](https://styleci.io/repos/73760736/shield?branch=master)](https://styleci.io/repos/73760736) [![Test Coverage](https://codeclimate.com/github/bluora/laravel-virus-scanner/badges/coverage.svg)](https://codeclimate.com/github/bluora/laravel-virus-scanner/coverage) [![Issue Count](https://codeclimate.com/github/bluora/laravel-virus-scanner/badges/issue_count.svg)](https://codeclimate.com/github/bluora/laravel-virus-scanner) [![Code Climate](https://codeclimate.com/github/bluora/laravel-virus-scanner/badges/gpa.svg)](https://codeclimate.com/github/bluora/laravel-virus-scanner) 

Provides a Laravel console command wrapper around clamscan.

## Installation

Install via composer:

`composer require-dev bluora/laravel-virus-scanner dev-master`

Add it to your available console commands in app/Console/Kernel.php:

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
