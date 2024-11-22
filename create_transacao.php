<?php
session_start();
require_once("conexao.php");
require_once("constantes.php");

$sql = "SELECT * FROM category";
$categorias = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Transação</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-header">
                        <h4>Nova Transação</h4>

                    </div>
                    <div class="card-body">
                        <div class="card mb-3 text-center">
                            Adicione as informações da sua transação
                        </div>
                        <form action="acoes.php" method="POST">
                            <div class="mb-3">
                                <label for="txtDataNovaTransacao">Data</label>
                                <input type="date" id="txtDataNovaTransacao" name="txtDataNovaTransacao" placeholder="aaaa-mm-dd" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="txtTipo">Tipo de movimentação</label>
                                <select name="txtTipo" id="txtTipo" class="form-select" aria-label="txtTipo">
                                    <?php foreach ($types as $chave => $valor): ?>
                                        <option value="<?php echo $chave; ?>"><?php echo $valor; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>       
                            <div class="mb-3">
                                <label for="txtCat">Categorias</label>
                                <select  name="txtCat" class="form-select" aria-label="txtCat">
                                <?php foreach ($categorias as $categoria): ?>
                                    <option value = "<?=$categoria['id']?>"><?php echo $categoria['name']?> </option>
                                <?php endforeach?>;
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="txtDescricaoNovaTransacao">Descrição:</label>
                                <textarea name="txtDescricaoNovaTransacao" id="txtDescricaoNovaTransacao" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="txtValorNovaTransacao">Valor:</label>
                                <input type="number" id="txtValorNovaTransacao" name="txtValorNovaTransacao" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="hidden" name="idMes" value="<?php echo $_GET['mes_id']?>">
                            </div>
                            <div class="mb-3">
                                <a href="index.php" class="btn btn-danger">Voltar</a>    
                                <button type="submit" id="create_transacao" name="create_transacao" class="btn btn-success float-end">Enviar</button>
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