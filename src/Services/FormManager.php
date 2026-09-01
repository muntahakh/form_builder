<?php

namespace Muntaha\FormBuilder\Services;

use Muntaha\FormBuilder\Form\Form;

class FormManager
{
    public function create(): Form
    {
        return app(Form::class);
    }

    public function make(string $class, array $arguments = []): object
    {
        return app($class, $arguments);
    }
}