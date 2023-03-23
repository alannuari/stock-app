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
    <title>Welcome</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="d-flex justify-content-center align-items-center flex-column" style="height: 100vh">
        <h1>Selamat Datang di Aplikasi Stok Barang (Stock App)</h1>
        <a href="login.php" class="d-block mt-5 bg-info px-4 text-black py-2 text-decoration-none rounded-pill text-bold fw-bold">Login here</a>
    </div>
</body>
</html>