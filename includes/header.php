<?php $current = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KUBI</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="top-nav">
    <div class="logo">🍠 KUBI</div>
    <div class="nav-links">
        <a href="index.php" class="<?php echo $current=='index.php'?'active':''; ?>">Beranda</a>
        <a href="produk.php" class="<?php echo $current=='produk.php'?'active':''; ?>">Produk</a>
        <a href="keranjang.php" class="<?php echo $current=='keranjang.php'?'active':''; ?>">Keranjang</a>
        <a href="profile.php" class="<?php echo $current=='profile.php'?'active':''; ?>">Profile</a>
    </div>
</nav>

<div class="page">