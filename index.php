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
    <title>Finance Ctrl</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        <details>
            <summary>
                <h3 class="mt-3 text-center"><?php echo $mes['name'] . " " . $mes['year']; ?></h3>
            </summary>

            <div class="container border border-dark mb-5">
                <div class="container">
                    <h3 class="mt-3"><?php echo $months[$mes['name']] . " " . $mes['year']; ?></h3>
                    <a href="create_transacao.php?mes_id=<?= $mes['id'] ?>" class="btn btn-primary">Nova transação</a>
                    <form action="acoes.php" method="POST" class="float-end">
                        <button onclick="return confirm('Tem certeza que deseja excluir este mês?')" name="delete_mes" class="btn btn-danger" type="submit" value="<?= $mes['id'] ?>">Deletar Mês</button>
                    </form>
                    <div class="card mt-3 mb-4">
                        <div class="card-header">
                            <p>Resumo Mensal</p>
                        </div>
                        <div class="card-body">
                            <div class="card-group">
                                <div class="card text-center fw-bold" style="background-color: rgb(204,255,204); "><p><?php echo "ENTRADAS: " . $input['total']; ?></p> </div>
                                <div class="card text-center fw-bold" style="background-color: rgb(255,153,153);"><p><?php echo "SAÍDAS: " . $output['total']; ?></p> </div>
                                
                                <?php
                                    $resultadoMes = ($input['total'] - $output['total']);
                                    if($resultadoMes > 0) {
                                        $txtColor="text-success";}
                                    elseif($resultadoMes < 0) {
                                        $txtColor="text-danger";}
                                    else{$txtColor="text-white";}
                                ?>
                                <div class="card text-center fw-bold <?php echo $txtColor; ?>" style="background-color: rgb(204,229,255);">
                                    <p>
                                        <?php echo "RESULTADO MÊS: " . $resultadoMes?>
                                    </p> 
                                </div>
                            </div>
                        </div>

                            
                        </div>
                    </div>
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            Suas transações do mês.
                        </div>
                    </div>
                    <table class="table table-striped-columns">
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
                                        <a href="edit_transacao.php?id=<?= $transacao['id'] ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                        <form action="acoes.php" method="POST">
                                            <button onclick="return confirm('Tem certeza que deseja excluir esta transação?')" name="delete_transacao" class="btn btn-danger" type="submit" value="<?= $transacao['id'] ?>"><i class="bi bi-file-earmark-minus"></i></button>
                                        </form>
                                    </td>

                                    <th scope="row"><?php echo $types[$transacao['type']]; ?></th>
                                    <td><?php echo $transacao['value']; ?></td>
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