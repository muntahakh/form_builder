<?php

namespace Muntaha\FormBuilder\Fields;

use Muntaha\FormBuilder\Fields\BaseField;

class InputField extends BaseField
{
    protected string $type = "text";

    /**
     *  GETTERS
     */

    public function getType(): string
    {
        return $this->type;
    }

}