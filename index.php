<?php
session_start();
include 'config/database.php';
include 'includes/header.php';

$jumlah_keranjang = isset($_SESSION['keranjang']) ? count($_SESSION['keranjang']) : 0;
?>

<style>
    .hero {
        background: linear-gradient(135deg, #7b1fa2, #ab47bc);
        border-radius: 24px;
        padding: 30px 25px 45px;
        color: white;
        position: relative;
        margin-bottom: 0;
    }
    .hero-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }
    .hero-greeting h2 { font-size: 22px; font-weight: 700; margin-bottom: 4px; }
    .hero-greeting p { font-size: 14px; opacity: 0.9; }
    .cart-icon {
        background: rgba(255,255,255,0.2);
        width: 40px; height: 40px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 18px; position: relative; text-decoration: none; color: white;
    }
    .cart-badge {
        position: absolute; top: -4px; right: -4px;
        background: #ff5252; color: white; font-size: 10px;
        width: 18px; height: 18px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center; font-weight: bold;
    }
    .search-floating {
        background: white;
        border-radius: 16px;
        padding: 14px 18px;
        margin: -30px 0 25px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.12);
        position: relative;
        z-index: 5;
    }
    .search-floating input {
        border: none; outline: none; width: 100%; font-size: 14px;
    }
    .promo-banner {
        background: linear-gradient(135deg, #f3e5f5, #f8bbd0);
        border-radius: 20px;
        padding: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        overflow: hidden;
        gap: 15px;
    }
    .promo-text h3 { color: #4a148c; font-size: 19px; font-weight: 800; line-height: 1.3; margin-bottom: 15px; }
    .promo-icons { font-size: 40px; white-space: nowrap; opacity: 0.85; }
</style>

<div class="hero">
    <div class="hero-top">
        <div class="hero-greeting">
            <h2>Hai, KUBI Friends!</h2>
            <p>Mau minum apa hari ini?</p>
        </div>
        <a href="keranjang.php" class="cart-icon">
            🛒
            <?php if ($jumlah_keranjang > 0) { ?>
                <span class="cart-badge"><?php echo $jumlah_keranjang; ?></span>
            <?php } ?>
        </a>
    </div>
</div>

<div class="search-floating">
    <input type="text" placeholder="🔍  Cari produk favoritmu...">
</div>

<div class="promo-banner">
    <div class="promo-text">
        <h3>Manisnya Ubi,<br>Segarnya Hari Ini!</h3>
        <a href="produk.php" class="banner-btn">Lihat Produk</a>
    </div>
    <div class="promo-icons">🥤🥤</div>
</div>

<div class="section-title">
    <h3>⭐ Favorit Kamu</h3>
    <a href="produk.php">Lihat Semua</a>
</div>

<div class="grid">
    <?php
    $query = "SELECT * FROM produk LIMIT 5";
    $hasil = mysqli_query($koneksi, $query);
    while ($row = mysqli_fetch_assoc($hasil)) {
    ?>
    <a href="detail_produk.php?id=<?php echo $row['id_produk']; ?>" class="product-card">
        <div class="product-img">🥤</div>
        <div class="product-info">
            <div class="product-name"><?php echo $row['nama']; ?></div>
            <div class="product-price">Rp<?php echo number_format($row['harga']); ?></div>
        </div>
        <div class="add-btn">+</div>
    </a>
    <?php } ?>
</div>

<?php include 'includes/footer.php'; ?>