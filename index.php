<?php

include __DIR__ . '/app/bootstrap.php';

$query = "SELECT `id`, `name`, `year` FROM `Month` WHERE `user_id` = {$_SESSION['user']['id']} ORDER BY `year` DESC, `name` DESC";
$months = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

?>

<?php page_start() ?>

<?php navbar() ?>

<?php if (empty($months)): ?>

    <div
        class="container-fluid mt-5 d-flex flex-column gap-4 justify-content-center align-items-center">

        <h3>
            Você ainda não cadastrou nenhum mês.
        </h3>
    </div>

<?php else: ?>

    <?php foreach ($months as $month): ?>
        <?php

        $query = "SELECT `id`, `date`, `type`, `description`, `value` FROM `Transaction` WHERE `month_id` = {$month['id']}";
        $transactions = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

        $query = "SELECT SUM(`value`) AS `total` FROM `Transaction` WHERE `type` = 'input' AND `month_id` = {$month['id']}";
        $input = $conn->query($query)->fetch_assoc();

        $query = "SELECT SUM(`value`) AS `total` FROM `Transaction` WHERE `type` = 'output' AND `month_id` = {$month['id']}";
        $output = $conn->query($query)->fetch_assoc();

        ?>

        <details open class="container mt-5 mb-5">
            <summary class="container border border-4">
                <h3 class="pt-3 pb-2 text-center">
                    <?= MONTHS[$month['name']] . " {$month['year']}"; ?>
                </h3>
            </summary>

            <div class="container border border-4 shadow border-top-0">
                <div class="container pt-4">
                    <div>
                        <a href="create_transaction.php?month_id=<?= $month['id'] ?>"
                            class="btn btn-dark shadow rounded">
                            <i class="bi bi-plus-circle"></i>
                            Nova transação
                        </a>

                        <div class="float-end d-flex gap-2">
                            <form
                                action="actions/delete_month.php?month_id=<?= $month['id'] ?>"
                                method="post">
                                <button
                                    onclick="return confirm('Tem certeza que deseja excluir este mês?')"
                                    type="submit" class="btn btn-danger shadow rounded"
                                    type="submit" value="<?= $month['id'] ?>">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>

                            <a type="button" class="btn btn-dark shadow rounded"
                                href="create_month.php?month_id=<?= $month['id'] ?>">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card mt-3 mb-4">
                        <div class="card-header text-center fw-bold fs-4 pt-3">
                            <h3>Resumo Mensal</h3>
                        </div>

                        <?php

                        $result = $input['total'] - $output['total'];

                        ?>

                        <div class="text-center mt-3">
                            <h3 class="fw-bold">
                                <i class="bi bi-coin"></i>
                                Saldo atual: R$ <?= $result ?>
                            </h3>
                        </div>

                        <div
                            class="card-body fw-4 p-1  d-flex justify-content-center align-items-center">
                            <div class="card-group mt-2 mb-1 w-50 shadow rounded">
                                <div class="card text-center mb-0"
                                    style="background-color: rgb(204,255,204); ">

                                    <h5 class="text-success fw-bold pt-1">
                                        <?= "Entradas: R$ " . $input['total'] ?? 0; ?>
                                    </h5>
                                </div>

                                <div class="card text-center mb-0"
                                    style="background-color: rgb(255,153,153);">

                                    <h5 class="text-danger fw-bold pt-1">
                                        <?= "Saídas: R$ " . $output['total'] ?? 0; ?>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <?php if ($result < 0): ?>
                            <div
                                class="card-group mt-1 text-center p-1 col-12 col-md-6 mx-auto text-center mb-3">
                                <div
                                    class="card bg-danger bg-opacity-10 text-light shadow rounded">
                                    <h5 class="pt-1 fw-bold">
                                        Seu saldo é negativo
                                    </h5>
                                </div>
                            </div>
                        <?php elseif ($result > 1): ?>
                            <div
                                class="card-group mt-1 text-center p-1 col-12 col-md-6 mx-auto text-center mb-3">
                                <div
                                    class="card bg-success bg-opacity-10 text-light shadow rounded">
                                    <h5 class="pt-1 fw-bold">
                                        Seu saldo é positivo
                                    </h5>
                                </div>
                            </div>
                        <?php elseif ($result == 0): ?>
                            <div
                                class="card-group mt-1 text-center p-1 col-12 col-md-6 mx-auto text-center mb-3">
                                <div
                                    class="card bg-warning bg-opacity-10 text-light shadow rounded">
                                    <h5 class="pt-1 fw-bold">
                                        Seu saldo é neutro
                                    </h5>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>

                <div class="container mt-4">
                    <?php if (empty($transactions)): ?>
                        <div class="card mt-3 mb-3">
                            <div class="card-body text-center">
                                Nenhuma transação cadastrada.
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="card mt-3 mb-3">
                            <div class="card-body text-center">
                                Suas transações do mês:
                            </div>
                        </div>

                        <table class="table table-striped-columns table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Transação</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Data da transação</th>
                                    <th scope="col">Categoria</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <?php foreach ($transactions as $transaction): ?>
                                        <?php

                                        $query = <<<SQL
                                            SELECT `Category`.`name` FROM `Category` INNER JOIN `Transaction`
                                            ON `Category`.`id` = `Transaction`.`category_id` 
                                            WHERE `Transaction`.`id` = {$transaction['id']};
                                        SQL;

                                        $category = $conn->query($query)->fetch_assoc();

                                        ?>

                                        <td data-label="Transação: " class="align-middle">
                                            <?= TYPES[$transaction['type']]; ?>
                                        </td>

                                        <td data-label="Valor: " class="align-middle">
                                            <?= 'R$ ' . $transaction['value']; ?>
                                        </td>

                                        <td data-label="Descrição: " class="align-middle">
                                            <?= $transaction['description']; ?>
                                        </td>

                                        <td data-label="Data da transação: "
                                            class="align-middle">
                                            <?= date_create_from_format('Y-m-d', $transaction['date'])->format('d/m/Y'); ?>
                                        </td>

                                        <td data-label="Categoria: " class="align-middle">
                                            <?php if (!empty($category['name'])): ?>
                                                <?= $category['name'] ?>
                                            <?php endif ?>
                                        </td>

                                        <td data-label="Ações: "
                                            class="align-middle d-flex justify-content-end gap-2"
                                            style="align-items: center;">
                                            <form
                                                action="actions/delete_transaction.php?transaction_id=<?= $transaction['id'] ?>"
                                                method="post">
                                                <button
                                                    onclick="return confirm('Tem certeza que deseja excluir esta transação?')"
                                                    class="btn btn-danger shadow rounded"
                                                    type="submit">
                                                    <i class="bi bi-file-earmark-minus"></i>
                                                </button>
                                            </form>

                                            <a href="create_transaction.php?month_id=<?= $month['id'] ?>&transaction_id=<?= $transaction['id'] ?>"
                                                class="btn btn-dark shadow rounded">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php endif ?>
                </div>
            </div>
        </details>
    <?php endforeach ?>

<?php endif ?>

<?php page_end() ?>