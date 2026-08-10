<?php

namespace Muntaha\FormBuilder\Renderers;

use Muntaha\FormBuilder\Form\Form;

class BootstrapRenderer implements Renderer
{
    public function render (Form $form): string
    {
        $state = $form->getState();

        $html = '<form';
        if (!empty($state['action'])) {
            $html .= ' action="' . e($state['action']) . '"';
        }
        if (!empty($state['method'])) {
            $html .= ' method="' . e($state['method']) . '"';
        }
        if (!empty($state['enctype'])) {
            $html .= ' enctype="' . e($state['enctype']) . '"';
        }
        if (!empty($state['attributes'])) {
            $html .= $this->renderAttributes($state['attributes']);
        }

        $html .= '>';
        $html .= $this->renderFields($state['fields']);
        $html .= $this->renderButtons($state['buttons']);
        $html .= '</form>';

        return $html;
    }

    private function renderFields (array $fields): string
    {
        $html = '';

        foreach ($fields as $field) {
            $state = $field->getState();

            $html .= '<div class="mb-3">';

            if (!empty($state['label'])) {
                $html .= '<label';

                if (!empty($state['labelAttributes'])) {
                    $html .= $this->renderAttributes($state['labelAttributes']);
                }

                $html .= '>' . e($state['label']) . '</label>';
            }

            $html .= '<input';

            $html .= ' type="' . e($state['type']) . '"';

            if (!empty($state['name'])) {
                $html .= ' name="' . e($state['name']) . '"';
            }

            if (!empty($state['id'])) {
                $html .= ' id="' . e($state['id']) . '"';
            }

            if ($state['value'] !== null) {
                $html .= ' value="' . e($state['value']) . '"';
            }

            if ($state['placeholder'] !== null) {
                $html .= ' placeholder="' . e($state['placeholder']) . '"';
            }

            if ($state['required']) {
                $html .= ' required';
            }

            if ($state['disabled']) {
                $html .= ' disabled';
            }

            if ($state['readonly']) {
                $html .= ' readonly';
            }

            if ($state['autofocus']) {
                $html .= ' autofocus';
            }
            if (!empty($state['attributes'])) {
                $html .= $this->renderAttributes($state['attributes']);
            }

            $html .= '>';

            if (!empty($state['helpText'])) {
                $html .= '<div class="form-text">'
                    . e($state['helpText'])
                    . '</div>';
            }

            if (!empty($state['error'])) {
                $html .= '<div class="invalid-feedback">'
                    . e($state['error'])
                    . '</div>';
            }

            $html .= '</div>';
        }

        return $html;
    }


    private function renderButtons(array $buttons): string
    {
        $html = '';

        foreach ($buttons as $button) {
            $state = $button->getState();

            $html .= '<button';

            if (!empty($state['type'])) {
                $html .= ' type="' . e($state['type']) . '"';
            }

            if (!empty($state['name'])) {
                $html .= ' name="' . e($state['name']) . '"';
            }

            if ($state['value'] !== null) {
                $html .= ' value="' . e($state['value']) . '"';
            }

            if ($state['disabled']) {
                $html .= ' disabled';
            }

            if (!empty($state['attributes'])) {
                $html .= $this->renderAttributes($state['attributes']);
            }

            $html .= '>';

            $html .= e($state['text'] ?? $state['value'] ?? '');

            $html .= '</button>';
        }

        return $html;
    }

    private function renderAttributes(array $attributes): string
    {
        $html = '';

        foreach ($attributes as $attribute => $value) {
            if ($value === null || $value === false) {
                continue;
            }

            if ($value === true) {
                $html .= ' ' . e($attribute);
                continue;
            }

            $html .= ' ' . e($attribute) . '="' . e($value) . '"';
        }

        return $html;
    }
}