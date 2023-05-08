<?php

include("database/db.php");

?>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (strlen($_POST['name']) >= 1 && strlen($_POST['username']) >= 1 && strlen($_POST['password']) >= 1) {
        $name = $conexion->real_escape_string($_POST['name']);
        $username = $conexion->real_escape_string($_POST['username']);
        $password = ($_POST['password']);
        $password_hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
        $insertar = "INSERT INTO `usuario` (`Id`, `Name`, `Username`, `Password`, `Photo`, `Rol`) VALUES (NULL, '$name', '$username', '$password_hash', 0x00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, '3')";
        $guardar = mysqli_query($conexion, $insertar);
        if ($guardar) {
            header('location: layouts/Con_Registro.html');
        } else {
            echo "<h3>¡Ups ha ocurrido un error!</h3>";
        }
    } else {
        $mensaje.= "<h3>Por favor complete los campos!</h3>";

    }
}
?>