<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

include '../config/database.php';

$q1 = "SELECT COUNT(*) as total FROM pesanan";
$r1 = mysqli_query($koneksi, $q1);
$total_pesanan = mysqli_fetch_assoc($r1)['total'];

$q2 = "SELECT SUM(total_harga) as total FROM pesanan WHERE status = 'dibayar'";
$r2 = mysqli_query($koneksi, $q2);
$total_transaksi = mysqli_fetch_assoc($r2)['total'];
?>

<h1>Halo, <?php echo $_SESSION['admin_nama']; ?>!</h1>
<p>Selamat datang di KUBI</p>

<p>Total Transaksi: Rp<?php echo number_format($total_transaksi ?? 0); ?></p>
<p>Total Pesanan Masuk: <?php echo $total_pesanan; ?></p>

<a href="produk.php">Kelola Produk</a> |
<a href="pesanan.php">Kelola Pesanan</a> |
<a href="stok.php">Kelola Stok</a> |
<a href="transaksi.php">Kelola Transaksi</a> |
<a href="logout.php">Logout</a>