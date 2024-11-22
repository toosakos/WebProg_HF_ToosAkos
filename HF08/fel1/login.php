<?php
session_start();
if (isset($_SESSION["loggedin"])&&$_SESSION["loggedin"]) {
    header("location: listazas.php");
}

?>

<head><title>login</title></head>
<h1>Bejelentkezés</h1>
    <form method="post" action="authenticate.php">
        <label for="username">Felhasználónév:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Jelszó:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Bejelentkezés</button>
    </form>