<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
include '../config/database.php';

$id = $_POST['id_produk'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];
$stok = $_POST['stok'];
$status = $_POST['status'];

$q = "UPDATE produk SET nama='$nama', deskripsi='$deskripsi', harga=$harga, kategori='$kategori', stok=$stok, status='$status' WHERE id_produk=$id";
mysqli_query($koneksi, $q);

header('Location: produk.php');
exit;
?>