<?php
session_start();
include 'config/database.php';

if (!isset($_SESSION['id_pesanan'])) {
    echo "<p>Tidak ada pesanan aktif.</p>";
    echo "<a href='produk.php'>Kembali belanja</a>";
    exit;
}

$id_pesanan = $_SESSION['id_pesanan'];

// Ambil data pesanan
$q = "SELECT * FROM pesanan WHERE id_pesanan = $id_pesanan";
$r = mysqli_query($koneksi, $q);
$pesanan = mysqli_fetch_assoc($r);

// Ambil detail produk yang dipesan
$qd = "SELECT dp.*, p.nama FROM detail_pesanan dp JOIN produk p ON dp.id_produk = p.id_produk WHERE dp.id_pesanan = $id_pesanan";
$rd = mysqli_query($koneksi, $qd);
?>

<h1>Pembayaran</h1>

<h3>Ringkasan Pesanan</h3>
<?php while ($item = mysqli_fetch_assoc($rd)) { ?>
    <p><?php echo $item['nama']; ?> x <?php echo $item['jumlah']; ?> = Rp<?php echo number_format($item['subtotal']); ?></p>
<?php } ?>

<h3>Total: Rp<?php echo number_format($pesanan['total_harga']); ?></h3>

<form method="POST" action="proses_pembayaran.php">
    <label>Metode Pembayaran:</label><br>
    <input type="radio" name="metode_pembayaran" value="QRIS" checked> QRIS<br>
    <input type="radio" name="metode_pembayaran" value="Cash"> Cash<br><br>

    <button type="submit">Bayar Rp<?php echo number_format($pesanan['total_harga']); ?></button>
</form>