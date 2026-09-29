<?php
session_start();
include '../config/database.php';

$email = $_POST['email'];
$password = $_POST['password'];

$q = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
$r = mysqli_query($koneksi, $q);

if (mysqli_num_rows($r) > 0) {
    $admin = mysqli_fetch_assoc($r);
    $_SESSION['admin_id'] = $admin['id_admin'];
    $_SESSION['admin_nama'] = $admin['nama'];
    header('Location: dashboard.php');
    exit;
} else {
    echo "Email atau password salah. <a href='login.php'>Coba lagi</a>";
}
?>