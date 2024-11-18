<?php
session_start();
require_once("conexao.php");


if(isset($_POST['submit']))
{
    print_r($_POST['txtDataNovaTransacao']);
    print_r($_POST['txtTipoNovaTransacao']);
    print_r($_POST['txtDescricaoNovaTransacao']);
    print_r($_POST['txtValorNovaTransacao']);
}




