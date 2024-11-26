<?php

include __DIR__ . '/app/bootstrap.php';

if (empty($_GET['category_id'])) {
    $category = [];
} else {
    $categoryId = $conn->real_escape_string($_GET['category_id']);
    $query = "SELECT * FROM `Category` WHERE `id` = $categoryId AND `user_id` = {$_SESSION['user']['id']}";
    $category = $conn->query($query)->fetch_assoc() ?? [];
}

?>

<?php page_start('Adicionar/editar categoria') ?>

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
                        <?php if (empty($category)): ?>
                            Adicionar categoria
                        <?php else: ?>
                            Editar categoria
                        <?php endif ?>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="actions/create_category.php" method="post">
                        <input type="hidden" name="category_id"
                            value="<?= $_GET['category_id'] ?>">

                        <div class="mb-3 mt-3">
                            <label for="name">Nome</label>

                            <input type="text" class="form-control" name="name"
                                value="<?= $category['name'] ?? '' ?>" required
                                id="name">
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