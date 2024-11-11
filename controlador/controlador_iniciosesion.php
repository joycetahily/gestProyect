<?php

if(!empty($_POST["rol"])){
    if(empty($_POST["alumno"]) or empty($_POST["administrador"])){
        echo '<div class= "alerta">Seleccione un rol</div>';
        if(empty($_POST["rol" == "alumno"])){
            $num_control=$_POST["num_control"];
            $password=$_POST["password"];
            $sql= $conexion->query("select * from alumno num_control, password where num_control ='$num_control' and password = '$password')");     
        }else{
            echo '<div class= "alerta">Usuario no encontrado</div>';
        }
    }else {
        if(empty($_POST["rol" == "administrador"])){
        $correo=$_POST["correo"];
        $password=$_POST["password"];
        $sql= $conexion->query("select * from administrador correo, password where correo ='$correo' and password = '$password')");
        } else{
            echo '<div class= "alerta">Usuario no encontrado</div>';
        }
    }
}

?>
