<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
include '../config/database.php';

$id_pesanan = $_GET['id'];

$q1 = "SELECT p.*, pl.nama as nama_pelanggan, pl.no_telepon 
       FROM pesanan p 
       JOIN pelanggan pl ON p.id_pelanggan = pl.id_pelanggan 
       WHERE p.id_pesanan = $id_pesanan";
$r1 = mysqli_query($koneksi, $q1);
$pesanan = mysqli_fetch_assoc($r1);

$q2 = "SELECT dp.*, pr.nama as nama_produk 
       FROM detail_pesanan dp 
       JOIN produk pr ON dp.id_produk = pr.id_produk 
       WHERE dp.id_pesanan = $id_pesanan";
$r2 = mysqli_query($koneksi, $q2);
?>

<h1>Detail Pesanan KUBI-<?php echo str_pad($pesanan['id_pesanan'], 3, '0', STR_PAD_LEFT); ?></h1>
<a href="pesanan.php">← Kembali ke Daftar Pesanan</a><br><br>

<p><strong>Pelanggan:</strong> <?php echo $pesanan['nama_pelanggan']; ?></p>
<p><strong>No. WhatsApp:</strong> <?php echo $pesanan['no_telepon']; ?></p>
<p><strong>Metode Pengambilan:</strong> <?php echo $pesanan['metode_pengambilan']; ?></p>
<p><strong>Status:</strong> <?php echo $pesanan['status']; ?></p>

<h3>Produk yang Dipesan:</h3>
<table border="1" cellpadding="8">
    <tr>
        <th>Produk</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Subtotal</th>
    </tr>
    <?php while ($item = mysqli_fetch_assoc($r2)) { ?>
    <tr>
        <td><?php echo $item['nama_produk']; ?></td>
        <td><?php echo $item['jumlah']; ?></td>
        <td>Rp<?php echo number_format($item['harga']); ?></td>
        <td>Rp<?php echo number_format($item['subtotal']); ?></td>
    </tr>
    <?php } ?>
</table>

<h3>Total: Rp<?php echo number_format($pesanan['total_harga']); ?></h3>