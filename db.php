<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "onesignal";

// Connection Name
$db = new mysqli($servername, $username, $password, $database);

// Check Connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

;?>

