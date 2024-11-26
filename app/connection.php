<?php

$host = 'localhost:3306';
$user = 'root';
$password = '';
$database = 'Finance';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    http_response_code(500);
    exit();
}
