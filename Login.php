<?php

include('database/db.php')

?>

<?php

if($_SERVER["REQUEST_METHOD"] ==="POST"){

    if (strlen($_POST["username"]) >=1 && strlen($_POST["password"]) >= 1){

        //captura los valores ingresados por el usuario
        $username = $conexion->real_escape_string($_POST['username']);
        $password = $conexion->real_escape_string($_POST['password']);

        //sentencia sql para la consulta
        $sql = "SELECT * FROM `usuario` WHERE Username = '$username'";

        //conexion y consulta
        $Resultado = mysqli_query($conexion, $sql);

        //valida si el resultado de la consulta es true
        if (mysqli_num_rows($Resultado) == 1) {
            //Almacena el resultado de la consulta de la database
            $returnDB = mysqli_fetch_array($Resultado);

            //Variable que almacena la comparacion entre las contraseñas
            $validation_password = password_verify($password, $returnDB['password']);

            //valida que el usuario, la contraseña y el rol ingresado concuerde con la base de datos,
            //y dependiendo el rol lo manda a una vista distintaa
            if ($returnDB['username'] == $username && $validation_password == 1  && $returnDB['rol'] == 1){
            header('location: layouts/home_admin.html');
            }
            elseif($returnDB['username'] == $username && $validation_password == 1  && $returnDB['rol'] == 2){
                header('location: layouts/home_actualizador.html');
            }
            elseif($returnDB['username'] == $username && $validation_password == 1  && $returnDB['rol'] == 3){
                header('location: layouts/home_usuario.html');

            }

        } else {
            // Si el usuario y contraseña no son válidos, muestra un mensaje de error
            $returnDB = mysqli_fetch_array($Resultado);
            echo "El usuario y/o la contraseña son incorrectos";
        }
    }

}

?>