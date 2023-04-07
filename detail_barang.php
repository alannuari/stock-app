<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require 'config/db_connect.php';

$id = $_GET['id'];

$sql_detail = "SELECT * FROM stock WHERE idbarang='$id'";
$result_detail = mysqli_query($conn, $sql_detail);
$data_detail = mysqli_fetch_array($result_detail);

$sql_detail_masuk = "SELECT * FROM masuk, stock WHERE masuk.idbarang=stock.idbarang AND stock.idbarang='$id'";
$result_detail_masuk = mysqli_query($conn, $sql_detail_masuk);
$data_detail_masuk = mysqli_fetch_all($result_detail_masuk, MYSQLI_ASSOC);

$sql_detail_keluar = "SELECT * FROM keluar, stock WHERE keluar.idbarang=stock.idbarang AND stock.idbarang='$id'";
$result_detail_keluar = mysqli_query($conn, $sql_detail_keluar);
$data_detail_keluar = mysqli_fetch_all($result_detail_keluar, MYSQLI_ASSOC);

mysqli_free_result($result_detail);
mysqli_free_result($result_detail_masuk);
mysqli_free_result($result_detail_keluar);
mysqli_close($conn);

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
        <title>Detail Barang</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        
        <?php require 'templates/topnavigation.php'; ?>

        <div id="layoutSidenav">
            
            <?php require 'templates/sidenavigation.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="my-4">Detail Barang</h1>
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <div class="row my-2">
                                    <p class="col col-md-3 fw-bold m-0">Nama Barang</p>
                                    <p class="col col-md-9 m-0">: <?php echo $data_detail['namabarang'] ?></p>
                                </div>
                                <div class="row my-2">
                                    <p class="col col-md-3 fw-bold m-0">Stok</p>
                                    <p class="col col-md-9 m-0">: <?php echo $data_detail['stock'] ?></p>
                                </div>
                                <div class="row my-2">
                                    <p class="col col-md-3 fw-bold m-0">Deskripsi</p>
                                    <p class="col col-md-9 m-0">: <?php echo $data_detail['deskripsi'] ?></p>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal dan Waktu</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                            <th>Penerima</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach($data_detail_masuk as $item_masuk): ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $item_masuk['tanggal']; ?></td>
                                                <td><?php echo $item_masuk['namabarang']; ?></td>
                                                <td><?php echo $item_masuk['qty']; ?></td>
                                                <td>Barang masuk</td>
                                                <td><?php echo $item_masuk['penerima']; ?></td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach ?>
                                        <?php foreach($data_detail_keluar as $item_keluar): ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $item_keluar['tanggal']; ?></td>
                                                <td><?php echo $item_keluar['namabarang']; ?></td>
                                                <td><?php echo $item_keluar['qty']; ?></td>
                                                <td>Barang keluar</td>
                                                <td><?php echo $item_keluar['penerima']; ?></td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
                <?php require 'templates/footer.php'; ?>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
