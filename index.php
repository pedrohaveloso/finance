<?php
session_start();
require_once("conexao.php");
require_once("constantes.php");

$sql_meses = "SELECT id, name, year FROM month";
$meses = mysqli_query($conn, $sql_meses);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Control</title>
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
    <?php foreach ($meses as $mes): ?>
        <?php
        $mes_id = $mes['id'];
        $sql_transacoes = "SELECT id,date, type, description, value FROM transaction WHERE month_id = '$mes_id'";
        $transacoes = mysqli_query($conn, $sql_transacoes);
        $sql_entrada = "SELECT SUM(value) AS total FROM transaction WHERE type = 'input' AND month_id='$mes_id'";
        $entrada = $conn->query($sql_entrada);
        $input = $entrada->fetch_assoc();
        $sql_saida = "SELECT SUM(value) AS total FROM transaction WHERE type = 'output' AND month_id='$mes_id'";
        $saida = $conn->query($sql_saida);
        $output = $saida->fetch_assoc();


        ?>
        
        <details open>
            <summary>
                <h3 class="mt-3 text-center"><?php echo $mes['name'] . " " . $mes['year']; ?></h3>
            </summary>

            <div class="container border border-4 rounded-2 mb-5 shadow rounded">
                <div class="container">
                    <h3 class="mt-3"><i class="bi bi-calendar3"></i> <?php echo$months[$mes['name']] . " " . $mes['year']; ?></h3>
                    <a href="create_transacao.php?mes_id=<?= $mes['id'] ?>" class="btn btn-primary shadow rounded"><i class="bi bi-plus-circle"></i>  Nova transação</a>
                    <form action="acoes.php" method="POST" class="float-end">
                        <button onclick="return confirm('Tem certeza que deseja excluir este mês?')" name="delete_mes" class="btn btn-danger shadow rounded" type="submit" value="<?= $mes['id'] ?>"><i class="bi bi-trash3-fill"></i> Deletar Mês</button>
                    </form>
                    <div class="card mt-3 mb-4 ">
                        <div class="card-header text-center fw-bold fs-4 p-0 ">
                            <h3>Resumo Mensal</h3>  
                        </div>
                        <div class="card-body fw-4 p-1  d-flex justify-content-center align-items-center">
                            <div class="card-group mt-2 mb-1 w-50 shadow rounded">
                                <?php
                                $resultadoMes = ($input['total'] - $output['total']);
                                if ($resultadoMes > 0) {
                                    $txtColor = "text-success";
                                } elseif ($resultadoMes < 0) {
                                    $txtColor = "text-danger";
                                } else {
                                    $txtColor = "text-white";
                                }
                                ?>
                                <div class="card text-center" style="background-color: rgb(204,255,204); ">
                                    <h5 class="text-success fw-bold"><?php echo "Entradas : R$ " . $input['total']; ?></h5>
                                </div>
                                <div class="card text-center" style="background-color: rgb(255,153,153);">
                                    <h5 class="text-danger fw-bold"><?php echo "Saídas : R$ " . $output['total']; ?></h5>
                                </div>
                            </div>
                            
                        </div>
                        <?php
                            if ($resultadoMes < 0): ?>
                            <div class="card-group mt-1 text-center p-1 col-12 col-md-6 mx-auto text-center">
                                    <div class="card bg-danger bg-opacity-10 text-light shadow rounded">
                                        <h5>
                                            Seu saldo é negativo
                                        </h5>
                                    </div>
                                </div>
                                

                            <?php elseif ($resultadoMes > 1): ?>
                                <div class="card-group mt-1 text-center p-1 col-12 col-md-6 mx-auto text-center">
                                    <div class="card bg-success text-light shadow rounded">
                                        <h5>
                                            Seu saldo é positivo
                                        </h5>
                                    </div>
                                </div>
                            <?php elseif ($resultadoMes == 0): ?>
                                <div class="card-group mt-1 text-center p-1 col-12 col-md-6 mx-auto text-center">
                                    <div class="card bg-warning text-light shadow rounded">
                                        <h5>
                                            Seu saldo é neutro
                                        </h5>
                                    </div>
                                </div>
                            <?php endif ?>

                            <div class="text-center mt-3 mb-3 ">
                                <h2 class="fw-bold"><i class="bi bi-coin"></i> Saldo atual : </h2>
                                <h3><?php echo $resultadoMes ?></h3>
                            </div>


                    </div>
                </div>
                <div class="card mt-3 mb-3">
                    <div class="card-body text-center">
                        Suas transações do mês:
                    </div>
                </div>
                <table class="table table-striped-columns table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th scope="col">Transação</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Data da Transação</th>
                            <th>Categoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach ($transacoes as $transacao): ?>
                                <?php
                                $sql_categoria = "SELECT category.name FROM category INNER JOIN transactioncategory ON category.id = transactioncategory.category_id WHERE transactioncategory.transaction_id = {$transacao['id']}";
                                $consulta_categoria = mysqli_query($conn, $sql_categoria);
                                $categoria = mysqli_fetch_assoc($consulta_categoria);
                                ?>
                                <td class="d-flex justify-content-center gap-3">
                                    <a href="edit_transacao.php?id=<?= $transacao['id'] ?>" class="btn btn-success shadow rounded"><i class="bi bi-pencil-square"></i></a>
                                    <form action="acoes.php" method="POST">
                                        <button onclick="return confirm('Tem certeza que deseja excluir esta transação?')" name="delete_transacao" class="btn btn-danger shadow rounded" type="submit" value="<?= $transacao['id'] ?>"><i class="bi bi-file-earmark-minus"></i></button>
                                    </form>
                                </td>

                                <th scope="row"><?php echo $types[$transacao['type']]; ?></th>
                                <td><?php echo 'R$ ' . $transacao['value']; ?></td>
                                <td><?php echo $transacao['description']; ?></td>
                                <td><?php echo $transacao['date']; ?></td>
                                <td><?php if ($categoria) {
                                        echo $categoria['name'];
                                    }

                                    ?>


                                </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            </div>
        </details>
    <?php endforeach ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>