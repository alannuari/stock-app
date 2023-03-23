<?php

require 'config/db_connect.php';

$idbarang = $_POST['idbarang'];

$sql_hapus_stok = "DELETE FROM stock WHERE idbarang='$idbarang'";
$barang_barang = mysqli_query($conn, $sql_hapus_stok);

$sql_hapus_masuk = "DELETE FROM masuk WHERE idbarang='$idbarang'";
$barang_barang = mysqli_query($conn, $sql_hapus_masuk);

$sql_hapus_keluar = "DELETE FROM keluar WHERE idbarang='$idbarang'";
$barang_barang = mysqli_query($conn, $sql_hapus_keluar);

mysqli_close($conn);

header('Location: home.php');

?>