<?php

namespace Muntaha\FormBuilder\Renderers;

use Muntaha\FormBuilder\Form\Form;

interface Renderer
{
    public function render(Form $form): string;
}