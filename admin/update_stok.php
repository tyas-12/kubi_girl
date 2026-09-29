<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
include '../config/database.php';

$id = $_POST['id_produk'];
$stok = $_POST['stok'];

// Kalau stok jadi 0, otomatis ubah status jadi 'habis'
$status = ($stok <= 0) ? 'habis' : 'tersedia';

$q = "UPDATE produk SET stok = $stok, status = '$status' WHERE id_produk = $id";
mysqli_query($koneksi, $q);

header('Location: stok.php');
exit;
?>