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

if (isset($_POST['delete_transacao'])){
    $transacaoId = mysqli_real_escape_string($conn,($_POST['delete_transacao']));
    $sqlDelete = "DELETE FROM transaction WHERE id = '$transacaoId'";
    mysqli_query($conn, $sqlDelete);

    header('Location: index.php');
    exit();

}
if (isset($_POST['delete_mes'])){
    $mesId = mysqli_real_escape_string($conn,($_POST['delete_mes']));
    $sqlDelete = "DELETE FROM month WHERE id = '$mesId'";
    $sqlDeleteTransaction = "DELETE FROM transaction WHERE month_id = '$mesId'";

    mysqli_query($conn, $sqlDelete);
    mysqli_query($conn, $sqlDeleteTransaction);

    header('Location: index.php');
    exit();
}  

?>
