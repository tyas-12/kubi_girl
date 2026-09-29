<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
include '../config/database.php';

$id = $_GET['id'];
$q = "SELECT * FROM produk WHERE id_produk = $id";
$r = mysqli_query($koneksi, $q);
$produk = mysqli_fetch_assoc($r);
?>

<h1>Edit Stok</h1>
<p><?php echo $produk['nama']; ?></p>
<p>Stok saat ini: <?php echo $produk['stok']; ?></p>

<form method="POST" action="update_stok.php">
    <input type="hidden" name="id_produk" value="<?php echo $produk['id_produk']; ?>">

    <label>Jumlah Stok Baru:</label><br>
    <input type="number" name="stok" value="<?php echo $produk['stok']; ?>" required><br><br>

    <button type="submit">Simpan</button>
</form>
<a href="stok.php">← Batal</a>