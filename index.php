<?php
session_start();
require_once("conexao.php");
require_once("constantes.php");

$sql_meses = "SELECT id, name, year FROM month";
$meses = mysqli_query($conn,$sql_meses);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Finanças</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1>
        Finanças

    </h1>
    <div class="btn-group" style="width: 100%;">
        <div class="dropdown">
            <button class="btn btn-success dropdown-toggle text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Adicionar</button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="add_mes.php">Mês</a></li>
                <li><a class="dropdown-item" href="add_cat.php">Categoria</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="btn btn-warning dropdown-toggle text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Filtrar</button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#"> por Mês</a></li>
                    <li><a class="dropdown-item" href="#">por Categoria</a></li>
                </ul>
        </div>
    </div>
    <?php foreach ($meses as $mes):?>
        <?php
        $mes_id = $mes['id'];
        $sql_transacoes = "SELECT date, type, description, value FROM transaction WHERE month_id = '$mes_id'";
        $transacoes = mysqli_query($conn, $sql_transacoes);
        ?>
        <details>
            <summary>
            <h3 class="mt-3 text-center"><?php echo $mes['name']." ".$mes['year']; ?></h3>
            </summary>

            <div class="container border border-dark mb-5">
            <div class="container">
                <h3 class="mt-3"><?php echo $months[$mes['name']]." ".$mes['year']; ?></h3>
                <a href="create_transacao.php?mes_id=<?=$mes['id']?>" class="btn btn-primary">Nova transação</a>
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
                            <?php foreach($transacoes as $transacao): ?>
                            <td class="d-flex justify-content-center gap-3">
                                <a href="edit_transacao.php" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                <form action="acoes.php" method="POST">
                                    <button onclick="return confirm('Tem certeza que deseja excluir esta transação?')" name="delete_transacao" class="btn btn-danger" type="submit"value="<?=$transacao['id']?>" ><i class="bi bi-file-earmark-minus"></i></button>
                                </form>
                            </td>

                            <th scope="row"><?php echo $types[$transacao['type']];?></th>
                            <td><?php echo $transacao['value']; ?></td>
                            <td><?php echo $transacao['description']; ?></td>
                            <td><?php echo $transacao['date']; ?></td>
                            <td>Não finalizado</td>
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