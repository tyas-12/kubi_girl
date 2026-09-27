<?php include 'config/database.php'; ?>
<h1>Daftar Produk KUBI</h1>

<?php
$query = "SELECT * FROM produk";
$hasil = mysqli_query($koneksi, $query);

while ($row = mysqli_fetch_assoc($hasil)) {
    echo "<div style='border:1px solid #ccc; padding:10px; margin-bottom:10px;'>";
    echo "<h3>" . $row['nama'] . "</h3>";
    echo "<p>" . $row['deskripsi'] . "</p>";
    echo "<p>Harga: Rp" . number_format($row['harga']) . "</p>";
    echo "<p>Kategori: " . $row['kategori'] . "</p>";
    echo "<p>Stok: " . $row['stok'] . "</p>";
    echo "</div>";
}
?>