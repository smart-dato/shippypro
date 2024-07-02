# ShippyPro API SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/smart-dato/shippypro.svg?style=flat-square)](https://packagist.org/packages/smart-dato/shippypro)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/smart-dato/shippypro/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/smart-dato/shippypro/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/smart-dato/shippypro/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/smart-dato/shippypro/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/smart-dato/shippypro.svg?style=flat-square)](https://packagist.org/packages/smart-dato/shippypro)

This is a Laravel plugin for the [ShippyPro API](https://www.shippypro.com/ShippyPro-API-Documentation/)

## Installation

You can install the package via composer:

```bash
composer require /shippypro
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="shippypro-config"
```

This is the contents of the published config file:

```php
return [
    'url' => env('SHIPPYPRO_URL', 'https://www.shippypro.com/api'),
    'authkey' => env('SHIPPYPRO_AUTH_KEY', ''),
];
```

## Usage

```php
    $data = new \SmartDato\ShippyPro\Data\Shipment\ShipmentData(...); 
    $connector = new \SmartDato\ShippyPro\ShippyPro();
    $response = (new \SmartDato\ShippyPro\Resource\Shipment($connector))
        ->create($data);
```

For a complete code example see [IntegrationTest](./tests/IntegrationTest.php)

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [SmartDato](https://github.com/smart-dato)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
