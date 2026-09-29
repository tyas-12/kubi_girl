<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
?>

<h1>Tambah Produk Baru</h1>
<form method="POST" action="simpan_produk.php">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi"></textarea><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga" required><br><br>

    <label>Kategori:</label><br>
    <input type="text" name="kategori"><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok" required><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="tersedia">Tersedia</option>
        <option value="habis">Habis</option>
    </select><br><br>

    <button type="submit">Simpan</button>
</form>
<a href="produk.php">← Batal</a>