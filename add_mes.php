<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Mês</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-header">Adicionar Mês</div>
        <div class="card-body">
                <div class="row" style="width: 100%;">
                    <div class="col">
                        <div class="card" style="width: 40px;">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Selecione um Mês</button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><p>Janeiro</p></li>
                                        <li><p>Fevereiro</p></li>
                                        <li><p>Março</p></li>
                                        <li><p>Abril</p></li>
                                        <li><p>Maio</p></li>
                                        <li><p>Junho</p></li>
                                        <li><p>Julho</p></li>
                                        <li><p>Agosto</p></li>
                                        <li><p>Setembro</p></li>
                                        <li><p>Outubro</p></li>
                                        <li><p>Novembro</p></li>
                                        <li><p>Dezembro</p></li>
                                        <li><a class="dropdown-item" href="add_cat">Categoria</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 40px;">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Filtrar</button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#"> por Mês</a></li>
                                        <li><a class="dropdown-item" href="#">por Categoria</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card" style="display: flex;">
                    <div class="mb-3">
                        <label for="" class="form-label">Tipo</label>
                        <input type="" class="form-control" id="" placeholder="Entrada,Saída">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Valor</label>
                        <input type="" class="form-control" id="" placeholder="Entrada,Saída">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Categoria</label>
                        <input type="" class="form-control" id="" placeholder="Lazer, Comida, etc">
                    </div>
                </div>
                



        </div>

    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>