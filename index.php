<?php


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
    <h1>Finanças</h1>
    <div class="btn-group" style="width: 100%;">
        
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Adicionar</button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="add_mes.php">Mês</a></li>
                            <li><a class="dropdown-item" href="add_cat.php">Categoria</a></li>
                        </ul>
                    </div>
                </div>

            
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
    <div class="container border border-dark">
        <div class="container">
            <h3>Nome do Mês</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">id</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Saída</th>
                        <td>500,00</td>
                        <td>Lazer</td>
                        <td>Ex</td>
                    </tr>
                    <tr>
                        <th scope="row">Entrada</th>
                        <td>5000,00</td>
                        <td>Salário</td>
                        <td>Ex</td>
                    </tr>
                    <tr>
                        <th scope="row">ex</th>
                        <td>ex</td>
                        <td>ex</td>
                        <td>Ex</td>
                    </tr>
                    <tr>
                        <th scope="row">ex</th>
                        <td>ex</td>
                        <td>ex</td>
                        <td>Ex</td>
                    </tr>
                    <tr>
                        <th scope="row">ex</th>
                        <td>ex</td>
                        <td>ex</td>
                        <td>Ex</td>
                    </tr>
                    <tr>
                        <th scope="row">ex</th>
                        <td>ex</td>
                        <td>ex</td>
                        <td>Ex</td>
                    </tr>
                    <tr>
                        <th scope="row">ex</th>
                        <td>ex</td>
                        <td>ex</td>
                        <td>Ex</td>
                    </tr>
                </tbody>
            </table>
        </div>
        

    </div>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>