<?php

use Illuminate\Support\Facades\Route;
use Muntaha\FormBuilder\Facades\Form;

Route::get('/form', function () {

    $form = Form::create();

    $form->method('post')
        ->id('form')
        ->action('/order-store');

    $form->text('name')
        ->label('Name')
        ->id('name')
        ->required(true)
        ->placeholder('Enter your name')
        ->class('form-control');

    $form->email('email')
        ->label('Email')
        ->id('email')
        ->required()
        ->placeholder('Enter your email')
        ->class('form-control');

    $form->number('contact')
        ->label('Contact')
        ->id('contact')
        ->required()
        ->placeholder('Enter your contact number')
        ->class('form-control');

    $form->submit()
        ->class('btn btn-primary');

        dd($form);
    // $html = $form->render('bootstrap');

    return view('form-builder::index', compact('html'));
});