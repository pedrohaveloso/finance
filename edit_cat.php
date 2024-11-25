<?php
session_start();
require_once("conexao.php");

$categoria_id = mysqli_real_escape_string($conn, $_GET['category_id']);
$sql = "SELECT name FROM category WHERE id = '$categoria_id'";
$query = mysqli_query($conn, $sql);
$categoria = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Editar Categoria</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark text-white">
        <div class="container-fluid d-flex align-items-center">
            <h2 class="mb-0 fw-bold">
                Finance Control 
                <i class="bi bi-wallet-fill"></i>
            </h2>
            <div>
            <a class="btn bg-light fw-bold" href="index.php"><i class="bi bi-house"></i> Ínicio</a>
                <a class="btn bg-light fw-bold" href="add_mes.php"><i class="bi bi-plus-circle"></i> Mês</a>
                <a class="btn bg-light fw-bold  " href="add_cat.php"><i class="bi bi-plus-circle"></i> Categoria</a>  
                <a class="btn bg-light fw-bold" href="crud_cat.php"><i class="bi bi-bookmark-star"></i></a>
                <a class="btn bg-light fw-bold" href="crud_mes.php"><i class="bi bi-calendar"></i></a>
            </div>
            
        </div>
</nav>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-header">
                        <h4>
                        Editando Categoria    
                        <i class="bi bi-bookmark-star"></i>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="acoes.php" method="POST">
                            <div class="mb-3">
                                <label for="txtNome">Nome</label>
                                <input type="text" name="txtNome" class="form-control" value="<?= $categoria['name'];?>">
                            </div>
                            <input type="hidden" name="idCategoria" value="<?= $categoria_id?>">
                            <button name="edit_categoria" type="submit" class="btn btn-success float-end"><i class="bi bi-floppy2-fill">  Salvar</i></button>
                        </form>
                        <a href="crud_cat.php" class="btn btn-danger">Voltar</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>