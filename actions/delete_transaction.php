<?php

include __DIR__ . '/../app/bootstrap.php';

if (empty($_GET['transaction_id'])) {
    header('Location: ../index.php');
    exit();
}

$transactionId = $conn->real_escape_string($_GET['transaction_id']);

$query = "DELETE FROM `Transaction` WHERE `id` = $transactionId AND `user_id` = {$_SESSION['user']['id']}";
$conn->query($query);

header('Location: ../index.php');
exit();
