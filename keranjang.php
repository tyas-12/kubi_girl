<?php
session_start();
include 'config/database.php';

if (isset($_POST['id_produk'])) {
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];

    if (!isset($_SESSION['keranjang'])) {
        $_SESSION['keranjang'] = [];
    }

    $_SESSION['keranjang'][] = [
        'id_produk' => $id_produk,
        'jumlah' => $jumlah
    ];
}
?>

<h1>Keranjang Kamu</h1>

<?php
if (empty($_SESSION['keranjang'])) {
    echo "<p>Keranjang masih kosong.</p>";
} else {
    $total = 0;
    foreach ($_SESSION['keranjang'] as $item) {
        $q = "SELECT * FROM produk WHERE id_produk = " . $item['id_produk'];
        $r = mysqli_query($koneksi, $q);
        $p = mysqli_fetch_assoc($r);
        $subtotal = $p['harga'] * $item['jumlah'];
        $total += $subtotal;

        echo "<p>" . $p['nama'] . " x " . $item['jumlah'] . " = Rp" . number_format($subtotal) . "</p>";
    }
    echo "<h3>Total: Rp" . number_format($total) . "</h3>";
}
?>

<br>
<a href="produk.php">← Kembali Belanja</a>