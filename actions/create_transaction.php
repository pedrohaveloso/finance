<?php

include __DIR__ . '/../app/bootstrap.php';

if (
    empty($_POST['date'])
    || empty($_POST['type'])
    || empty($_POST['description'])
    || empty($_POST['value'])
    || empty($_POST['month_id'])
    || empty($_POST['category_id'])
) {
    $_SESSION['message'] = 'Preencha todos os campos';
    header('Location: ../create_transaction.php?month_id=' . $_POST['month_id'] . '&transaction_id=' . $_POST['transaction_id']);
    exit();
}

$date = $conn->real_escape_string($_POST['date']);
$type = $conn->real_escape_string($_POST['type']);
$description = $conn->real_escape_string($_POST['description']);
$value = $conn->real_escape_string($_POST['value']);
$monthId = $conn->real_escape_string($_POST['month_id']);
$categoryId = $conn->real_escape_string($_POST['category_id']);
$transactionId = $conn->real_escape_string($_POST['transaction_id'] ?? null);

$query = "SELECT * FROM `Month` WHERE `id` = '$monthId'";
$month = $conn->query($query)->fetch_assoc();

if (empty($month)) {
    $_SESSION['message'] = 'Mês não encontrado';
    header('Location: ../create_transaction.php?month_id=' . $_POST['month_id'] . '&transaction_id=' . $_POST['transaction_id']);
    exit();
}

$query = "SELECT * FROM `Category` WHERE `id` = '$categoryId'";
$category = $conn->query($query)->fetch_assoc();

if (empty($category)) {
    $_SESSION['message'] = 'Categoria não encontrada';
    header('Location: ../create_transaction.php?month_id=' . $_POST['month_id'] . '&transaction_id=' . $_POST['transaction_id']);
    exit();
}

if (empty($transactionId)) {
    $query = <<<SQL
        INSERT INTO `Transaction` (`date`, `type`, `description`, `value`, `month_id`, `category_id`, `user_id`) 
        VALUES ('$date', '$type', '$description', '$value', $monthId, {$category['id']}, {$_SESSION['user']['id']});
    SQL;

    $conn->query($query);
} else {
    $query = <<<SQL
        UPDATE `Transaction` SET 
            `date` = '$date', 
            `type` = '$type', 
            `description` = '$description', 
            `value` = '$value', 
            `month_id` = $monthId, 
            `category_id` = {$category['id']} 
        WHERE `id` = $transactionId AND `user_id` = {$_SESSION['user']['id']};
    SQL;

    $conn->query($query);
}

header('Location: ../index.php');
exit();
