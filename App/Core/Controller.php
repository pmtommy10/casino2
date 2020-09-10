<?php

namespace App\Core;

class Controller extends Database
{

    public static $view;
    public static $data;

    public static function createView(string $viewName = null, array $data = null, string $templateName = "template")
    {
        self::$view = self::$view ?? $viewName . '.php';
        self::$data = self::$data ?? $data;
        extract(self::$data);
        require_once VIEWS . "templates" . DS . "{$templateName}.php";
    }

    public static function requireView(string $fileFullPath, array $data = null)
    {
        self::$data = self::$data ?? $data;
        extract(self::$data);
        require_once VIEWS . $fileFullPath;
    }

    public static function paginate(int $total, int $itemsPerPage, string $instance = 'pageNo')
    {
        $pages = new Paginator($itemsPerPage, $instance);
        $pages->set_total($total);
        // $limit = $pages->get_limit_keys();
        return $pages->page_links();
    }

    public static function outputError(Object $exception, array $errors = [])
    {
        return [
            'success' => false,
            'text' => $exception->getMessage(),
            'line' => $exception->getLine(),
            'errors' => $errors,
            'trace' => $exception->getTrace(),
            'prev' => $exception->getPrevious(),
            'postData' => $_POST,
        ];
    }
}
