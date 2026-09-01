<?php

namespace Muntaha\FormBuilder\Traits;

use BadMethodCallException;
use Illuminate\Support\Str;

trait HasAttributes
{
    protected array $attributes = [];

    public function setDynamicAttribute(string $method, array $arguments): static
    {
        $attribute = $this->normalizeAttribute(Str::snake($method));
        $this->attributes[$attribute] = $arguments[0] ?? null;
        return $this;
    }

    public function __call(string $method, array $arguments): static
    {
        return $this->setDynamicAttribute($method, $arguments);
    }

    protected function normalizeAttribute(string $attribute): string
    {
        if (!is_string($attribute) || !preg_match('/^[a-z]+(?:[A-Z_][a-z_]*)*$/', $attribute)) {
            throw new BadMethodCallException(
                "Invalid Method [{$attribute}]."
            );
        }
        return str_replace('_', '', $attribute);
    }

    public function attributes (array $attributes): static
    {
        $this->attributes = array_merge(
            $this->attributes,
            $attributes
        );

        return $this;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }
}