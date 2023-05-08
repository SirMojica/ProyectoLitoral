<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
</head>
<body>
    <main>
        <div class="principal-container">
            <h1>Registrate</h1>
            <form action="Register.php" method="POST">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <label for="password">password</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" value="register">
            </form>
        </div>
    </main>
<?php

include("database/db.php");

?>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (strlen($_POST['name']) >= 1 && strlen($_POST['username']) >= 1 && strlen($_POST['password']) >= 1) {
        $name = $conexion->real_escape_string($_POST['name']);
        $username = $conexion->real_escape_string($_POST['username']);
        $password = $conexion->real_escape_string($_POST['password']);
        //$password_hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
        $insertar = "INSERT INTO `usuario` (`Id`, `Name`, `Username`, `Password`, `Photo`, `Rol`) VALUES (NULL, '$name', '$username', '$password', 0x00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, '3')";
        $guardar = mysqli_query($conexion, $insertar);
        if ($guardar) {
            echo "<h3>¡Te has registrado correctamente! </h3>";
        } else {
            echo "<h3>¡Ups ha ocurrido un error!</h3>";
        }
    } else {
        $mensaje.= "<h3>Por favor complete los campos!</h3>";

    }
}
?>


</body>
</html>
