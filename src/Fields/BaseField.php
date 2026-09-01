<?php

namespace Muntaha\FormBuilder\Fields;

use Muntaha\FormBuilder\Traits\HasAttributes;

abstract class BaseField
{
    use HasAttributes;

    protected string $tag_name;
    protected string $name;
    protected mixed $value = null;

    protected ?string $label = null;
    protected array $label_attributes = [];

    protected ?string $help_text = null;
    protected array $help_text_attributes = [];

    protected ?string $error = null;
    protected array $error_attributes = [];

    public function __construct(string $tag_name, string $name)
    {
        $this->tag_name = $tag_name;
        $this->name = $name;

        $this->attributes = [
            'id' => $name,
            'placeholder' => ucfirst($name),
        ];
    }

    /**
     *  SETTERS
     */

    public function value(mixed $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function label(string $text = "", array $attributes = []): static
    {
        $this->label = $text;
        $this->label_attributes = $attributes;

        return $this;
    }

    public function helpText(string $help_text, array $attributes = []): static
    {
        $this->help_text = $help_text;
        $this->help_text_attributes = $attributes;

        return $this;
    }

    public function error(string $error, array $attributes = []): static
    {
        $this->error = $error;
        $this->error_attributes = $attributes;

        return $this;
    }

    /**
     *  GETTERS
     */

    public function getTagName(): string
    {
        return $this->tag_name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function getLabelAttributes(): array
    {
        return $this->label_attributes;
    }

    public function getHelpText(): ?string
    {
        return $this->help_text;
    }

    public function getHelpTextAttributes(): array
    {
        return $this->help_text_attributes;
    }

    public function getError(): ?string
    {
        return $this->error;
    }

    public function getErrorAttributes(): array
    {
        return $this->error_attributes;
    }
}