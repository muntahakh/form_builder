<?php

namespace Muntaha\FormBuilder\Button;

class Button
{
    protected ?string $type = null;
    protected ?string $name = null;
    protected ?string $value = null;
    protected bool $disabled = false;

    protected array $attributes = [];

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function name(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function value(string $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function disabled(bool $disabled = true): static
    {
        $this->disabled = $disabled;

        return $this;
    }

    public function class(string $class): static
    {
        $this->attributes['class'] = $class;

        return $this;
    }

    public function attribute(array $attributes): static
    {
        $this->attributes = array_merge($this->attributes, $attributes);

        return $this;
    }

    public function getState(): array
    {
        return [
            'type' => $this->type,
            'name' => $this->name,
            'value' => $this->value,
            'disabled' => $this->disabled,
            'attributes' => $this->attributes,
        ];
    }
}