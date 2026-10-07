<?php $current = basename($_SERVER['PHP_SELF']); ?>
</div>

<div class="bottom-nav">
    <a href="index.php" class="nav-item <?php echo $current=='index.php'?'active':''; ?>"><span class="nav-icon">🏠</span>Beranda</a>
    <a href="produk.php" class="nav-item <?php echo $current=='produk.php'?'active':''; ?>"><span class="nav-icon">📋</span>Produk</a>
    <a href="keranjang.php" class="nav-item <?php echo $current=='keranjang.php'?'active':''; ?>"><span class="nav-icon">🛒</span>Keranjang</a>
    <a href="profile.php" class="nav-item <?php echo $current=='profile.php'?'active':''; ?>"><span class="nav-icon">👤</span>Profile</a>
</div>

</body>
</html>