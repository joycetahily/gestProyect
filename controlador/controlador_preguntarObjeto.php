<?php

if(!empty($_POST["publicar"])){
    if(empty($_POST["descripcion"])){
        $id_pregunta=$_POST["id_pregunta"];
        $fecha_creacion=$_POST[""];
        $contenido=$_POST["descripcion"];
        $imagenes=$_POST["img"];
        $sql= $conexion->query("insert into preguntarobjeto(id_pregunta, fecha_creacion, numero_control, contenido) values('','','$contenido','$imagenes')");       
        if($datos=$sql->fetch_object()){
            header ("location: inicioPublicaciones.php");
        } else {
            echo "<div class='alert alert-danger'>No se pudo realizar la publicación< /div>";
        }
    }else{
        "<div class='alert alert-danger'>Ingrese algún dato< /div>";
    }
}

?>