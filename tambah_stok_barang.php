<?php

require 'config/db_connect.php';

$namabarang = $_POST['namabarang'];
$stok = $_POST['stok'];
$deskripsi = $_POST['deskripsi'];

$sql = "INSERT INTO stock (namabarang, stock, deskripsi) values('$namabarang', '$stok', '$deskripsi')";
$addtotable = mysqli_query($conn, $sql);

mysqli_close($conn);

header('Location: home.php');

?>