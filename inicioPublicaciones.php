<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuentraTec</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #fff;
        }

        /* Encabezado */
        .header {
            width: 100%;
            background-color: #1E2A6E;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            box-sizing: border-box;
        }

        .header-logo {
            font-size: 24px;
            font-weight: bold;
        }

        /* Contenedor de iconos */
        .header-icons {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .header-icon {
            width: 40px;
            height: 40px;
            background-color: #ccc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #000;
            cursor: pointer;
        }

        .profile-icon {
            background-color: #ff7f00;
            color: #fff;
            font-weight: bold;
            border: 2px solid #000;
        }

        /* Publicaciones */
        .post-container {
            display: flex;
            background-color: #1E2A6E;
            width: 90%;
            max-width: 650px;
            height: 300px;
            margin: 15px 0;
            padding: 15px;
            border-radius: 10px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            box-sizing: border-box;
        }

        .post-info {
            display:flex;
            flex-direction: column;
            align-items: left;
            justify-content: space-between;
            gap: 10px;
            margin-right: 180px;
        }


        .post-image {
            width: 170px;
            height: 200px;
            border-radius: 8px;
            margin-right: 15px;
            flex-shrink: 0;
            overflow: hidden;
        }

        .post-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
            
        }
        .info-publi {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        

        .info-publi span, .info-pregunta span, .descripción span {
            background-color: #ccc;
            padding: 8px 10px;
            border-radius: 5px;
            font-size: 16px;
            color: #000;
            text-align: center;
            width: fit-content;
            max-width: 100%;
            box-sizing: border-box;
        }

        .info-pregunta span {
            height: 60px;
        }

        .descripción {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .fecha-encuentro {
            display: flex;
            flex-direction: column;
            gap: 50px;
            background-color: #464545;
            padding: 4px 8px;
            border-radius: 5px;
            font-size: 14px;
            color: #000;
            width: fit-content;
            box-sizing: border-box;
            height: ;
            max-width: 100%;
            
        }


        .add-options {
            position: fixed;
            bottom: 120px;
            right: 30px;
            display: none;
            flex-direction: column;
            gap: 10px;
        }

        .add-option {
            background-color: #1E2A6E;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            font-size: 14px;
            color: #fff;
            width: 80px;
            text-decoration: none;
        }

        .add-option:hover {
            background-color: #3A4A8E;
        }

        /* Botón agregar */
        .add-button {
            position: fixed;
            bottom: 60px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: #1E2A6E;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #fff;
            cursor: pointer;
        }

        /* Footer */
        .footer {
            margin-top: 10px;
            width: 100%;
            background-color: #001f54;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            font-size: 14px;
        }


        /* Media Queries para ajustar en dispositivos pequeños */
        @media (max-width: 768px) {
            .post-container {
                flex-direction: column;
                align-items: center;
                width: 90%;
            }

            .post-image {
                width: 60px;
                height: 60px;
                margin-bottom: 10px;
            }

            .header, .footer {
                padding: 10px;
            }

            .add-button {
                bottom: 20px;
                right: 20px;
            }
        }
    </style>
</head>
<body> 

    <!-- Encabezado -->
    <header class="header">
        <div class="header-logo">EncuentraTec</div>
        <div class="header-icon" id="logout-icon">
            <img src="ImagenesPW/icons8-cerrar-sesión-24.png" alt="cerrar-sesion">
        </div>
    </header>
    <?php
    include("C:/xampp/htdocs/EncuentraTec/controlador/controlador_publicaciones.php");
    include("C:/xampp/htdocs/EncuentraTec/modelo/conexion_BD.php");
    ?>
    <!-- Publicaciones -->
     

    <div class="add-options" id="addOptions">
        <button class="add-option" onclick="window.location.href='publicarObjeto.php'">Publicar</button>
    </div>

    <!-- Botón de agregar -->
    <div class="add-button" onclick="toggleOptions()">+</div>

    <script>
        function toggleOptions() {
            const options = document.getElementById('addOptions');
            options.style.display = options.style.display === 'flex' ? 'none' : 'flex';
        }
        document.getElementById('logout-icon').addEventListener('click', function() {
            window.location.href = 'index.php';
        });
    </script>

    <!-- Footer -->
    <footer class="footer">
        Instituto Tecnológico de Veracruz
    </footer>

    </body>
    </html>