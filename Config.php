<?php
$servername = "localhost";
$username = "id22362758_bi210055"; // Use your actual username
$password = "Mat.ayat.96"; // Use your actual password
$dbname = "id22362758_hopeoasis"; // Use your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
