<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
include '../config/database.php';

$query = "SELECT p.*, pl.nama as nama_pelanggan, pl.no_telepon 
          FROM pesanan p 
          JOIN pelanggan pl ON p.id_pelanggan = pl.id_pelanggan 
          ORDER BY p.tanggal_pesan DESC";
$hasil = mysqli_query($koneksi, $query);
?>

<h1>Kelola Pesanan</h1>
<a href="dashboard.php">← Kembali ke Dashboard</a><br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>No. Pesanan</th>
        <th>Pelanggan</th>
        <th>No. WhatsApp</th>
        <th>Total</th>
        <th>Metode</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
    <tr>
        <td>KUBI-<?php echo str_pad($row['id_pesanan'], 3, '0', STR_PAD_LEFT); ?></td>
        <td><?php echo $row['nama_pelanggan']; ?></td>
        <td><?php echo $row['no_telepon']; ?></td>
        <td>Rp<?php echo number_format($row['total_harga']); ?></td>
        <td><?php echo $row['metode_pengambilan']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td>
            <a href="detail_pesanan.php?id=<?php echo $row['id_pesanan']; ?>">Lihat Detail</a><br>
            <form method="POST" action="update_status.php" style="margin-top:5px;">
                <input type="hidden" name="id_pesanan" value="<?php echo $row['id_pesanan']; ?>">
                <select name="status">
                    <option value="diproses" <?php if ($row['status']=='diproses') echo 'selected'; ?>>Diproses</option>
                    <option value="dibayar" <?php if ($row['status']=='dibayar') echo 'selected'; ?>>Dibayar</option>
                    <option value="selesai" <?php if ($row['status']=='selesai') echo 'selected'; ?>>Selesai</option>
                    <option value="dibatalkan" <?php if ($row['status']=='dibatalkan') echo 'selected'; ?>>Dibatalkan</option>
                </select>
                <button type="submit">Update</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>