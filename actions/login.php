<?php

include __DIR__ . '/../app/bootstrap.php';

if (empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['message'] = 'Preencha todos os campos';
    header('Location: ../login.php');
    exit();
}

$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);

$query = "SELECT * FROM `User` WHERE `email` = '$email'";

$user = $conn->query($query)->fetch_assoc();

if (empty($user)) {
    $_SESSION['message'] = 'Usuário não encontrado';
    header('Location: ../login.php');
    exit();
}

if (!password_verify($password, $user['password'])) {
    $_SESSION['message'] = 'Senha incorreta';
    header('Location: ../login.php');
    exit();
}

$_SESSION['user'] = $user;

header('Location: ../index.php');
exit();