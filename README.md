# Digestif helps you create unique unguessable URLs

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
// seed value should be unique for that server/application.
// It's important that it is not known to the outside world.
// It should be the same for the application creating the Digest as the one reading/verifying it 

$url = "https://secure.example.com/invoice/1200323";
// if you make your URL like this, the URL for the other invoices can be guessed (e.g. 1200324, etc)

$digest = $dig->fromString($url);
$secure_url = "$url/$digest";
// URL = https://secure.example.com/invoice/1200323/0a1b-2c3d
// using a route /invoice/{id}/{digest} will allow you to verify the digest
// the URL of the next invoice 1200324 cannot be guessed without knowing the seed value

// or use this
$secure_url = "$url?$digest";
//URL = https://secure.example.com/invoice/1200323?0a1b-2c3d
// and then verify the digest before showing the actual invoice
if(!$dig->compareDigest($dig->fromString($url), $digest)){
    return false;
}
// 0a1b-2c3d will be ok, as 0a1b2c3d (without dash)
``` 

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
