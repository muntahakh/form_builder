<?php

namespace Muntaha\FormBuilder\Form;

use Muntaha\FormBuilder\Button\Button;
use Muntaha\FormBuilder\Fields\BaseField;
use Muntaha\FormBuilder\Fields\NumberField;
use Muntaha\FormBuilder\Fields\TextField;
use Muntaha\FormBuilder\Services\ThemeManager;

class Form
{
    protected ?string $id = null;
    protected ?string $method = null;
    protected ?string $action = null;
    protected ?string $enctype = null;
    protected array $attributes = [];

    protected array $fields = [];
    protected array $buttons = [];

    protected array $data = [];
    protected array $errors = [];
    protected bool $submitted = false;

    public function id (int $id): static
    {
        $this->attributes['id'] = $id;
        return $this;
    }

    public function method (string $method): static
    {
        $this->method = strtoupper($method);
        return $this;
    }

    public function action (string $action): static
    {
        $this->action = $action;
        return $this;
    }

    public function enctype (string $enctype): static
    {
        $this->enctype = $enctype;
        return $this;
    }

    public function class (string $class): static
    {
        $this->attributes['class'] = $class;
        return $this;
    }

    public function target (string $target): static
    {
        $this->attributes['target'] = $target;
        return $this;
    }

    public function attribute (array $attributes): static
    {
        $this->attributes = array_merge($this->attributes, $attributes);
        return $this;
    }

    // Fields Creation
    public function text (string $name = ""): TextField
    {
        return $this->createField(TextField::class, $name);
    }

    public function number (string $name = ""): NumberField
    {
        return $this->createField(NumberField::class, $name);
    }

    public function submit (): Button
    {
        return $this->createButton('submit');
    }

    public function reset (): Button
    {
        return $this->createButton('reset');
    }

    // Helper Functions
    protected function createField (string $class , string $name = ""): BaseField
    {
        $field = app($class, [
            'name' => $name,
        ]);

        $this->fields[] = $field;

        return $field;
    }

    protected function createButton (string $type) : Button
    {
        $button = app(Button::class, [
            'type' => $type,
        ]);

        $this->buttons[] = $button;

        return $button;
    }

    public function getState(): array
    {
        return [
            'method' => $this->method,
            'action' => $this->action,
            'enctype' => $this->enctype,
            'attributes' => $this->attributes,
            'fields' => $this->fields,
            'buttons' => $this->buttons,
        ];
    }

    public function render (string $theme)
    {
        $renderer = app(ThemeManager::class)->renderer($theme);
        return $renderer->render($this);
    }
}