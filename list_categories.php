<?php

include __DIR__ . '/app/bootstrap.php';

$query = "SELECT * FROM `Category` WHERE `user_id` = {$_SESSION['user']['id']} OR `user_id` IS NULL ORDER BY `user_id` DESC";
$categories = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

?>

<?php page_start() ?>

<?php navbar() ?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card shadow rounded">
                <div
                    class="card-header d-flex gap-4 align-items-center pt-3 pb-3">
                    <a href="javascript:history.back()"
                        class="btn btn-dark shadow rounded">
                        <i class="bi bi-arrow-return-left"></i>
                    </a>

                    <h4 class="m-0">
                        Categorias
                    </h4>
                </div>

                <div class="card-body">
                    <p class="text-center">
                        Certas categorias são inclusas por padrão e não podem
                        ser editadas.
                    </p>

                    <table class="table table-striped-columns table-hover">
                        <thead class="text-center fw-bold">
                            <tr>
                                <th>Nome</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody class="text-center">

                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td class="align-middle">
                                        <?= $category['name'] ?>
                                    </td>

                                    <td class="align-middle">
                                        <?php if (empty($category['user_id'])): ?>
                                            Não pode ser editada
                                        <?php else: ?>
                                            <div class="d-flex
                                            justify-content-center gap-2">
                                                <a href="create_category.php?category_id=<?= $category['id']; ?>"
                                                    class="btn btn-dark shadow rounded">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <form
                                                    action="actions/delete_category.php?category_id=<?= $category['id'] ?>"
                                                    method="post">
                                                    <button type="submit"
                                                        onclick="return confirm('Tem certeza que deseja excluir essa categoria?')"
                                                        class="btn btn-danger shadow rounded">

                                                        <i
                                                            class="bi bi-file-earmark-minus">
                                                        </i>
                                                    </button>
                                                </form>
                                            </div>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php page_end() ?>