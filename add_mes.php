<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Mês</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
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

<body>
    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <div class="card shadow rounded">
                    <div class="card-header">
                        <h4 class="text-center">
                            Adicionar Mês
                            <a href="index.php"
                                class="btn btn-danger float-start shadow rounded"><i
                                    class="bi bi-arrow-return-left"></i></a>
                        </h4>

                    </div>
                    <div class="card-body">
                        <form action="acoes.php" method="POST">
                            <label for="txtMes">Selecione um Mês</label>
                            <select class="form-select" name="txtMes">
                                <option value="January">
                                    <p>Janeiro</p>
                                </option>
                                <option value="February">
                                    <p>Fevereiro</p>
                                </option>
                                <option value="March">
                                    <p>Março</p>
                                </option>
                                <option value="April">
                                    <p>Abril</p>
                                </option>
                                <option value="May">
                                    <p>Maio</p>
                                </option>
                                <option value="June">
                                    <p>Junho</p>
                                </option>
                                <option value="July">
                                    <p>Julho</p>
                                </option>
                                <option value="August">
                                    <p>Agosto</p>
                                </option>
                                <option value="September">
                                    <p>Setembro</p>
                                </option>
                                <option value="October">
                                    <p>Outubro</p>
                                </option>
                                <option value="November">
                                    <p>Novembro</p>
                                </option>
                                <option value="December">
                                    <p>Dezembro</p>
                                </option>
                            </select>

                            <div class="mb-3">
                                <label for="txtAno">Ano</label>
                                <input type="number" class="form-control"
                                    name="txtAno">
                            </div>
                            <?php
                            if (isset($_SESSION['message'])) {
                                echo "<div class='alert alert-danger p-1 col-12 col-md-6 mx-auto text-center'>{$_SESSION['message']}</div>";
                            }
                            unset($_SESSION['message']);
                            ?>

                            <div class="mb-3">
                                <button name="create_mes" type="submit"
                                    class="btn btn-success float-end shadow rounded"><i
                                        class="bi bi-floppy2-fill">
                                        Salvar</i></button>
                            </div>
                        </form>
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