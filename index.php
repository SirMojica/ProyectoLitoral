<?php
session_start();

if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(($_POST["username"] === "admin" || $_POST["username"] === "md@gmail.com") && $_POST["password"]==="secreta"){
        $_SESSION["username"] =$_POST["username"];

        header("Location: inicio.php");
        exit;
    } else{
        $mensaje ="Nombre de usuario y contraseña incorrectos. ";
    }
}

if(isset($mensaje)){
    echo  "<h3>" .$mensaje . "<h3>";
}
?>