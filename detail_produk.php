<?php
session_start();
include 'config/database.php';

$id = $_GET['id'];
$query = "SELECT * FROM produk WHERE id_produk = $id";
$hasil = mysqli_query($koneksi, $query);
$produk = mysqli_fetch_assoc($hasil);
?>

<h1><?php echo $produk['nama']; ?></h1>
<p><?php echo $produk['deskripsi']; ?></p>
<p>Harga: Rp<?php echo number_format($produk['harga']); ?></p>
<p>Kategori: <?php echo $produk['kategori']; ?></p>
<p>Stok: <?php echo $produk['stok']; ?></p>

<form method="POST" action="keranjang.php">
    <input type="hidden" name="id_produk" value="<?php echo $produk['id_produk']; ?>">
    <label>Jumlah: </label>
    <input type="number" name="jumlah" value="1" min="1">
    <button type="submit">Tambah ke Keranjang</button>
</form>

<br>
<a href="produk.php">← Kembali ke Daftar Produk</a>