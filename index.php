<?php
session_start();
require_once("conexao.php");

$sql_meses = "SELECT name, year FROM month";
$meses = mysqli_query($conn,$sql_meses);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Finanças</title>
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
        <div class="container border border-dark mb-5">
        <div class="container">
            <h3 class="mt-3"><?php echo $mes['name']." ".$mes['year']; ?></h3>
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    Suas transações do mês
                </div>
            </div>
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">Transação</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Data da Transação</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Saída</th>
                        <td>500,00</td>
                        <td>Comprei um jogo novo</td>
                        <td>20/10/2024</td>
                        <td>Lazer</td>
                    </tr>
                    <tr>
                        <th scope="row">Entrada</th>
                        <td>5000,00</td>
                        <td>Pagamento do meu salário de novembro</td>
                        <td>07/11/2024</td>
                        <td>Trabalho</td>
                    </tr>
                    <tr>
                        <th scope="row">Entrada</th>
                        <td>0000,00</td>
                        <td>Ex</td>
                        <td>00/00/000</td>
                        <td>Exemplo</td>
                    </tr>
                    <tr>
                        <th scope="row">Entrada</th>
                        <td>0000,00</td>
                        <td>Ex</td>
                        <td>00/00/000</td>
                        <td>Exemplo</td>
                    </tr>
                    <tr>
                        <th scope="row">Entrada</th>
                        <td>0000,00</td>
                        <td>Ex</td>
                        <td>00/00/000</td>
                        <td>Exemplo</td>
                    </tr>
                    <tr>
                        <th scope="row">Entrada</th>
                        <td>0000,00</td>
                        <td>Ex</td>
                        <td>00/00/000</td>
                        <td>Exemplo</td>
                    </tr>
                    <tr>
                        <th scope="row">Entrada</th>
                        <td>0000,00</td>
                        <td>Ex</td>
                        <td>00/00/000</td>
                        <td>Exemplo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php endforeach ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>