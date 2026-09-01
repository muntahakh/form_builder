<?php

namespace Muntaha\FormBuilder\Button;

use Muntaha\FormBuilder\Traits\HasAttributes;

class Button
{
    use HasAttributes;

    protected string $tag_name = 'button';
    protected ?string $type = null;

    public function __construct(string $tag_name, string $type)
    {
        $this->tag_name = $tag_name;
        $this->type = $type;
    }

    /**
     *  GETTERS
     */

    public function getTagName(): string
    {
        return $this->tag_name;
    }

    public function getType(): ?string
    {
        return $this->type;
    }
}