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

            table {
                text-align: left;
                border-spacing: 0
            }

            table thead th,
            table thead td {
                text-transform: uppercase
            }

            table th,
            table td {
                padding: 10px 15px
            }

            @media (max-width: 800px) {
                table {
                    width: 100%
                }

                table td,
                table th {
                    padding-bottom: 5px
                }

                table thead tr {
                    display: none
                }

                table tbody tr {
                    display: flex;
                    flex-direction: column;
                    border-bottom: 1px solid rgba(0, 0, 0, .3);
                    padding: 20px 0
                }

                table tbody tr:first-child {
                    border-top: 1px solid rgba(0, 0, 0, .3)
                }

                table tbody tr+tr {
                    padding-top: 20px
                }

                table td[data-label]:before {
                    content: attr(data-label);
                    font-weight: 700
                }

                table tbody tr:nth-child(odd) {
                    background-color: transparent
                }

                table>tbody>tr>td {
                    border-top: 0
                }
            }

            @media (max-width: 768px) {
                .navbar-nav {
                    flex-direction: column;
                }

                .navbar-app-title {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 100%;
                }

                .navbar-app-title h2 {
                    font-size: 1.2rem;
                    text-align: center;
                }

                .navbar-nav .btn {
                    margin-bottom: 5px;
                }

                .navbar-app-menu {
                    display: flex;
                    gap: 4px;
                    margin-top: 10px;
                    flex-direction: column;
                    width: 100%;
                }

                .navbar-app-menu * {
                    width: 100%;
                }
            }
        </style>
    </head>

    <body>

        <?php
}