<?php

require 'config/db_connect.php';

$idbarang = $_POST['idbarang'];
$idmasuk = $_POST['idmasuk'];
$qty = $_POST['qty'];
$penerima = $_POST['penerima'];

$sql_stok_barang = "SELECT stock FROM stock WHERE idbarang='$idbarang'";
$result_data_stok = mysqli_query($conn, $sql_stok_barang);
$data_stok_sekarang = mysqli_fetch_array($result_data_stok);
$stok_sekarang = $data_stok_sekarang['stock'];

$sql_barang_masuk = "SELECT qty FROM masuk WHERE idmasuk='$idmasuk'";
$result_data_masuk = mysqli_query($conn, $sql_barang_masuk);
$data_masuk_sekarang = mysqli_fetch_array($result_data_masuk);
$masuk_sekarang = $data_masuk_sekarang['qty'];

$stok_sebelum_update = $stok_sekarang - $masuk_sekarang;

if ($stok_sebelum_update >= 0) {
    $update_stok = $stok_sebelum_update + $qty;
    $sql_perubahan_stok = "UPDATE stock SET stock='$update_stok' WHERE idbarang='$idbarang'";
    $perubahan_stok = mysqli_query($conn, $sql_perubahan_stok);

    $sql_edit_masuk = "UPDATE masuk SET qty='$qty', penerima='$penerima' WHERE idmasuk='$idmasuk'";
    $edit_masuk = mysqli_query($conn, $sql_edit_masuk);

    mysqli_free_result($result_data_stok);
    mysqli_free_result($result_data_masuk);
    mysqli_close($conn);

    header('Location: barang_masuk.php');
} else {
    echo "
        <script>
            alert('Maaf data tidak bisa diedit karena akan menyebabkan stok menjadi minus!');
            window.location.href='barang_masuk.php';
        </script>
    ";
}

?>