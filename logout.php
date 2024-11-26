<?php

include __DIR__ . '/app/bootstrap.php';

$_SESSION['user'] = null;

header('Location: login.php');
exit();