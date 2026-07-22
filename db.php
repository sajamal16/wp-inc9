<?php
$host = "localhost";
$user = "sjamal6";   // Replace with your GSU username
$pass = "sjamal6"; // Replace with your MySQL password
$db   = "sjamal6";                // Keep this if your database is named myDB

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("DB Error: " . $conn->connect_error);
}

// $conn is now available in any file that requires this
?>