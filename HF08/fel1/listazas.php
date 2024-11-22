form_insert.php<head><title>database show</title></head>
<?php
include "Database.php";

session_start();
if (!$_SESSION["loggedin"]) {
    header("location: login.php");
}
$db = new Database();

// Check connection
$conn = $db->connect();

echo "<a href='form_insert.php'>Új hallgató</a><br><br>";
echo "<a href='logout.php'>Kijelentkezés</a><br><br>";

$sql = "SELECT * FROM hallgatok";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='1'>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td> " . $row["id"] . "</td>";
        echo "<td> " . $row["nev"] . "</td>";
        echo "<td> " . $row["szak"] . "</td>";
        echo "<td> " . $row["atlag"] . "</td>";
        echo "<td> <a href=update.php?id=" . $row["id"] . ">Update</a></td>";
        echo "<td> <a href=delete.php?id=" . $row["id"] . ">Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}

$conn->close();