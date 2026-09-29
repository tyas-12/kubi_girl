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

<h1>Kelola Stok</h1>
<a href="dashboard.php">← Kembali ke Dashboard</a><br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>Nama Produk</th>
        <th>Stok Saat Ini</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
    <tr>
        <td><?php echo $row['nama']; ?></td>
        <td><?php echo $row['stok']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td><a href="edit_stok.php?id=<?php echo $row['id_produk']; ?>">Edit Stok</a></td>
    </tr>
    <?php } ?>
</table>