<!DOCTYPE html>
<?php
    session_start();

    if (isset($_SESSION['login'])) {
        header('Location: home.php');
        exit;
    }

    session_destroy();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplikasi Management Stok Barang" />
    <meta name="keywords" content="Management Stock, Stock App, Barang" />
    <meta name="author" content="Alan Nuari" />
    <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon" />
    <title>Welcome</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body style="background-color: aliceblue">
    <div class="d-flex align-items-center container" style="height: 100vh">
        <div class="ml-4"  style="width: 600px">
            <h1 class="mb-5">Manage Your Stock and Increase Your Revenue</h1>
            <a href="login.php" class="px-4 text-black py-2 text-decoration-none rounded-pill fw-bold" style="background-color: #6495ed">Login here</a>
        </div>
        <div class="mr-4">
            <img style="width: 100%" src="./images/stock.png" alt="management stock">
        </div>
    </div>
</body>
</html>