<?php

use Muntaha\FormBuilder\Button\Button;
use Muntaha\FormBuilder\Fields\InputField;
use Muntaha\FormBuilder\Fields\SelectField;
use Muntaha\FormBuilder\Fields\TextAreaField;
use Muntaha\FormBuilder\Renderers\BootstrapRenderer;

return [
    'elements' => [
        /*
        |--------------------------------------------------------------------------
        | Feilds
        |--------------------------------------------------------------------------
        */
        'fields' => [
            'text' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'text',
                ],
                'user_defined_arguments' => [
                    'name',
                ]
            ],

            'email' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'email',
                ],
                'user_defined_arguments' => [
                    'name',
                ]
            ],

            'password' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'password',
                ],
                'user_defined_arguments' => [
                    'name',
                ],
            ],

            'number' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'number',
                ],
                'user_defined_arguments' => [
                    'name',
                ]
            ],

            'tel' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'tel',
                ],
                'user_defined_arguments' => [
                    'name',
                ],
            ],

            'url' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'url',
                ],
                'user_defined_arguments' => [
                    'name',
                ],
            ],

            'search' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'search',
                ],
                'user_defined_arguments' => [
                    'name',
                ],
            ],

            'date' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'date',
                ],
                'user_defined_arguments' => [
                    'name',
                ],
            ],

            'datetime' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'datetime-local',
                ],
                'user_defined_arguments' => [
                    'name',
                ],
            ],

            'month' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'month',
                ],
                'user_defined_arguments' => [
                    'name',
                ],
            ],

            'week' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'week',
                ],
                'user_defined_arguments' => [
                    'name',
                ],
            ],

            'time' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'time',
                ],
                'user_defined_arguments' => [
                    'name',
                ],
            ],

            'color' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'color',
                ],
                'user_defined_arguments' => [
                    'name',
                ],
            ],

            'range' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'range',
                ],
                'user_defined_arguments' => [
                    'name',
                ],
            ],

            'checkbox' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'checkbox',
                ],
                'user_defined_arguments' => [
                    'name',
                ],
            ],

            'radio' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'radio',
                ],
                'user_defined_arguments' => [
                    'name',
                ],
            ],

            'hidden' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'hidden',
                ],
                'user_defined_arguments' => [
                    'name',
                ],
            ],

            'file' => [
                'class' => InputField::class,
                'arguments' => [
                    'tag_name' => 'input',
                    'type' => 'file',
                ],
                'user_defined_arguments' => [
                    'name',
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Textarea
        |--------------------------------------------------------------------------
        */

        'textarea' => [
            'class' => TextAreaField::class,
            'arguments' => [
                'tag_name' => 'textarea',
            ],
            'user_defined_arguments' => [
                'name',
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Select
        |--------------------------------------------------------------------------
        */

        'select' => [
            'class' => SelectField::class,
            'arguments' => [
                'tag_name' => 'select',
            ],
            'user_defined_arguments' => [
                'name',
                'options',
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Buttons
        |--------------------------------------------------------------------------
        */
        'buttons' => [
            'submit' => [
                'class' => Button::class,
                'arguments' => [
                    'tag_name' => 'button',
                    'type' => 'submit',
                ],
            ],
            'reset' => [
                'class' => Button::class,
                'arguments' => [
                    'tag_name' => 'button',
                    'type' => 'reset',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Themes
    |--------------------------------------------------------------------------
    */
    'themes' => [
        'bootstrap' => [
            'renderer' => BootstrapRenderer::class,
        ],
    ],
];