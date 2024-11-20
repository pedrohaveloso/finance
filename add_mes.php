<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Mês</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
        <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">
                            Adicionar Mês
                            <a href="index.php" class="btn btn-danger float-start"><i class="bi bi-arrow-return-left"></i></a>
                        </h4>
                        
                    </div>
                    <div class="card-body">
                        <form action="acoes.php" method="POST">
                            <div class="mb-3">
                                <label for="txtNome">Mês</label>
                                <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Selecione um Mês</button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li class="dropdown-item"><p>Janeiro</p></li>
                                        <li class="dropdown-item"><p>Fevereiro</p></li>
                                        <li class="dropdown-item"><p>Março</p></li>
                                        <li class="dropdown-item"><p>Abril</p></li>
                                        <li class="dropdown-item"><p>Maio</p></li>
                                        <li class="dropdown-item"><p>Junho</p></li>
                                        <li class="dropdown-item"><p>Julho</p></li>
                                        <li class="dropdown-item"><p>Agosto</p></li>
                                        <li class="dropdown-item"><p>Setembro</p></li>
                                        <li class="dropdown-item"><p>Outubro</p></li>
                                        <li class="dropdown-item"><p>Novembro</p></li>
                                        <li class="dropdown-item"><p>Dezembro</p></li>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="txtAno">Ano</label>
                                <input type="number" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button name="create_mes" type="submit" class="btn btn-success float-end"><i class="bi bi-floppy2-fill">  Salvar</i></button>
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