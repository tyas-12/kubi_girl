<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
include '../config/database.php';

$id_pesanan = $_POST['id_pesanan'];
$status = $_POST['status'];

$q = "UPDATE pesanan SET status = '$status' WHERE id_pesanan = $id_pesanan";
mysqli_query($koneksi, $q);

header('Location: pesanan.php');
exit;
?>