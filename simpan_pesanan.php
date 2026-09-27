<?php
session_start();
include 'config/database.php';

$nama = $_POST['nama'];
$telepon = $_POST['telepon'];
$metode = $_POST['metode_pengambilan'];

// Simpan data pelanggan
$q1 = "INSERT INTO pelanggan (nama, no_telepon) VALUES ('$nama', '$telepon')";
mysqli_query($koneksi, $q1);
$id_pelanggan = mysqli_insert_id($koneksi);

// Hitung total dari keranjang
$total = 0;
foreach ($_SESSION['keranjang'] as $item) {
    $q = "SELECT * FROM produk WHERE id_produk = " . $item['id_produk'];
    $r = mysqli_query($koneksi, $q);
    $p = mysqli_fetch_assoc($r);
    $total += $p['harga'] * $item['jumlah'];
}

// Simpan data pesanan
$q2 = "INSERT INTO pesanan (id_pelanggan, total_harga, metode_pengambilan, status) VALUES ($id_pelanggan, $total, '$metode', 'diproses')";
mysqli_query($koneksi, $q2);
$id_pesanan = mysqli_insert_id($koneksi);

// Simpan detail pesanan untuk tiap produk di keranjang
foreach ($_SESSION['keranjang'] as $item) {
    $q = "SELECT * FROM produk WHERE id_produk = " . $item['id_produk'];
    $r = mysqli_query($koneksi, $q);
    $p = mysqli_fetch_assoc($r);
    $subtotal = $p['harga'] * $item['jumlah'];

    $q3 = "INSERT INTO detail_pesanan (id_pesanan, id_produk, jumlah, harga, subtotal) VALUES ($id_pesanan, {$item['id_produk']}, {$item['jumlah']}, {$p['harga']}, $subtotal)";
    mysqli_query($koneksi, $q3);
}

// Simpan id pesanan ke session, lalu kosongkan keranjang
$_SESSION['id_pesanan'] = $id_pesanan;
$_SESSION['keranjang'] = [];

header('Location: pembayaran.php');
exit;
?>