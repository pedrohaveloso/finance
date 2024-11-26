<?php

include __DIR__ . '/../app/bootstrap.php';

if (empty($_GET['month_id'])) {
    header('Location: ../index.php');
    exit();
}

$monthId = $conn->real_escape_string($_GET['month_id']);

$query = "DELETE FROM `Month` WHERE `id` = $monthId AND `user_id` = {$_SESSION['user']['id']}";
$conn->query($query);

header('Location: ../index.php');
exit();
