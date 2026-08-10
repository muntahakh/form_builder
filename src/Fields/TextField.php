<?php

namespace Muntaha\FormBuilder\Fields;

use Muntaha\FormBuilder\Fields\BaseField;

class TextField extends BaseField
{
    protected string $type = "text";
    protected ?int $size = null;

    public function size (int $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getState(): array
    {
        return array_merge(parent::getState(), [
            'type' => $this->type,
            'size' => $this->size,
        ]);
    }
}