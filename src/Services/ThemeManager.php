<?php

namespace Muntaha\FormBuilder\Services;

use InvalidArgumentException;
use Muntaha\FormBuilder\Renderers\Renderer;

class ThemeManager
{
    public function renderer (string $theme): Renderer
    {
        $renderer = config("form-builder.themes.{$theme}.renderer");
        if(!$renderer) {
            throw new InvalidArgumentException(
                "Theme [{$theme}] does not exist."
            );
        }
        return app($renderer);
    }
}