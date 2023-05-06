<?php
$servername = "localhost";
$database = "Taller";
$username = "username";
$mail = ""; 
$password = "password";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database, $mail);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn);
?>