<?php

namespace Muntaha\FormBuilder\Services;

use Muntaha\FormBuilder\Form\Form;

class FormManager
{
    protected Form $form;

    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    public function __call(string $methods, array $arguments): mixed
    {
        return $this->form->$methods(...$arguments);
    }

}