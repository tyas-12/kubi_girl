<?php
include 'includes/header.php';
?>

<style>
    .profile-header {
        background: linear-gradient(135deg, #7b1fa2, #ab47bc);
        border-radius: 24px;
        padding: 35px 25px;
        color: white;
        text-align: center;
        margin-bottom: 25px;
    }
    .profile-logo { font-size: 50px; margin-bottom: 10px; }
    .profile-header h2 { font-size: 20px; font-weight: 700; }
    .profile-header p { font-size: 13px; opacity: 0.9; margin-top: 4px; }

    .info-row {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 14px 0;
        border-bottom: 1px solid #eee;
    }
    .info-row:last-child { border-bottom: none; }
    .info-icon { font-size: 20px; }
    .info-label { font-size: 12px; color: #999; margin-bottom: 2px; }
    .info-value { font-size: 14px; color: #333; font-weight: 600; }

    .contact-links {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }
    .contact-btn {
        flex: 1;
        background: white;
        border: 1px solid #eee;
        border-radius: 12px;
        padding: 14px 10px;
        text-align: center;
        text-decoration: none;
        color: #333;
        font-size: 13px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
    .contact-btn .icon { font-size: 22px; display: block; margin-bottom: 5px; }
</style>

<div class="profile-header">
    <div class="profile-logo">🍠</div>
    <h2>Es Ubi Ungu Creamy Umi</h2>
    <p>Kuliner khas berbahan dasar ubi ungu</p>
</div>

<?php if (isset($_COOKIE['kubi_nama'])) { ?>
<div class="card">
    <div class="info-row">
        <span class="info-icon">👤</span>
        <div>
            <div class="info-label">Nama Tersimpan</div>
            <div class="info-value"><?php echo htmlspecialchars($_COOKIE['kubi_nama']); ?></div>
        </div>
    </div>
    <div class="info-row">
        <span class="info-icon">📱</span>
        <div>
            <div class="info-label">No. WhatsApp Tersimpan</div>
            <div class="info-value"><?php echo htmlspecialchars($_COOKIE['kubi_telepon']); ?></div>
        </div>
    </div>
    <a href="hapus_data_tersimpan.php" style="color:#e53935; font-size:13px; text-decoration:none;">🗑️ Hapus data tersimpan</a>
</div>
<?php } ?>

<div class="card">
    <div class="info-row">
        <span class="info-icon">📍</span>
        <div>
            <div class="info-label">Lokasi</div>
            <div class="info-value">Jalan Raya Sukahati, Cibinong, Bogor</div>
        </div>
    </div>
    <div class="info-row">
        <span class="info-icon">🕒</span>
        <div>
            <div class="info-label">Jam Operasional</div>
            <div class="info-value">09.00 - 21.30 WIB (Setiap Hari)</div>
        </div>
    </div>
    <div class="info-row">
        <span class="info-icon">💳</span>
        <div>
            <div class="info-label">Metode Pembayaran</div>
            <div class="info-value">Tunai & QRIS</div>
        </div>
    </div>
</div>

<div class="contact-links">
    <a href="#" class="contact-btn">
        <span class="icon">💬</span>WhatsApp
    </a>
    <a href="#" class="contact-btn">
        <span class="icon">🛵</span>GoFood
    </a>
    <a href="#" class="contact-btn">
        <span class="icon">🎵</span>TikTok
    </a>
</div>

<?php include 'includes/footer.php'; ?>