<?php
$host = "localhost";
$user = "sjamal6"; 
$pass = "sjamal6"; 
$db   = "sjamal6";                

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("DB Error: " . $conn->connect_error);
}

// $conn is now available in any file that requires this
?>