<?php

require 'config/db_connect.php';

$idbarang = $_POST['barang'];
$qty = $_POST['qty'];
$penerima = $_POST['penerima'];

$sql_masuk = "INSERT INTO masuk (idbarang, qty, penerima) values('$idbarang', '$qty', '$penerima')";
$addtotable = mysqli_query($conn, $sql_masuk);

$sql_cek_stok = "SELECT * FROM stock WHERE idbarang='$idbarang'";
$cek_stok = mysqli_query($conn, $sql_cek_stok);
$data_stok = mysqli_fetch_array($cek_stok);

$stok_sekarang = $data_stok['stock'];
$update_stok_sekarang = $stok_sekarang + $qty;

$sql_update_stok = "UPDATE stock SET stock='$update_stok_sekarang' WHERE idbarang='$idbarang'";
$updatestokmasuk = mysqli_query($conn, $sql_update_stok);

mysqli_free_result($cek_stok);
mysqli_close($conn);

header('Location: barang_masuk.php');

?>