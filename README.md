# Branca adapter for Laravel

## Prerequisites

- PHP 8.3
- Laravel 10+

## Installation

```sh
$ composer require blu3code/branca-laravel
```

## Usage and examples

Encode data

```php
use Blu3\Branca\Branca;

$token = Branca::encrypt([
    'user_id' => str()->uuid()->toString()
]);

// 2XNldO3iiX1pkDzPzfUCdpoQM0jpqVUtj52V6...
```

Decode data

```php
use Blu3\Branca\Branca;

$tokenData = Branca::decrypt(request()->bearerToken());

// ['user_id' => 'd0d948f3-cd7a-4b9b-9694-aad1ffa4907b']
```