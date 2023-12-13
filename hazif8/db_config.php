<?php
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'egyetem');
define('DB_HOST', 'localhost');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
