<?php
function obterMeses($conn){
    $query = $conn->query(SELECT * FROM month ORDER BY year DESC (name, 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'));
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function calcSaldoMes($conn, $month_id){
    $query = $conn->prepare("SELECT SUM(CASE WHEN type = 'input' THEN value ELSE -value END) as entrada FROM transactions WHERE month_id = ?");
    $query->execute([$month_id]);
    $resultado = $query->fetch(PDO::FETCH_ASSOC);
}

function obterCategorias($conn){
    $query = $conn->query("SELECT * FROM category ORDER BY name");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function obterMovimentacoes($conn, $month_id){
    $query = $conn->prepare("SELECT t.*, c.nome as categoria_nome FROM movimentacoes t LEFT JOIN category c ON t.category_id = c.id WHERE T.month_id = ? ORDER BY t.date");
    $query->execute([$month_id]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
