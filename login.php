<?php

require 'config/db_connect.php';

session_start();

if (isset($_SESSION['login'])) {
    header('Location: home.php');
    exit;
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";

    $cek_user = mysqli_query($conn, $sql);

    if (mysqli_num_rows($cek_user) > 0) {
        $_SESSION['login'] = true;
        $_SESSION['email'] = $email;
        header('Location: home.php');
    } else {
        echo "
            <script>
                alert('Email atau password salah!');
                window.location.href='login.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Aplikasi Management Stok Barang" />
        <meta name="keywords" content="Management Stock, Stock App, Barang" />
        <meta name="author" content="Alan Nuari" />
        <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body style="background-color: aliceblue">
        <div id="layoutAuthentication" style="height: 100vh" class="flex-row align-items-center">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-5">
                                <div class="card border-0 shadow-sm" style="border-radius: 10px; background-color: cornflowerblue">
                                    <div class="card-header bg-dark" style="border-radius: 10px 10px 0 0">
                                        <h3 class="text-center font-weight-light text-white my-3">Stock App Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="mt-4 mb-0 text-center rounded-full">
                                                <button class="btn btn-dark " style="width: 100%; border-radius: 10px" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <div class="mx-auto mt-5" style="max-width: 600px">
                    <p class="text-center py-2 mx-2 mb-0 bg-light">
                        Email : admin@gmail.com ; Password : admin
                    </p>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
