<?php

namespace App\Controller;

abstract class Controller
{
    private const LAYOUTS_DIR = __DIR__ . '/../View/layouts';

    private const PAGES_DIR = __DIR__ . '/../View/pages';

    protected function page(
        string $name,
        array $variables = [],
        string $layout = 'root'
    ): never {
        if (empty($variables['title'])) {
            $variables['title'] = 'Finance';
        }

        extract($variables);

        ob_start();
        include self::PAGES_DIR . "/{$name}.html.php";
        $children = ob_get_clean();

        include self::LAYOUTS_DIR . "/{$layout}.html.php";

        exit;
    }

    protected function redirect(string $to, int $status = 302): never
    {
        http_response_code($status);
        header("Location: $to");
        exit;
    }

    protected function back(int $status = 302): never
    {
        http_response_code($status);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    protected function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}