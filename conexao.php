<?php

$host = 'localhost:3307';
$usuario = 'root';
$senha = '';
$banco = 'finance';

$conn = mysqli_connect($host, $usuario, $senha, $banco);
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>

