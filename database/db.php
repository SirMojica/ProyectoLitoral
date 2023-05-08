<?php
<<<<<<< HEAD
$server = "localhost";
$database = "taller";
$user = "root"; 
$password = "";
// Create connection
$conexion =mysqli_connect("localhost", "root","", "taller");
// Check connection
if($conexion->connect_errno) {
    die("conexion fallida" . $conexion->connect_errno);
} else {
    echo "conectado";
}
?>
=======
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
>>>>>>> 3d23c4a2e9be9399f08212c502aad3a557fb7c13
