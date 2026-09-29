<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
include '../config/database.php';

$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];
$stok = $_POST['stok'];
$status = $_POST['status'];

$q = "INSERT INTO produk (nama, deskripsi, harga, kategori, stok, status) VALUES ('$nama', '$deskripsi', $harga, '$kategori', $stok, '$status')";
mysqli_query($koneksi, $q);

header('Location: produk.php');
exit;
?>