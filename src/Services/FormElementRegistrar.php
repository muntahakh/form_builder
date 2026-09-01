<?php

namespace Muntaha\FormBuilder\Services;

use Muntaha\FormBuilder\Form\Form;
use Illuminate\Support\Str;

class FormElementRegistrar {

    public function register (string $type, array $formElements)
    {
        $function = $this->getRegistrationMethod($type);

        foreach ($formElements as $method => $definition) {
            if(!is_array($definition)) {
                return;
            }
            Form::macro($method, function (... $arguments) use ($definition, $function) {
                $params = $definition['arguments'] ?? [];
                foreach ($definition['user_defined_arguments'] ?? [] as $index => $key) {
                    if (array_key_exists($index, $arguments)) {
                        $params[$key] = $arguments[$index];
                    }
                }
                $manager = app(FormManager::class);
                $class = $definition['class'] ?? null;
                if ($class) {
                    $element = $manager->make($class, $params);
                    $this->$function($element);
                    return $element;
                }
            });
        }
    }

    protected function getRegistrationMethod(string $type): string
    {
        return 'add' . ucfirst(Str::singular($type));
    }
}