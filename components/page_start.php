<?php

function page_start(?string $title = null): void
{
    $title = $title ? "Finance | $title" : "Finance";

    ?>

    <!DOCTYPE html>
    <html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Finance, seu gerenciador de financias.">

        <title><?= $title ?></title>

        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous">

        <style>
            * {
                margin: 0px;
                padding: 0px;
            }

            body {
                min-height: 100vh;
                min-width: 100%;
            }

            details summary {
                list-style: none;
                border-radius: 1rem;
            }

            details[open] summary {
                border-radius: 1rem 1rem 0 0;
            }

            details div {
                border-radius: 0 0 1rem 1rem;
            }

            @media (max-width: 768px) {
                .navbar-nav {
                    flex-direction: column;
                }

                .navbar-nav .btn {
                    margin-bottom: 5px;
                }
            }
        </style>
    </head>

    <body>

        <?php
}