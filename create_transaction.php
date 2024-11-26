<?php

include __DIR__ . '/app/bootstrap.php';

if (empty($_GET['month_id'])) {
    header('Location: index.php');
    exit();
}

$query = "SELECT * FROM `Category` WHERE `user_id` = {$_SESSION['user']['id']} OR `user_id` IS NULL";
$categories = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

$monthId = $conn->real_escape_string($_GET['month_id']);
$query = "SELECT * FROM `Month` WHERE `id` = {$monthId} AND `user_id` = {$_SESSION['user']['id']}";
$month = $conn->query($query)->fetch_assoc();

if (empty($month)) {
    header('Location: index.php');
    exit();
}

if (empty($_GET['transaction_id'])) {
    $transaction = [];
} else {
    $transactionId = $conn->real_escape_string($_GET['transaction_id']);
    $query = "SELECT * FROM `Transaction` WHERE `id` = $transactionId AND `user_id` = {$_SESSION['user']['id']}";
    $transaction = $conn->query($query)->fetch_assoc() ?? [];
}

?>

<?php page_start('Adicionar/editar transação') ?>

<?php navbar() ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-5">
            <div class="card shadow rounded">
                <div
                    class="card-header d-flex gap-4 align-items-center pt-3 pb-3">
                    <a href="javascript:history.back()"
                        class="btn btn-dark shadow rounded">
                        <i class="bi bi-arrow-return-left"></i>
                    </a>

                    <h4 class="m-0">
                        <?php if (empty($transaction)): ?>
                            Adicionar transação
                        <?php else: ?>
                            Editar transação
                        <?php endif ?>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="actions/create_transaction.php" method="post">
                        <input type="hidden" name="month_id"
                            value="<?= $_GET['month_id'] ?>">

                        <input type="hidden" name="transaction_id"
                            value="<?= $transaction['id'] ?? '' ?>">

                        <div class="mb-3 mt-3">
                            <label for="date">Data</label>

                            <input type="date" class="form-control" required
                                min="<?= $month['year'] ?>-<?= MONTHS_NUMBER[$month['name']] ?>-01"
                                max="<?= $month['year'] ?>-<?= MONTHS_NUMBER[$month['name']] ?>-31"
                                value="<?= $transaction['date'] ?? '' ?>"
                                name="date" id="date">
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="type">Tipo de movimentação</label>

                            <select class="form-select" name="type" id="type"
                                required>
                                <?php foreach (TYPES as $key => $value): ?>
                                    <option value="<?= $key ?>"
                                        <?= $transaction['type'] == $key ? 'selected' : '' ?>>
                                        <?= $value ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="category-id">Categoria</label>

                            <select class="form-select" name="category_id"
                                id="category-id" required>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['id'] ?>"
                                        <?= $transaction['category_id'] == $category['id'] ? 'selected' : '' ?>>
                                        <?= $category['name'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="description">Descrição</label>

                            <textarea name="description" id="description"
                                rows="3"
                                class="form-control"><?= $transaction['description'] ?? '' ?></textarea>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="value">Valor</label>

                            <input type="number" id="value" name="value"
                                value="<?= $transaction['value'] ?? '' ?>"
                                class="form-control">
                        </div>

                        <?php error_message() ?>

                        <div class="mb-3 mt-4">
                            <button type="submit"
                                class="btn btn-dark float-end shadow rounded">
                                <i class="bi bi-floppy2-fill"></i>

                                Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php page_end() ?>