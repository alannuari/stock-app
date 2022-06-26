<?php

require 'config/db_connect.php';

$sql = "SELECT * FROM keluar, stock WHERE keluar.idbarang = stock.idbarang";

$result = mysqli_query($conn, $sql);

$data_barang_keluar = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>