<?php

if(!empty($_POST["registro"])) {
    $rol = $_POST["rol"];
    $num_control= $_POST["num_control"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];
    
    // Si el rol es alumno, recibir el número de control
    if ($rol === 'alumno') {
        $num_control = $_POST["num_control"];
        if(empty($num_control) || empty($nombre) || empty($correo) || empty($password)) {
            echo '<div class="alerta">Uno de los campos está vacío</div>';
        } else {
            // Consulta para registrar al alumno
            $sql = $conexion->query("INSERT INTO alumno (numero_control, nombre_com, correo_elec, password) VALUES ('$num_control','$nombre','$correo','$password')");
            if($sql == 1) {
                echo '<div class="success">Alumno registrado correctamente</div>';
            } else {
                echo '<div class="alerta">Error al registrar</div>';
            }
        }
    } elseif ($rol === 'administrador') {
        if(empty($nombre) || empty($correo) || empty($password)) {
            echo '<div class="alerta">Uno de los campos está vacío</div>';
        } else {
            // Consulta para registrar al administrador
            $sql = $conexion->query("INSERT INTO administrador (nombreAdmin, correoAdmin, passwordAdmin) VALUES ('$nombre','$correo','$password')");
            if($sql == 1) {
                echo '<div class="success">Administrador registrado correctamente</div>';
            } else {
                echo '<div class="alerta">Error al registrar</div>';
            }
        }
    }
}
?>
