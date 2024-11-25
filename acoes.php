<?php
session_start();
require_once("conexao.php");


if (isset($_POST['create_transacao'])) {
    $data = trim($_POST['txtDataNovaTransacao']);
    $tipo = trim($_POST['txtTipo']);
    $descricao = trim($_POST['txtDescricaoNovaTransacao']);
    $valor = trim($_POST['txtValorNovaTransacao']);
    $id_mes = trim($_POST['idMes']);
    $categoria = trim($_POST['txtCat']);
    

    
    if (empty($data) || empty($tipo) || empty($descricao) || empty($valor) || empty($id_mes) || empty($categoria)) {
        $_SESSION['message'] = "Todos os campos são obrigatórios!";
        $_SESSION['type'] = 'error';
        header('Location: create_transacao.php');
        exit();
    }

   

    
    $sql = "INSERT INTO transaction (date, type, description, value, month_id) VALUES ('$data', '$tipo', '$descricao', '$valor', '$id_mes')";
    $sqlinsert = mysqli_query($conn, $sql);

    $id_transacao = mysqli_insert_id($conn);

    $sql_category = "INSERT INTO transactioncategory (transaction_id, category_id) VALUES ('$id_transacao', '$categoria')";
    $insert_category = mysqli_query($conn, $sql_category);

    
    

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
    $sqlDeleteTransaction = "DELETE FROM transaction WHERE month_id = '$mesId'";
    $sqlDelete = "DELETE FROM month WHERE id = '$mesId'";

    
    mysqli_query($conn, $sqlDeleteTransaction);
    mysqli_query($conn, $sqlDelete);
    

    header('Location: index.php');
    exit();
}

if (isset($_POST['delete_categoria'])){
    $category_id = mysqli_real_escape_string($conn, ($_POST['delete_categoria']));
    $sqlDeleteCategory = "DELETE FROM category WHERE id ='$category_id'";
    mysqli_query($conn, $sqlDeleteCategory);

  


    header('Location: crud_cat.php');
    exit();
}

if (isset($_POST['create_mes'])){
    $mes = trim($_POST['txtMes']);
    $ano = trim($_POST['txtAno']);

    $sql = "INSERT INTO month (name, year) VALUES ('$mes', '$ano')";
    $sqlinsert = mysqli_query($conn,$sql);

    $_SESSION['message'] = "Mês criado com sucesso!";
    $_SESSION['type'] = 'success';

    header('Location: index.php');
    exit();

}

if (isset($_POST['create_category'])){
    $nome = trim($_POST['txtNome']);
    $sql_insert = "INSERT INTO category (name) VALUES ('$nome')";
    $insert = mysqli_query($conn, $sql_insert);

    $_SESSION['message'] = "Categoria criada com sucesso!";
    $_SESSION['type'] = 'success';
    
    header('Location: index.php');
    exit();
}

if (isset($_POST['edit_transacao'])) {
    $transacaoId = mysqli_real_escape_string($conn, $_POST['idTransacao']);
    $tipo = mysqli_real_escape_string($conn, $_POST['txtType']);
    $valor = mysqli_real_escape_string($conn, $_POST['txtValor']);
    $descricao = mysqli_real_escape_string($conn, $_POST['txtDescricao']);
    $data = mysqli_real_escape_string($conn, $_POST['txtData']);
    $categoriaId = mysqli_real_escape_string($conn, $_POST['txtCat']);

    $update = "UPDATE transaction SET type = '$tipo', value = '$valor', description = '$descricao', date = '$data' WHERE id = '$transacaoId'";
    $query = mysqli_query($conn, $update);

    if ($query) {
        $category = "SELECT id FROM transactioncategory WHERE transaction_id = '$transacaoId'";
        $result = mysqli_query($conn, $category);

        if (mysqli_num_rows($result) > 0) {
            $attCategory = "UPDATE transactioncategory SET category_id = '$categoriaId' WHERE transaction_id = '$transacaoId'";
            mysqli_query($conn, $attCategory);
        } else {
            $insertCategory = "INSERT INTO transactioncategory (transaction_id, category_id) VALUES ('$transacaoId', '$categoriaId')";
            mysqli_query($conn, $insertCategory);
        }
    }
}
if (isset($_POST['edit_categoria'])){
    $categoria_id = mysqli_real_escape_string($conn, $_POST['idCategoria']);
    $nome = mysqli_real_escape_string($conn, $_POST['txtNome']);
    $sql = "UPDATE category SET name = '$nome' WHERE id = '$categoria_id'";
    $query = mysqli_query($conn, $sql);
    
    header('Location: crud_cat.php');
    exit();
}

    header('Location: index.php');
    exit();

?>
