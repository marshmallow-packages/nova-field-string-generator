<?php

namespace Marshmallow\NovaGenerateString;

use Laravel\Nova\Fields\Text;
use Marshmallow\NovaGenerateString\Traits\GenerateStringTrait;

class GenerateString extends Text
{
	public $component = 'generate-password';
    use GenerateStringTrait;
}
