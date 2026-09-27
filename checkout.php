<?php
session_start();
include 'config/database.php';

if (empty($_SESSION['keranjang'])) {
    echo "<p>Keranjang kosong, silakan pilih produk dulu.</p>";
    echo "<a href='produk.php'>Ke halaman produk</a>";
    exit;
}

$total = 0;
foreach ($_SESSION['keranjang'] as $item) {
    $q = "SELECT * FROM produk WHERE id_produk = " . $item['id_produk'];
    $r = mysqli_query($koneksi, $q);
    $p = mysqli_fetch_assoc($r);
    $total += $p['harga'] * $item['jumlah'];
}
?>

<h1>Checkout</h1>
<p>Total belanja: Rp<?php echo number_format($total); ?></p>

<form method="POST" action="simpan_pesanan.php">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br><br>

    <label>No. WhatsApp:</label><br>
    <input type="text" name="telepon" required><br><br>

    <label>Metode Pengambilan:</label><br>
    <select name="metode_pengambilan">
        <option value="Pick Up">Pick Up</option>
        <option value="Delivery">Delivery</option>
    </select><br><br>

    <button type="submit">Lanjut ke Pembayaran</button>
</form>

<br>
<a href="keranjang.php">← Kembali ke Keranjang</a>