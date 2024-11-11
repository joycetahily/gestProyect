<?php

if(!empty($_POST["publicar"])) {
    if(empty($_POST["descripcion"])){
        echo '<div class= "alerta">Escribe una pregunta</div>';
    }else {
        $descripcion=$_POST["descripcion"];
        $sql= $conexion->query("insert into preguntarobjeto (id_pregunta, contenido, fecha_creacion) values('','$descripcion','')");
        if($sql==1){
            echo '<div class= "success">Su pregunta ha sido enviada a revisión de los administradores</div>';
            header("Location: ../inicioPublicaciones.php");
        }else{
            echo '<div class= "alerta">Error de solicitud</div>';
        }
    }
}
    
?>