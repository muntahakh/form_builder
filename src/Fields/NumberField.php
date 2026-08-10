<?php

namespace Muntaha\FormBuilder\Fields;

use Muntaha\FormBuilder\Fields\BaseField;

class NumberField extends BaseField
{
    protected string $type = "number";
    protected ?int $min = null;
    protected ?int $max = null;
    protected int|float|null $step = null;

    public function min (int $min) {
        $this->min = $min;
        return $this;
    }

    public function max (int $max) {
        $this->max = $max;
        return $this;
    }

    public function step (int|float|null $step) {
        $this->step = $step;
        return $this;
    }

    public function getState(): array
    {
        return array_merge(parent::getState(), [
            'type' => $this->type,
            'min' => $this->min,
            'max' => $this->max,
            'step' => $this->step,
        ]);
    }
}