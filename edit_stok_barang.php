<?php

require 'config/db_connect.php';

$idbarang = $_POST['idbarang'];
$namabarang = $_POST['namabarang'];
$deskripsi = $_POST['deskripsi'];

$sql_edit = "UPDATE stock SET namabarang='$namabarang', deskripsi='$deskripsi' WHERE idbarang='$idbarang'";
$edit_barang = mysqli_query($conn, $sql_edit);

mysqli_close($conn);

header('Location: home.php');

?>