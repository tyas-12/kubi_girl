<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
include '../config/database.php';

$query = "SELECT * FROM produk";
$hasil = mysqli_query($koneksi, $query);
?>

<h1>Kelola Produk</h1>
<a href="dashboard.php">← Kembali ke Dashboard</a><br><br>
<a href="tambah_produk.php">+ Tambah Produk Baru</a><br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>Nama</th>
        <th>Harga</th>
        <th>Kategori</th>
        <th>Stok</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
    <tr>
        <td><?php echo $row['nama']; ?></td>
        <td>Rp<?php echo number_format($row['harga']); ?></td>
        <td><?php echo $row['kategori']; ?></td>
        <td><?php echo $row['stok']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td>
            <a href="edit_produk.php?id=<?php echo $row['id_produk']; ?>">Edit</a> |
            <a href="hapus_produk.php?id=<?php echo $row['id_produk']; ?>" onclick="return confirm('Yakin hapus produk ini?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>