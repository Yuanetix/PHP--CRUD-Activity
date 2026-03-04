<?php
$servername = "127.0.0.1"; // better than localhost
$username = "root";
$password = "";
$dbname = "php_music_app";
$port = 3308; 
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>