<?php
$response = "";
if (isset($_POST['submit'])) {
    if ($_POST['num'] == $_COOKIE["answer"]) {
        $response = "Kitalátad!";
        echo "<a href='randnumcookie.php'>Mégegyszer?</a>";
    } elseif ($_COOKIE["answer"] >= $_POST['num']) {
        $response = "A szám nagyobb!";
    } elseif ($_COOKIE["answer"] <= $_POST['num']) {
        $response = "A szám kisebb!";
    } else {
        echo "error wtf";
    }
}


?>
<head><title>1. Feladat</title></head>
<form method="post">
    <a href='randnumcookie.php'>Kezdés</a> <br>
    Gondoltam egy számra! <br>
    Tipped: <input type="number" name="num"><br>
    <input type="submit" name="submit">
    <?php echo "$response"?>
</form>

