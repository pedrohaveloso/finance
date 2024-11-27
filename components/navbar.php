<?php

function navbar(): void
{
    ?>

    <nav class="navbar navbar-expand-lg bg-dark text-white">
        <div class="container-fluid d-flex align-items-center">
            <a href="index.php" class="navbar-app-title"
                style="text-decoration: inherit; color: inherit;">
                <h2 class="mb-0 fw-bold">
                    Finance Control
                    <i class="bi bi-wallet-fill"></i>
                </h2>
            </a>

            <div class="navbar-app-menu">
                <a class="btn bg-light fw-bold" href="index.php">
                    <i class="bi bi-house"></i>
                </a>

                <a class="btn bg-light fw-bold" href="create_month.php">
                    <i class="bi bi-plus-circle"></i>
                    Mês
                </a>

                <a class="btn bg-light fw-bold  " href="create_category.php">
                    <i class="bi bi-plus-circle"></i>
                    Categoria
                </a>

                <a class="btn bg-light fw-bold" href="list_categories.php">
                    <i class="bi bi-bookmark-star"></i>
                </a>

                <a class="btn bg-danger fw-bold text-light" href="logout.php">
                    <i class="bi bi-door-closed-fill"></i>
                </a>
            </div>
        </div>
    </nav>

    <?php
}