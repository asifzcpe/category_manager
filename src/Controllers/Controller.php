<?php

declare(strict_types=1);

namespace App\Controllers;

class Controller
{
    protected function render($view, $data = [])
    {
        extract($data);
        include_once __DIR__."/../Views/{$view}.php";
    }
}
