# This is my package digestif

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pforret/digestif.svg?style=flat-square)](https://packagist.org/packages/pforret/digestif)
[![Tests](https://img.shields.io/github/actions/workflow/status/pforret/digestif/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/pforret/digestif/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/pforret/digestif.svg?style=flat-square)](https://packagist.org/packages/pforret/digestif)

Package to create a digest of a string/array, to be used in creating unique unguessable URLs/folder names.

## Installation

You can install the package via composer:

```bash
composer require pforret/digestif
```

## Usage

```php
$dig = new Digestif(env("DIGEST_SEED"));
$url = "$url_root/$package_id";
$digest = $dig->fromString($url);
$secure_url = "$url/$digest";
// or 
$secure_url = "$url?$digest";
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Peter Forret](https://github.com/pforret)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
