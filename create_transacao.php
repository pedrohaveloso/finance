<?php
session_start();
require_once("conexao.php");
require_once("constantes.php");

$sql = "SELECT * FROM category";
$categorias = mysqli_query($conn, $sql);


if (!isset($_GET['mes_id']) || empty($_GET['mes_id'])) {
    header('Location: index.php');
    exit();
}


$sqlMes="SELECT name FROM month WHERE id = ({$_GET['mes_id']})";
$Mes = $conn->query($sqlMes);
$mesId = $Mes->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Transação</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <div class="card shadow rounded">
                    <div class="card-header">
                        <h4>Nova Transação em <?php echo $months[$mesId['name']];?></h4>

                    </div>
                    <div class="card-body">
                        <div class="card mb-3 text-center">
                            Adicione as informações da sua transação
                        </div>
                        <form action="acoes.php" method="POST">
                            <div class="mb-3">
                                <label for="txtDataNovaTransacao">Data</label>
                                <input type="date" id="txtDataNovaTransacao" name="txtDataNovaTransacao" placeholder="aaaa-mm-dd" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="txtTipo">Tipo de movimentação</label>
                                <select name="txtTipo" id="txtTipo" class="form-select" aria-label="txtTipo">
                                    <?php foreach ($types as $chave => $valor): ?>
                                        <option value="<?php echo $chave; ?>"><?php echo $valor; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>       
                            <div class="mb-3">
                                <label for="txtCat">Categorias</label>
                                <select  name="txtCat" class="form-select" aria-label="txtCat">
                                <?php foreach ($categorias as $categoria): ?>
                                    <option value = "<?=$categoria['id']?>"><?php echo $categoria['name']?> </option>
                                <?php endforeach?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="txtDescricaoNovaTransacao">Descrição:</label>
                                <textarea name="txtDescricaoNovaTransacao" id="txtDescricaoNovaTransacao" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="txtValorNovaTransacao">Valor:</label>
                                <input type="number" id="txtValorNovaTransacao" name="txtValorNovaTransacao" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="hidden" name="idMes" value="<?php echo $_GET['mes_id']; ?>">
                            </div>

                            <?php 
                                if (isset($_SESSION['message'])) {
                                    echo "<div class='alert alert-danger p-1 col-12 col-md-6 mx-auto text-center'>{$_SESSION['message']}</div>";
                                }
                                    unset($_SESSION['message']);
                                ?>


                            <div class="mb-3">
                                <a href="index.php" class="btn btn-danger shadow rounded">Voltar</a>    
                                <button name="create_transacao" type="submit" class="btn btn-success float-end shadow rounded"><i class="bi bi-credit-card-2-back"></i>  Criar</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>