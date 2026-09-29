<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
include '../config/database.php';

$query = "SELECT pb.*, p.id_pesanan, pl.nama as nama_pelanggan
          FROM pembayaran pb
          JOIN pesanan p ON pb.id_pesanan = p.id_pesanan
          JOIN pelanggan pl ON p.id_pelanggan = pl.id_pelanggan
          ORDER BY pb.tanggal_pembayaran DESC";
$hasil = mysqli_query($koneksi, $query);
?>

<h1>Riwayat Transaksi</h1>
<a href="dashboard.php">← Kembali ke Dashboard</a><br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>No. Pesanan</th>
        <th>Pelanggan</th>
        <th>Metode Bayar</th>
        <th>Jumlah</th>
        <th>Status</th>
        <th>Tanggal</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
    <tr>
        <td>KUBI-<?php echo str_pad($row['id_pesanan'], 3, '0', STR_PAD_LEFT); ?></td>
        <td><?php echo $row['nama_pelanggan']; ?></td>
        <td><?php echo $row['metode_pembayaran']; ?></td>
        <td>Rp<?php echo number_format($row['jumlah_bayar']); ?></td>
        <td><?php echo $row['status_pembayaran']; ?></td>
        <td><?php echo $row['tanggal_pembayaran']; ?></td>
    </tr>
    <?php } ?>
</table>