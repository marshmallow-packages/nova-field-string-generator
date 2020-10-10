<?php

namespace Marshmallow\NovaGenerateString;

use Laravel\Nova\Fields\Password;
use Marshmallow\NovaGenerateString\Traits\GenerateStringTrait;

class GeneratePassword extends Password
{
    public $component = 'generate-password';

    use GenerateStringTrait;
}
