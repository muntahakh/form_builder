<?php

namespace Muntaha\FormBuilder\Form;

use Illuminate\Support\Traits\Macroable;
use Muntaha\FormBuilder\Button\Button;
use Muntaha\FormBuilder\Fields\BaseField;
use Muntaha\FormBuilder\Services\ThemeManager;
use Muntaha\FormBuilder\Traits\HasAttributes;

class Form
{
    use Macroable, HasAttributes {
        Macroable::__call insteadof HasAttributes;
        HasAttributes::__call as attributeCall;
        Macroable::__call as macroCall;
    }

    protected ?string $method = null;
    protected ?string $action = null;
    protected ?string $enctype = null;

    protected array $fields = [];
    protected array $buttons = [];

    protected array $data = [];
    protected array $errors = [];
    protected bool $submitted = false;

    public function __call($method, $parameters)
    {
        if (static::hasMacro($method)) {
            return $this->macroCall($method, $parameters);
        }

        return $this->attributeCall($method, $parameters);
    }

    /**
     *  SETTERS
     */

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

    /**
     *  FIELDS CREATION
     */

    public function addField(BaseField $field): static
    {
        $this->fields[] = $field;

        return $this;
    }

    public function addButton(Button $button): static
    {
        $this->buttons[] = $button;

        return $this;
    }

    /**
     *  GETTERS
     */

    public function getMethod(): ?string
    {
        return $this->method;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function getEnctype(): ?string
    {
        return $this->enctype;
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function getButtons(): array
    {
        return $this->buttons;
    }

    /**
     *  RENDER FORM
     */

    public function render (string $theme)
    {
        $renderer = app(ThemeManager::class)->renderer($theme);
        return $renderer->render($this);
    }
}