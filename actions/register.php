<?php

include __DIR__ . '/../app/bootstrap.php';

if (empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['message'] = 'Preencha todos os campos';
    header('Location: ../register.php');
    exit();
}

$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);

$query = "SELECT * FROM `User` WHERE `email` = '$email'";

$user = $conn->query($query)->fetch_assoc();

if (!empty($user)) {
    $_SESSION['message'] = 'Usuário já cadastrado';
    header('Location: ../register.php');
    exit();
}

$password = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO `User` (`email`, `password`) VALUES ('$email', '$password')";

$conn->query($query);

$query = "SELECT * FROM `User` WHERE `email` = '$email'";

$user = $conn->query($query)->fetch_assoc();

$_SESSION['user'] = $user;

header('Location: ../index.php');
exit();
