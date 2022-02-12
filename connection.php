<?php

//connection info should be moved to .env in a production environment to protect database security.
$servername = "localhost";
$username = "root";
$password = "toor";
$db = "sweetwater";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else
    echo "<h1>Howdy</h1>"

?>
