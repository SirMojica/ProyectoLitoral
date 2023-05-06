<?php 
session_start();

if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(($_POST["usuario"] === "admin" || $_POST["usuario"] === "md@gmail.com") && $_POST["contraseña"]==="secreta"){
        $_SESSION["usuario"] =$_POST["usuario"];

        header("Location: inicio.php");
        exit;
    } else{
        $mensaje ="Nombre de usuario y contraseña incorrectos. ";
    }
}
?>

<html>
<body>
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles\index.css">
    <title>Login</title>
</head>
</head>
<form method="post">
    <label for="usuario">Usuario: </label>
    <input type="text" name="usuario">
   
    <label for="contraseña">Contraseña: </label>
    <input type="password" name="contraseña">
    <br><br>
    <input type="submit" value="Iniciar Sesion">
</form>    

<?php
if(isset($mensaje)){
    echo  "<h3>" .$mensaje . "<h3>";
}


?>

</body>
</html>