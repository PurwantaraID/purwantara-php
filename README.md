# Purwantara PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/purwantaraid/purwantara-php.svg?style=flat-square)](https://packagist.org/packages/purwantaraid/purwantara-php)
[![Tests](https://img.shields.io/github/actions/workflow/status/purwantaraid/purwantara-php/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/purwantaraid/purwantara-php/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/purwantaraid/purwantara-php.svg?style=flat-square)](https://packagist.org/packages/purwantaraid/purwantara-php)

PHP Wrapper for Purwantara API.

## Installation

You can install the package via composer:

```bash
composer require purwantaraid/purwantara-php
```

## Usage

```php
$config = [
    'is_sandbox' => false, 
    'token' => 'XXXXXXXX'
];
```

### Virtual Account

```php
use Purwantara\Purwantara\Collect\VirtualAccount;


$request = new VirtualAccount($config);

// Create transaction
$response = $request->create($data);

// Get all transactions
$response = $request->get();

// Get transaction by UUID
$response = $request->get($uuid);

// Cancel transaction by UUID
$response = $request->cancel($uuid);
```
### QRIS

```php
use Purwantara\Purwantara\Collect\Qris;

$request = new Qris($config);

// Create transaction
$response = $request->create($data);

// Get all transactions
$response = $request->get();

// Get transaction by UUID
$response = $request->get($uuid);
```

### Over the Counter

```php
use Purwantara\Purwantara\Collect\Otc;

$request = new Otc($config);

// Create transaction
$response = $request->create($data);

// Get all transactions
$response = $request->get();

// Get transaction by UUID
$response = $request->get($uuid);
```

### Payment Link

```php
use Purwantara\Purwantara\Collect\PaymentLink;


$request = new PaymentLink($config);

// Create transaction
$response = $request->create($data);

// Get transaction
$response = $request->get($uuid);
```

## Testing

```bash
PPN_TOKEN="XXXX" composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
