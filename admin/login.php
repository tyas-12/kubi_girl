<?php session_start(); ?>
<h1>Login Admin KUBI</h1>
<form method="POST" action="proses_login.php">
    <label>Email:</label><br>
    <input type="text" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Masuk</button>
</form>