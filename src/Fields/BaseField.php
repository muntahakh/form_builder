<?php

namespace Muntaha\FormBuilder\Fields;

abstract class BaseField
{
    // identity
    protected string $name;
    protected ?string $id = null;
    protected mixed $value = null;

    // label
    protected ?string $label = null;
    protected array $labelAttributes = [];

    // state
    protected bool $required = false;
    protected bool $disabled = false;
    protected bool $readonly = false;
    protected bool $autofocus = false;

    // user experience
    protected ?string $placeholder = null;
    protected ?string $autocomplete = null;
    protected ?string $title = null;

    // validation state
    protected ?int $minLength = null;
    protected ?int $maxLength = null;
    protected ?string $pattern = null;

    // help / errors
    protected ?string $helpText = null;
    protected array $helpTextAttributes = [];
    protected ?string $error = null;
    protected array $errorAttributes = [];

    // customization
    protected array $attributes = [];

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->id = $name;
        $this->label = ucfirst($name);
        $this->placeholder = ucfirst($name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function id (string $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function value (mixed $value): static
    {
        $this->value = $value;
        return $this;
    }

    public function label (string $text = "", array $attributes = []): static
    {
        $this->label = $text;
        $this->labelAttributes = $attributes;
        return $this;
    }

    public function required (bool $required = true): static
    {
        $this->required = $required;
        return $this;
    }

    public function disabled (bool $disabled = true): static
    {
        $this->disabled = $disabled;
        return $this;
    }

    public function readonly (bool $readonly = true): static
    {
        $this->readonly = $readonly;
        return $this;
    }

    public function autofocus (bool $autofocus = true): static
    {
        $this->autofocus = $autofocus;
        return $this;
    }

    public function placeholder (string $placeholder): static
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    public function autocomplete (string $autocomplete): static
    {
        $this->autocomplete = $autocomplete;
        return $this;
    }

    public function title (string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function minLength (int $length): static
    {
        $this->minLength = $length;
        return $this;
    }

    public function maxLength (int $length): static
    {
        $this->maxLength = $length;
        return $this;
    }

    public function pattern (string $pattern): static
    {
        $this->pattern = $pattern;
        return $this;
    }

    public function helpText (string $helpText, array $helpTextAttributes = []): static
    {
        $this->helpText = $helpText;
        $this->helpTextAttributes = $helpTextAttributes;
        return $this;
    }

    public function error (string $error, array $errorAttributes = []): static
    {
        $this->error = $error;
        $this->errorAttributes = $errorAttributes;
        return $this;
    }

    public function class (string $class): static
    {
        $this->attributes['class'] = $class;
        return $this;
    }

    public function attribute (array $attributes): static
    {
        $this->attributes = array_merge($this->attributes, $attributes);
        return $this;
    }

    public function getState(): array
    {
        return [
            // identity
            'name' => $this->name,
            'id' => $this->id,
            'value' => $this->value,

            // label
            'label' => $this->label,
            'labelAttributes' => $this->labelAttributes,

            // state
            'required' => $this->required,
            'disabled' => $this->disabled,
            'readonly' => $this->readonly,
            'autofocus' => $this->autofocus,

            // user experience
            'placeholder' => $this->placeholder,
            'autocomplete' => $this->autocomplete,
            'title' => $this->title,

            // validation
            'minLength' => $this->minLength,
            'maxLength' => $this->maxLength,
            'pattern' => $this->pattern,

            // help / errors
            'helpText' => $this->helpText,
            'helpTextAttributes' => $this->helpTextAttributes,
            'error' => $this->error,
            'errorAttributes' => $this->errorAttributes,

            // customization
            'attributes' => $this->attributes,
        ];
    }
}
