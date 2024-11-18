<?php
session_start();
require_once("conexao.php");


if(isset($_POST['create_treansacao.php']))
{
    $data = trim($_POST['txtDataNovaTransacao']);
    $tipo = trim($_POST['txtTipoNovaTransacao']);
    $descricao = trim($_POST['txtDescricaoNovaTransacao']);
    $valor = trim($_POST['txtValorNovaTransacao']);


    print_r($_POST['txtDataNovaTransacao']);
    print_r($_POST['txtTipoNovaTransacao']);
    print_r($_POST['txtDescricaoNovaTransacao']);
    print_r($_POST['txtValorNovaTransacao']);
}




