# Nova Random String Generation Field
A Laravel Nova field for generating a random string

## Installation:

You can install the package in to a Laravel app that uses Nova via composer:

```bash
composer require marshmallow/nova-generate-string
```

```php
use Marshmallow\NovaGenerateString\GenerateString;

and add in the fields

GenerateString::make('Password')
    ->onlyOnForms()
    ->creationRules('required', 'string', 'min:6')
    ->updateRules('nullable', 'string', 'min:6')
    //You can specifiy the password length here
    ->length(12)
    //exclude characters types from password (Symbols, Numbers. Uppercase, Lowercase), do not call method to include all types
    ->excludeRules(['Symbols']),

GeneratePassword::make('Password'),

## License:
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
