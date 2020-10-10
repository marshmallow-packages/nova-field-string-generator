<?php

namespace Marshmallow\NovaGenerateString\Traits;

trait GenerateStringTrait
{
    public function length($length)
    {
        return $this->withMeta([
            'length' => $length,
        ]);
    }

    public function excludeRules($rules)
    {
        return $this->withMeta([
            'exclude_rules' => $rules,
        ]);
    }
}
