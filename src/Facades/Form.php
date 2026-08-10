<?php

namespace Muntaha\FormBuilder\Facades;

use Illuminate\Support\Facades\Facade;

class Form extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'form';
    }

}