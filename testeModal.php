<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de modal</title>
</head>
<body>

<button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#ModalCriarMes">Criar Mês Teste</button>
    <!-- Modal Estrutura -->
<div class="modal fade" id="ModalCriarMes" tabindex="-1" aria-labelledby="criarMesLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Cabeçalho do modal -->
      <div class="modal-header">
        <h5 class="modal-title" id="ModalCriarMes">Criar Mês</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>

      
      
      <!-- Corpo do modal -->
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="monthName" class="form-label">Nome do Mês</label>
            <input type="text" class="form-control" id="monthName" placeholder="Nome do Mês">
          </div>
          <div class="mb-3">
            <label for="monthYear" class="form-label">Ano</label>
            <input type="number" class="form-control" id="monthYear" placeholder="Ano">
          </div>
        </form>
      </div>
      
      <!-- Rodapé do modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>
    
</body>
</html>