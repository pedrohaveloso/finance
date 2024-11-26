<?php

function error_message(): void
{
    if (isset($_SESSION['message'])) {
        ?>

        <div class='alert alert-danger p-1 col-12 col-md-6 mx-auto text-center'>
            <?= $_SESSION['message'] ?>
        </div>

        <?php
    }

    unset($_SESSION['message']);
}
