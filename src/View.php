<?php

namespace App;

class View
{

    public static function render(string $view, $model = [])
    {
        if (is_array($model)) {
            extract($model); // Convert array keys to variables
        }
        require __DIR__ . '/Views/' . $view . '.php';
    }

}