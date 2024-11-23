<?php
session_start();
require_once('conexao.php');

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
} 

$transacaoId = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "SELECT t.*, c.id as category_id, c.name as category_name 
        FROM transaction t 
        LEFT JOIN transactioncategory tc ON t.id = tc.transaction_id 
        LEFT JOIN category c ON tc.category_id = c.id 
        WHERE t.id = '{$transacaoId}'";

$query = mysqli_query($conn, $sql);

if (!$query || mysqli_num_rows($query) == 0) {
    header("Location: index.php");
    exit();
}

$transacao = mysqli_fetch_assoc($query);

$sql = "SELECT * FROM category ORDER BY name";
$query = mysqli_query($conn, $sql);
$categorias = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Editar - Transação</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark text-white">
        <div class="container-fluid d-flex align-items-center">
            <h2 class="mb-0 fw-bold">
                Controle Financeiro 
                <i class="bi bi-wallet-fill"></i>
            </h2>
            <div>
                <a class="btn bg-light fw-bold" href="index.php"><i class="bi bi-house"></i> Início</a>
                <a class="btn bg-light fw-bold" href="add_mes.php"><i class="bi bi-plus-circle"></i> Mês</a>
                <a class="btn bg-light fw-bold" href="add_cat.php"><i class="bi bi-plus-circle"></i> Categoria</a>  
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">
                            Editando Transação
                            <a href="index.php" class="btn btn-danger float-start"><i class="bi bi-arrow-return-left"></i></a>
                        </h4>
                    </div>
                    <div class="card-body justify-content-center">
                        <form action="acoes.php" method="POST">
                            <input type="hidden" name="idTransacao" value="<?=$transacao['id']?>">
                            <div class="mb-3">
                                <label for="txtType">Tipo</label>
                                <select name="txtType" id="txtType" class="form-select">
                                    <option value="input" <?=$transacao['type'] == 'input' ? 'selected' : ''?>>Entrada</option>
                                    <option value="output" <?=$transacao['type'] == 'output' ? 'selected' : ''?>>Saída</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="txtValor">Valor</label>
                                <input type="number" name="txtValor" id="txtValor" class="form-control" value="<?=$transacao['value']?>" step="0.01">
                            </div>
                            <div class="mb-3">
                                <label for="txtDescricao">Descrição</label>
                                <textarea name="txtDescricao" id="txtDescricao" class="form-control" rows="3"><?=$transacao['description']?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="txtData">Data da Transação</label>
                                <input type="date" name="txtData" id="txtData" class="form-control" value="<?=$transacao['date']?>">
                            </div>
                            <div class="mb-3">
                                <label for="txtCat">Categoria</label>
                                <select name="txtCat" id="txtCat" class="form-select">
                                    <?php foreach ($categorias as $categoria): ?>
                                        <option value="<?=$categoria['id']?>"><?=$categoria['name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button name="edit_transacao" type="submit" class="btn btn-primary">Salvar</button>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

