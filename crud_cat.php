<?php
session_start();
require_once("conexao.php");
$sql = "SELECT * FROM category";
$categorias = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Categorias</title>
    <style>
        @media (max-width: 768px) {
            .navbar-nav {
                flex-direction: column;
            }
            .navbar-nav .btn {
                margin-bottom: 5px;
            }
        }
    </style>
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
                        <h4 class="text-center">
                        <i class="bi bi-bookmark-star"></i> Categorias criadas
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped-columns table-hover">
                            <thead class="text-center fw-bold">
                                <tr>
                                    <td>Nome</td>
                                    <td>Ação</td>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr> <?php foreach ($categorias as $categoria): ?>
                                    <td><?= $categoria['name'];?>
                                </td>
                                <td class="d-flex justify-content-center gap-3  ">
                                    <a href="edit_cat.php?category_id=<?= $categoria['id'];?>"class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
                                    <form action="acoes.php" method="POST">
                                        <button name="delete_categoria" onclick="return confirm('Tem certeza que deseja excluir essa categoria?')" class="btn btn-danger" value="<?= $categoria['id']?>"><i class="bi bi-file-earmark-minus"></i></button>
                                    </form>
                                </button></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <a href="index.php" class="btn btn-danger">Voltar</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>