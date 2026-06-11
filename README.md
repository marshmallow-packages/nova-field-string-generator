![alt text](https://marshmallow.dev/cdn/media/logo-red-237x46.png "marshmallow.")

# Nova Random String Generation Field

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marshmallow/nova-field-string-generator.svg?style=flat-square)](https://packagist.org/packages/marshmallow/nova-field-string-generator)
[![Total Downloads](https://img.shields.io/packagist/dt/marshmallow/nova-field-string-generator.svg?style=flat-square)](https://packagist.org/packages/marshmallow/nova-field-string-generator)

A Laravel Nova field for generating a random string. This can be used for a Text field and for a Password field.

## Installation

Install the package into a Laravel application that uses Nova via Composer:

```bash
composer require marshmallow/nova-field-string-generator
```

The field's service provider is auto-discovered, so there is nothing else to register.

## Usage

The package ships two fields, both living in the `Marshmallow\NovaGenerateString` namespace:

- `GenerateString` — extends Nova's `Text` field.
- `GeneratePassword` — extends Nova's `Password` field.

Add them to the `fields()` method of your Nova resource:

```php
use Marshmallow\NovaGenerateString\GenerateString;
use Marshmallow\NovaGenerateString\GeneratePassword;

public function fields(NovaRequest $request)
{
    return [
        GenerateString::make(__('Random string'), 'random_string')
            ->onlyOnForms()
            ->creationRules('required', 'string', 'min:12')
            ->updateRules('nullable', 'string', 'min:12')
            // Specify the length of the generated string.
            ->length(12)
            // Exclude character types from the generated string. Available types:
            // Symbols, Numbers, Uppercase, Lowercase, Similar.
            // Omit this call to include all types.
            ->excludeRules(['Symbols', 'Lowercase', 'Similar']),

        GeneratePassword::make(__('Password'), 'password'),
    ];
}
```

Because both fields extend their respective Nova base fields (`Text` and `Password`), every standard Nova field method (`rules()`, `onlyOnForms()`, `creationRules()`, `updateRules()`, etc.) is available alongside the generator-specific methods below.

### Available methods

| Method | Description |
| --- | --- |
| `length(int $length)` | Sets the length of the generated string. |
| `excludeRules(array $rules)` | Excludes character types from the generated string. Accepts any of `Symbols`, `Numbers`, `Uppercase`, `Lowercase`, `Similar`. Omit it to include every type. |

## Credits

- [Marshmallow](https://github.com/marshmallow-packages)
- [All Contributors](https://github.com/marshmallow-packages/nova-field-string-generator/contributors)

## Security Vulnerabilities

Please report security vulnerabilities by email rather than via the public issue tracker.

## License

The MIT License (MIT). Please see the [License File](LICENSE.md) for more information.
