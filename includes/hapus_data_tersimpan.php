<?php
setcookie('kubi_nama', '', time() - 3600, "/");
setcookie('kubi_telepon', '', time() - 3600, "/");
header('Location: profile.php');
exit;
?>