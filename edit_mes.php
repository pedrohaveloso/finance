<?php
session_start();
require("conexao.php");

$mes_id = mysqli_real_escape_string($conn, $_GET['id_mes']);
$sql = "SELECT * FROM month WHERE id = '$mes_id'";
$query = mysqli_query($conn, $sql);
$mes = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <title>Editar Mês</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark text-white">
        <div class="container-fluid d-flex align-items-center">
            <h2 class="mb-0 fw-bold">
                Finance Control
                <i class="bi bi-wallet-fill"></i>
            </h2>
            <div>
                <a class="btn bg-light fw-bold" href="index.php"><i
                        class="bi bi-house"></i> Ínicio</a>
                <a class="btn bg-light fw-bold" href="add_mes.php"><i
                        class="bi bi-plus-circle"></i> Mês</a>
                <a class="btn bg-light fw-bold  " href="add_cat.php"><i
                        class="bi bi-plus-circle"></i> Categoria</a>
                <a class="btn bg-light fw-bold" href="crud_cat.php"><i
                        class="bi bi-bookmark-star"></i></a>
                <a class="btn bg-light fw-bold" href="crud_mes.php"><i
                        class="bi bi-calendar"></i></a>
            </div>

        </div>
    </nav>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <div class="card shadow rounded">
                    <div class="card-header">
                        <h4>
                            Editando Mês

                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="acoes.php" method="POST">
                            <input type="hidden" name="mes_id"
                                value="<?= $mes_id ?>">
                            <label for="txtMes">Selecione um Mês</label>
                            <select class="form-select" name="txtMes">
                                <option value="January"
                                    <?= $mes['name'] == 'January' ? 'selected' : '' ?>>
                                    <p>Janeiro</p>
                                </option>
                                <option value="February"
                                    <?= $mes['name'] == 'February' ? 'selected' : '' ?>>
                                    <p>Fevereiro</p>
                                </option>
                                <option value="March" <?= $mes['name'] == 'March' ? 'selected' : '' ?>>
                                    <p>Março</p>
                                </option>
                                <option value="April" <?= $mes['name'] == 'April' ? 'selected' : '' ?>>
                                    <p>Abril</p>
                                </option>
                                <option value="May" <?= $mes['name'] == 'May' ? 'selected' : '' ?>>
                                    <p>Maio</p>
                                </option>
                                <option value="June" <?= $mes['name'] == 'June' ? 'selected' : '' ?>>
                                    <p>Junho</p>
                                </option>
                                <option value="July" <?= $mes['name'] == 'July' ? 'selected' : '' ?>>
                                    <p>Julho</p>
                                </option>
                                <option value="August" <?= $mes['name'] == 'August' ? 'selected' : '' ?>>
                                    <p>Agosto</p>
                                </option>
                                <option value="September"
                                    <?= $mes['name'] == 'September' ? 'selected' : '' ?>>
                                    <p>Setembro</p>
                                </option>
                                <option value="October"
                                    <?= $mes['name'] == 'October' ? 'selected' : '' ?>>
                                    <p>Outubro</p>
                                </option>
                                <option value="November"
                                    <?= $mes['name'] == 'November' ? 'selected' : '' ?>>
                                    <p>Novembro</p>
                                </option>
                                <option value="December"
                                    <?= $mes['name'] == 'December' ? 'selected' : '' ?>>
                                    <p>Dezembro</p>
                                </option>
                            </select>
                            <div class="mb-3">
                                <label for="txtAno">Ano</label>
                                <input type="number" class="form-control"
                                    name="txtAno" value="<?= $mes['year'] ?>">
                            </div>
                            <button name="edit_mes" type="submit"
                                class="btn btn-success float-end"><i
                                    class="bi bi-floppy2-fill">
                                    Salvar</i></button>
                        </form>
                        <a href="crud_mes.php" class="btn btn-danger">Voltar</a>
                    </div>

                </div>
            </div>
        </div>
    </div>








    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>