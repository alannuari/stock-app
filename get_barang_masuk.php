<?php

require 'config/db_connect.php';

$sql = "SELECT * FROM masuk, stock WHERE masuk.idbarang = stock.idbarang";

$result = mysqli_query($conn, $sql);

$data_barang_masuk = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>