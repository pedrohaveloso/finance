<?php

$host = 'localhost:3306';
$usuario = 'root';
$senha = '';
$banco = 'finance';

$conn = mysqli_connect($host, $usuario, $senha, $banco);
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>

