<head><title>database insert</title></head>
<?php

include "Database.php";

session_start();
if (!$_SESSION["loggedin"]) {
    header("location: login.php");
}
$db = new Database();

// Check connection
$conn = $db->connect();

if(isset($_POST['submit'])) {
    $nev = $_POST['nev'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];

    $sql = "INSERT INTO hallgatok (nev, szak, atlag) VALUES ('$nev', '$szak', '$atlag')";


    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header('Location: listazas.php');
    exit();
}


$conn->close();
?>
<form method="post">
    Add meg a következő hallgatót:<br>
    <label for="nev">Név:   </label>
    <input type="text" id="nev" name="nev"><br>
    <label for="szak">Szak:  </label>
    <input type="text" id="szak" name="szak"><br>
    <label for="atlag">Átlag: </label>
    <input type="text" id="atlag" name="atlag"><br>
    <input type="submit" name="submit" value="Beszúr">
</form>

