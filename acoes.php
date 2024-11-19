<?php
session_start();
require_once("conexao.php");

if (isset($_POST['create_transacao'])){
    $data = trim($_POST['txtDataNovaTransacao']);
    $tipo = trim($_POST['txtTipo']);
    $descricao = trim($_POST['txtDescricaoNovaTransacao']);
    $valor = trim($_POST['txtValorNovaTransacao']);
    $id_mes= trim($_POST['idMes']);

    $sql="INSERT INTO transaction (date, type, description, value, month_id) VALUES ('$data', '$tipo', '$descricao', '$valor', '$id_mes')";
    $sqlinsert = mysqli_query($conn,$sql);

    header('Location: index.php');
    exit();
}
    

?>
