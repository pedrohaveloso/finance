<?php

session_start();

// Inclusão do arquivo que faz o autoload das classes no projeto.
include __DIR__ . '/../vendor/autoload.php';

// Inclusão do arquivo com todas as rotas e suas respectivas ações.
$routes = include __DIR__ . '/routes.php';

// Aqui, pegamos a rota atual que o usuário está acessando.
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
[$path] = explode('?', $path);

// Pegamos a rota atual de dentro das rotas existentes. Caso ela não exista, o
// valor será nulo.
$action = $routes['internal'][$path] ?? null;

// Fazemos a verificação se o usuário está logado (no caso de ser uma página 
// interna) ou se ele não está logado (no caso de uma página externa).
if (empty($action)) {
    if (!empty($_SESSION['user'])) {
        header('Location: /home') && exit;
    }

    $action = $routes['external'][$path] ?? null;
} else {
    if (empty($_SESSION['user'])) {
        header('Location: /') && exit;
    }
}

// Se o valor for nulo, colocamos o status code para 404 (página não encontrada)
// e finalizamos a execução.
if (empty($action)) {
    http_response_code(404) && exit;
}

// Caso seja encontrada, pegamos o Controller e o Método dele de dentro da rota
// e executamos:
[$controller, $method] = explode('@', $action);
$method .= 'Action';
$controller = "App\\Controller\\{$controller}Controller";
$controller = new $controller();
$controller->$method();