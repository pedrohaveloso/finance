<?php

session_start();

include __DIR__ . '/constants.php';

include __DIR__ . '/connection.php';

include __DIR__ . '/../components/navbar.php';
include __DIR__ . '/../components/page_end.php';
include __DIR__ . '/../components/page_start.php';
include __DIR__ . '/../components/error_message.php';

$url = $_SERVER['REQUEST_URI'];

$isProtectedPage = $url !== '/finance/login.php'
    && $url !== '/finance/actions/login.php'
    && $url !== '/finance/register.php'
    && $url !== '/finance/actions/register.php';

if (
    $isProtectedPage
    && empty($_SESSION['user'])
) {
    header('Location: login.php');
    exit();
}

if (!$isProtectedPage && !empty($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
