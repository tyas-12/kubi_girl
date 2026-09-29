<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
include '../config/database.php';

$id = $_GET['id'];
$q = "DELETE FROM produk WHERE id_produk = $id";
mysqli_query($koneksi, $q);

header('Location: produk.php');
exit;
?>