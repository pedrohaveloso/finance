<?php

$host = 'localhost: 3306';
$usuario = 'root';
$senha = '';
$banco = 'finance';

$conn = mysqli_connect($host, $usuario, $senha, $banco) or die ('Não foi possível fazer conexão com o banco de dados.');
?>

