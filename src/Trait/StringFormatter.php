<?php

namespace App\Trait;

use Jawira\CaseConverter\Convert;

trait StringFormatter
{
    public function camelCase(string $attribute): string
    {
        return (new Convert($attribute))->toCamel();
    }

    public function snakeCase(string $attribute): string
    {
        return (new Convert($attribute))->toSnake();
    }
}