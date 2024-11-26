<?php

include __DIR__ . '/../app/bootstrap.php';

if (empty($_POST['name'])) {
    $_SESSION['message'] = 'Preencha todos os campos';
    header('Location: ../create_category.php');
    exit();
}

$name = $conn->real_escape_string($_POST['name']);
$categoryId = $conn->real_escape_string($_POST['category_id'] ?? null);

if (empty($categoryId)) {
    $query = "INSERT INTO `Category` (`name`, `user_id`) VALUES ('$name', {$_SESSION['user']['id']})";
} else {
    $query = "UPDATE `Category` SET `name` = '$name' WHERE `id` = $categoryId AND `user_id` = {$_SESSION['user']['id']}";
}

$conn->query($query);

header('Location: ../index.php');
exit();
