<?php
session_start();
require_once("conexao.php");


if(isset($_POST['create_transacao.php']))
{
    $data = trim($_POST['txtDataNovaTransacao']);
    $tipo = trim($_POST['txtTipoNovaTransacao']);
    $descricao = trim($_POST['txtDescricaoNovaTransacao']);
    $valor = trim($_POST['txtValorNovaTransacao']);
    $id_mes= trim($_POST['idMes']);

    $sql="INSERT INTO transaction (date, type, description, value) VALUES ($data, $tipo, $descricao, $valor)  WHERE id = $id_mes";
    $sqlinsert = mysqli_query($conn,$sql);
};




