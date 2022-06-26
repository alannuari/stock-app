<?php

require 'config/db_connect.php';

$idbarang = $_POST['idbarang'];
$idmasuk = $_POST['idmasuk'];
$qty = $_POST['qty'];

$sql_stok_barang = "SELECT stock FROM stock WHERE idbarang='$idbarang'";
$result_data_stok = mysqli_query($conn, $sql_stok_barang);
$data_stok_sekarang = mysqli_fetch_array($result_data_stok);
$stok_sekarang = $data_stok_sekarang['stock'];

$perubahan = $stok_sekarang - $qty;
$sql_perubahan_stok = "UPDATE stock SET stock='$perubahan' WHERE idbarang='$idbarang'";
$perubahan_stok = mysqli_query($conn, $sql_perubahan_stok);

$sql_hapus = "DELETE FROM masuk WHERE idmasuk='$idmasuk'";
$hapus_barang = mysqli_query($conn, $sql_hapus);

mysqli_free_result($result_data_stok);
mysqli_close($conn);

header('Location: barang_masuk.php');

?>