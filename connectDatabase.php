<?php
$host = 'localhost';
$dbname = 'innovation_makers'; 
$username = 'root'; 
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>