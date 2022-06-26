<?php

require 'config/db_connect.php';

$idbarang = $_POST['idbarang'];
$idkeluar = $_POST['idkeluar'];
$qty = $_POST['qty'];
$penerima = $_POST['penerima'];

$sql_stok_barang = "SELECT stock FROM stock WHERE idbarang='$idbarang'";
$result_data_stok = mysqli_query($conn, $sql_stok_barang);
$data_stok_sekarang = mysqli_fetch_array($result_data_stok);
$stok_sekarang = $data_stok_sekarang['stock'];

$sql_barang_keluar = "SELECT qty FROM keluar WHERE idkeluar='$idkeluar'";
$result_data_keluar = mysqli_query($conn, $sql_barang_keluar);
$data_keluar_sekarang = mysqli_fetch_array($result_data_keluar);
$keluar_sekarang = $data_keluar_sekarang['qty'];

$stok_sebelum_update = $stok_sekarang + $keluar_sekarang;

if ($stok_sebelum_update >= $qty) {
    $update_stok = $stok_sebelum_update - $qty;
    $sql_perubahan_stok = "UPDATE stock SET stock='$update_stok' WHERE idbarang='$idbarang'";
    $perubahan_stok = mysqli_query($conn, $sql_perubahan_stok);

    $sql_edit_keluar = "UPDATE keluar SET qty='$qty', penerima='$penerima' WHERE idkeluar='$idkeluar'";
    $edit_keluar = mysqli_query($conn, $sql_edit_keluar);

    mysqli_free_result($result_data_stok);
    mysqli_free_result($result_data_keluar);
    mysqli_close($conn);

    header('Location: barang_keluar.php');
} else {
    echo "
        <script>
            alert('Stok barang tidak cukup!');
            window.location.href='barang_keluar.php';
        </script>
    ";
}

?>