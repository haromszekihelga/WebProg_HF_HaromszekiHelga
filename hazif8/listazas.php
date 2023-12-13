<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egyetem";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM hallgatok";
$result = $conn->query($sql);

echo "<a href='bevitel.php'>Új hallgató</a>"
;
if ($result->num_rows > 0) {
    echo "<table border=1>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["id"]."</td>";
        echo "<td>". $row["nev"]."</td>";
        echo "<td>". $row["szak"]."</td>";
        echo "<td>". $row["atlag"]."</td>";
        echo "<td><a href=update.php?id=" . $row["id"] . ">Update</a></td>";
        echo "<td><a href=\"delete.php?id=" . $row["id"] . "\">Delete</a></td>";

        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>