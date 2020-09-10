<?php

namespace App\Core;

class Controller extends Database
{

    public static $view;
    public static $data;

    public static function createView(string $view, array $data = [], string $template = 'template')
    {
        self::$view = self::$view ?? $view.'.php';
        self::$data = self::$data ?? $data;
        extract(self::$data);
        require_once VIEWS . 'template' . DS . "{$template}.php";
    }
}
