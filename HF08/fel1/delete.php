<head><title>database delete</title></head>
<?php

include "Database.php";

session_start();
if (!$_SESSION["loggedin"]) {
    header("location: login.php");
}
$db = new Database();

// Check connection
$conn = $db->connect();


$sql = "DELETE FROM hallgatok WHERE id=" . $_GET['id'];
if($conn->query($sql) === TRUE) {
    header("Location: listazas.php");
} else {
    echo "Error deleting row: " . $conn->error."<br>";
}