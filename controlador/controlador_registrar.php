<?php

if(!empty($_POST["registro"])){
    if(empty($_POST["num_control"]) or empty($_POST["nombre"]) or empty($_POST["correo"]) or empty($_POST["password"])){
        echo '<div class= "alerta">Uno de los campos esta vacio</div>';
    }else {
        $num_control=$_POST["num_control"];
        $nombre=$_POST["nombre"];
        $correo=$_POST["correo"];
        $password=$_POST["password"];
        $sql= $conexion->query("insert into alumno(numero_control, nombre_com, correo_elec, password) values('$num_control','$nombre','$correo','$password')");
        if($sql==1){
            echo '<div class= "success">alumno registrado correctamente</div>';
        }else{
            echo '<div class= "alerta">error al registrar</div>';
        }
    }
}

?>