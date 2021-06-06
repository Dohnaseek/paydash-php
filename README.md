# PayDash PHP Client

[![Latest Stable Version](https://poser.pugx.org/dohnaseek/paydash-php/v/stable.svg)](https://packagist.org/packages/dohnaseek/paydash-php)
[![Total Downloads](https://poser.pugx.org/dohnaseek/paydash-php/downloads.svg)](https://packagist.org/packages/dohnaseek/paydash-php)
[![License](https://poser.pugx.org/dohnaseek/paydash-php/license.svg)](https://packagist.org/packages/dohnaseek/paydash-php)

The PayDash PHP Client provides convenient access to the PayDash API from applications written in the PHP language.

## Requirements

PHP 5.6.0 and later

## Composer

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require dohnaseek/paydash-php
```

```php
require_once('vendor/autoload.php');
```

## Getting Started

Simple usage looks like:

```php
require_once 'vendor/autoload.php';

$paydash = new \Dohnaseek\PayDashClient("YOUR_API_KEY_FROM_PAYDASH");
$paydash->setAmount("12.00");
$paydash->setIPN("https://paydash.co.uk/ipn.php");
$paydash->setReturnURL("https://paydash.co.uk");
$paydash->setCustomerEmail("phpclasstest@flareco.dev");
$paydash->setMetaData("Hello :D");
$x = $paydash->execute();

print_r($x);

// Returns the token of the transaction. $x = XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXX
// Then you can redirect the customer to https://paydash.co.uk/checkout/{token}
// If something goes wrong it will throw an exception. Use a try catch block for better usage.

// header("Location: https://paydash.co.uk/checkout/$x");
// exit;

```

## Notes

This libary is not official.
Not partnered or affiliated with Paydash.co.uk in any way.

[composer]: https://getcomposer.org/
[paydash]: https://paydash.co.uk
