<?php

include __DIR__ . '/../app/bootstrap.php';

if (empty($_POST['month']) || empty($_POST['year'])) {
    $_SESSION['message'] = 'Preencha todos os campos';
    header('Location: ../create_month.php');
    exit();
}

$month = $conn->real_escape_string($_POST['month']);
$year = $conn->real_escape_string($_POST['year']);
$monthId = $conn->real_escape_string($_POST['month_id'] ?? null);

if (empty($monthId)) {
    $query = "INSERT INTO `Month` (`name`, `year`, `user_id`) VALUES ('$month', '$year', {$_SESSION['user']['id']})";
} else {
    $query = "UPDATE `Month` SET `name` = '$month', `year` = '$year' WHERE `id` = $monthId AND `user_id` = {$_SESSION['user']['id']}";
}

$conn->query($query);

header('Location: ../index.php');
exit();
