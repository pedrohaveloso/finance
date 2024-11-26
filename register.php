<?php

include __DIR__ . '/app/bootstrap.php';

?>

<?php page_start() ?>

<div class="container">
    <div
        class="container-fluid vh-100 d-flex flex-column gap-4 justify-content-center align-items-center">

        <h2 class="fw-bold text-center">
            Finance Control
            <i class="bi bi-wallet-fill"></i>
        </h2>

        <div class="col-md-6 col-lg-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-center card-title">Cadastro</h3>

                    <form method="post" action="actions/register.php">
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                E-mail
                            </label>

                            <input type="email" class="form-control" id="email"
                                name="email" placeholder="matheus@gmail.com"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Senha
                            </label>

                            <input type="password" class="form-control"
                                name="password" id="password"
                                placeholder="******" required>
                        </div>

                        <?php error_message() ?>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-dark fw-bold">
                                Cadastrar-se
                            </button>
                        </div>

                        <a class="text-center d-grid mt-4" href="login.php">
                            Entrar
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php page_end() ?>