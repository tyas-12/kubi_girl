<?php
session_start();
include 'config/database.php';

$id_pesanan = $_SESSION['id_pesanan'];
$metode = $_POST['metode_pembayaran'];

// Ambil total pesanan
$q = "SELECT * FROM pesanan WHERE id_pesanan = $id_pesanan";
$r = mysqli_query($koneksi, $q);
$pesanan = mysqli_fetch_assoc($r);

// Simpan data pembayaran
$q2 = "INSERT INTO pembayaran (id_pesanan, metode_pembayaran, status_pembayaran, jumlah_bayar) VALUES ($id_pesanan, '$metode', 'lunas', {$pesanan['total_harga']})";
mysqli_query($koneksi, $q2);

// Update status pesanan
$q3 = "UPDATE pesanan SET status = 'dibayar' WHERE id_pesanan = $id_pesanan";
mysqli_query($koneksi, $q3);

header('Location: pesanan_berhasil.php');
exit;
?>