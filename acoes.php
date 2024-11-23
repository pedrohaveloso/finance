<?php
session_start();
require_once("conexao.php");

if (isset($_POST['create_transacao'])){
    $data = trim($_POST['txtDataNovaTransacao']);
    $tipo = trim($_POST['txtTipo']);
    $descricao = trim($_POST['txtDescricaoNovaTransacao']);
    $valor = trim($_POST['txtValorNovaTransacao']);
    $id_mes= trim($_POST['idMes']);
    $categoria = trim($_POST['txtCat']);


    $sql="INSERT INTO transaction (date, type, description, value, month_id) VALUES ('$data', '$tipo', '$descricao', '$valor', '$id_mes')";
    $sqlinsert = mysqli_query($conn,$sql);

    $id_transacao = mysqli_insert_id($conn);

    $sql_category = "INSERT INTO transactioncategory (transaction_id, category_id) VALUES ('$id_transacao',$categoria)";
    $insert_category = mysqli_query($conn,$sql_category);

    header('Location: index.php');
    exit();
}

if (isset($_POST['delete_transacao'])){
    $transacaoId = mysqli_real_escape_string($conn,($_POST['delete_transacao']));
    $sqlDeleteCategory = "DELETE FROM transactioncategory  WHERE transaction_id = '$transacaoId'";
    $sqlDelete = "DELETE FROM transaction WHERE id = '$transacaoId'";
    mysqli_query($conn, $sqlDeleteCategory);
    mysqli_query($conn, $sqlDelete);
    

    header('Location: index.php');
    exit();

}
if (isset($_POST['delete_mes'])){
    $mesId = mysqli_real_escape_string($conn,($_POST['delete_mes']));
    $sqlDelete = "DELETE FROM month WHERE id = '$mesId'";
    $sqlDeleteTransaction = "DELETE FROM transaction WHERE month_id = '$mesId'";

    
    mysqli_query($conn, $sqlDeleteTransaction);
    mysqli_query($conn, $sqlDelete);
    

    header('Location: index.php');
    exit();
}  

if (isset($_POST['create_mes'])){
    $mes = trim($_POST['txtMes']);
    $ano = trim($_POST['txtAno']);

    $sql = "INSERT INTO month (name, year) VALUES ('$mes', '$ano')";
    $sqlinsert = mysqli_query($conn,$sql);

    header('Location: index.php');
    exit();

}

if (isset($_POST['create_category'])){
    $nome = trim($_POST['txtNome']);
    $sql_insert = "INSERT INTO category (name) VALUES ('$nome')";
    $insert = mysqli_query($conn, $sql_insert);
    
    header('Location: index.php');
    exit();
}

if (isset($_POST['edit_category'])){
    $valor = trim($_POST['txtValor']);
    $descricao = trim($_POST['txtDescricao']);
    $data = trim($_POST['txtData']);
    $categoria = trim($_POST['txtCat']);
    $update = "UPDATE transaction SET value = '$valor', description = '$descricao', date = '$data'";

    $query = mysqli_query($conn, $update);

    header('Location: index.php');
    exit();

}

?>
