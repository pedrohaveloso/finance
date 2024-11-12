<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gerenciador de financias">

    <title><?= $title ?></title>

    <link rel="stylesheet" href="/assets/bootstrap/5.3.3/bootstrap.min.css">
</head>

<body>
    <script>
        window["errorMessage"] = `<?= $_SESSION['error'] ?? ''; ?>`;
        <?php unset($_SESSION['error']); ?>
    </script>

    <?= $children ?>

    <script src="/assets/bootstrap/5.3.3/bootstrap.bundle.min.js"></script>

    <script type="module" src="/assets/js/error-modal.js"></script>
</body>

</html>