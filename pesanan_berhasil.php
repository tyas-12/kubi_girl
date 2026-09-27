<?php
session_start();
include 'config/database.php';

$id_pesanan = $_SESSION['id_pesanan'];
?>

<h1>Pesanan Berhasil!</h1>
<p>Terima kasih sudah membeli di KUBI 💜</p>
<p>Nomor Pesanan: KUBI-<?php echo str_pad($id_pesanan, 3, '0', STR_PAD_LEFT); ?></p>

<a href="produk.php">Kembali ke Home</a>