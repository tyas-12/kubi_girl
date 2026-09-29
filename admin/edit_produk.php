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

<h1>Edit Produk</h1>
<form method="POST" action="update_produk.php">
    <input type="hidden" name="id_produk" value="<?php echo $produk['id_produk']; ?>">

    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?php echo $produk['nama']; ?>" required><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi"><?php echo $produk['deskripsi']; ?></textarea><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga" value="<?php echo $produk['harga']; ?>" required><br><br>

    <label>Kategori:</label><br>
    <input type="text" name="kategori" value="<?php echo $produk['kategori']; ?>"><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok" value="<?php echo $produk['stok']; ?>" required><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="tersedia" <?php if ($produk['status'] == 'tersedia') echo 'selected'; ?>>Tersedia</option>
        <option value="habis" <?php if ($produk['status'] == 'habis') echo 'selected'; ?>>Habis</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>
<a href="produk.php">← Batal</a>