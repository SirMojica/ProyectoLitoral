<?php

include('database/db.php')

?>

<?php

if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if (strlen($_POST["username"]) >=1 && strlen($_POST["password"]) >= 1){
        $username = $conexion->real_escape_string($_POST['username']);
        $password = $conexion->real_escape_string($_POST['password']);
        $validar = "SELECT * FROM `usuario` WHERE Username = '$username' AND Password = '$password'";
        $Resultado = mysqli_query($conexion, $validar);
        if (mysqli_num_rows($Resultado) == 1) {
            // Inicia sesión para el usuario
            session_start();
            $_SESSION['username'] = $username;
            
            // Redirige al usuario a la página principal
            header('Location: inicio.php');
        } else {
            // Si el usuario y contraseña no son válidos, muestra un mensaje de error
            echo "El usuario y/o la contraseña son incorrectos";
        }
        
$conexion -> close();
}
}
?>