<?php
session_start();
require_once("conexao.php");
require_once("constantes.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Transação</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container border border-dark mb-5">
        <h2>Adicionar nova Transação</h2>
        <div class="card">
            <h3>Digite as informações da nova Transação</h3>
            <form action="logicaCreateTransacao.php" method="POST">
                <label for="txtDataNovaTransacao">Data:</label>
                <input type="date" id="txtDataNovaTransacao" name="txtDataNovaTransacao" placeholder="aaaa-mm-dd">

                <select name="txtTipo" class="form-select" aria-label="txtTipo">
                    <option value="input">Entrada</option>      
                    <option value="output">Saída</option>      
                </select>
                 

                <label for="txtDescricaoNovaTransacao">Descrição:</label>
                <input type="text" id="txtDescricaoNovaTransacao" name="txtDescricaoNovaTransacao">

                <label for="txtValorNovaTransacao">Valor:</label>
                <input type="number" id="txtValorNovaTransacao" name="txtValorNovaTransacao">

                <input type="hidden" name="idMes" value="<?php echo $_GET['mes_id']?>">

                <button type="submit" id="create_transacao" name="create_transacao">Enviar</button>
                <a href="index.php">Voltar</a>
            </form>
            </div>
        </div>
    </div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>