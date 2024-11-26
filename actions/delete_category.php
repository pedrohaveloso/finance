<?php

include __DIR__ . '/../app/bootstrap.php';

if (empty($_GET['category_id'])) {
    header('Location: ../index.php');
    exit();
}

$categoryId = $conn->real_escape_string($_GET['category_id']);

$query = "DELETE FROM `Category` WHERE `id` = $categoryId AND `user_id` = {$_SESSION['user']['id']}";
$conn->query($query);

header('Location: ../index.php');
exit();
