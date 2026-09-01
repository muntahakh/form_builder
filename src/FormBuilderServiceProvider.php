<?php

namespace Muntaha\FormBuilder;

use Illuminate\Support\ServiceProvider;
use Muntaha\FormBuilder\Services\FormElementRegistrar;
use Muntaha\FormBuilder\Services\FormManager;

class FormBuilderServiceProvider extends ServiceProvider
{
    /*
    ** Register services
    */
    public function register ()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/form-builder.php', 'form-builder');
        $this->app->singleton('form', function () {
            return new FormManager();
        });
        $this->app->alias('form', FormManager::class);
    }

    /*
    ** Bootstrap services
    */
    public function boot (FormElementRegistrar $registrar)
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'form-builder');

        $configFormElements = config('form-builder.elements', []);
        foreach ($configFormElements as $type => $formElements) {
            $registrar->register($type, $formElements);
        }
    }


}
