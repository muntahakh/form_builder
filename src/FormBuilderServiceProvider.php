<?php

namespace Muntaha\FormBuilder;

use Illuminate\Support\ServiceProvider;
use Muntaha\FormBuilder\Form\Form;
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
            return new FormManager(new Form());
        });
        $this->app->alias('form', FormManager::class);
    }

    /*
    ** Bootstrap services
    */
    public function boot ()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'form-builder');
    }
}
