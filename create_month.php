<?php

include __DIR__ . '/app/bootstrap.php';

if (empty($_GET['month_id'])) {
    $month = [];
} else {
    $monthId = $conn->real_escape_string($_GET['month_id']);
    $query = "SELECT * FROM `Month` WHERE `id` = '$monthId' AND `user_id` = {$_SESSION['user']['id']}";
    $month = $conn->query($query)->fetch_assoc() ?? [];
}

?>

<?php page_start('Adicionar/editar mês') ?>

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
                        <?php if (empty($month)): ?>
                            Adicionar mês
                        <?php else: ?>
                            Editar mês
                        <?php endif ?>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="actions/create_month.php" method="post">
                        <input type="hidden" name="month_id"
                            value="<?= $_GET['month_id'] ?? '' ?>">

                        <div class="mb-3 mt-3">
                            <label for="month">Mês</label>

                            <select class="form-select" name="month" id="month"
                                required>
                                <?php foreach (MONTHS as $key => $value): ?>
                                    <option value="<?= $key ?>"
                                        <?= $month['name'] == $key ? 'selected' : '' ?>>
                                        <?= $value ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="year">Ano</label>

                            <input type="number" class="form-control" min="1900"
                                required max="2099" step="1" name="year"
                                value="<?= $month['year'] ?? '' ?>" id="year">
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