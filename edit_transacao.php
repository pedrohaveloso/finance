<?php
session_start();
require_once('conexao.php');



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - Transaçao</title>
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
                        Editando Transação
                        <a href="index.php" class="btn btn-danger float-start"><i class="bi bi-arrow-return-left"></i></a>
                    </h4>
                    </div>
                    <div class="card-body jusfify-content-center">
                        <form action="acoes.php" class="text-center" method="POST">
                            <input type="hidden" name="idTransação" value="<?=$transacao['id']?>">
                            <div class="mb-3">
                                <label for="txtType">Tipo</label>
                                <select name="txtType" id="txtType">
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="txtValor">Valor</label>
                                <input type="number" name="txtValor" id="txtValor" class="form-control" value="<?=$transacao['value']?>">
                            </div>
                            <div class="mb-3">
                                <label for="txtDescricao">Descrição</label>
                                <textarea type="text" name="txtDescricao" id="txtDescricao" class="form-control" value="<?=$transacao['description']?>" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="txtData">Data da Transação</label>
                                <input type="date" name="txtData" id="txtData" class="form-control" value="<?=$transacao['date']?>">
                            </div>
                            <div class="mb-3">
                                <label for="txtCat">Categoria</label>
                                <select name="txtCat" id="txtCat">
                                <input  type="txtNome" type= "txtCat" name="txtCat" id="txtCat" value="<?=$categorias['name']?>" class="form-control">
                                </select>
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