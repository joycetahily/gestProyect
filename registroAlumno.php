<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuentraTec - Registro</title>
    <style>
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            position: relative;
        }

        /* Barra superior */
        .header {
            width: 100%;
            background-color: #2d2e83;
            color: white;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 24px;
            font-weight: bold;
            position: absolute;
            top: 0; 
            left: 0; 
            right: 0;
        }

        .header img {
            height: 40px;
            margin: 0 10px;
        }

        /* Contenedor de la tarjeta de registro */
        .container {
            width: 350px;
            background-color: #e0e0e0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: relative;
            top: 30px;
        }

        .container img {
            width: 60px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        /* Formulario de registro */
        .form-group {
            margin-bottom: 15px;
            position: relative;
        }

        .form-group label {
            display: block;
            text-align: left;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px 40px 10px 10px; /* Ajuste para el ícono */
            border: 1px solid #ccc;
            border-radius: 20px;
            font-size: 16px;
        }

        /* Icono de mostrar contraseña */
        .toggle-password {
            position: absolute;
            top: 38px;
            right: 15px;
            cursor: pointer;
            font-size: 18px;
            color: #555;
        }

        /* Botón de registro */
        .register-button {
            background-color: #2d2e83;
            color: white;
            padding: 10px;
            width: 85%;
            border: none;
            border-radius: 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 8px;
            transition: background-color 0.3s ease;
        }
        
        .register-button:hover {
            background-color: #6e6e70;
        }

        /* Link de inicio de sesión */
        .login-link {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        .login-link a {
            color: #333;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .hidden {
            display: none;
        }

        .alerta{
            text-align: center;
            color: red;
            margin-bottom: 10px;
        }

        .success{
            text-align: center;
            color: rgb(31, 156, 0);
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- Barra superior -->
    <div class="header">
        <img src="/EncuentraTec/ImagenesPW/logoTecnm.png" alt="Logo Izquierda">
        <span>EncuentraTec</span>
        <img src="/EncuentraTec/ImagenesPW/logoItver.png" alt="Logo Derecha">
    </div>

    <!-- Contenedor de registro -->
    <div class="container">
        <h1>Te damos la bienvenida</h1>
        <h1>Registro de Alumnos</h1>
        <?php
        include("C:/xampp/htdocs/EncuentraTec/modelo/conexion_BD.php");
        include("C:/xampp/htdocs/EncuentraTec/Controlador/controlador_registrar.php");
        ?>
        <form action="" method="POST" class="formulario">

            <!-- Campo oculto para el rol -->
            <input type="hidden" name="rol" value="alumno">

            <div class="form-group">
                <label for="numero-control">Número de Control</label>
                <input type="text" id="numero-control" name="num_control" placeholder="Número de Control" maxlength="8" pattern="\d{8}" required>
            </div>
            
            <div class="form-group">
                <label for="nombre-completo">Nombre completo</label>
                <input type="text" id="nombre-completo" name="nombre" placeholder="Nombre Completo" required>
            </div>

            <div class="form-group">
                <label for="correo-electronico">Correo electrónico</label>
                <input type="email" id="correo-electronico" name="correo" placeholder="Correo electrónico" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Crea una contraseña" required>
                <span toggle="#password" class="toggle-password">&#128065;</span>
            </div>

            <input class="register-button" type="submit" value="Registrar" name="registro">
           
        </form>

        <p class="login-link">¿Ya tienes una cuenta? <a href="/EncuentraTec/index.php">Inicia Sesión</a></p>
    </div>

    <script>
        // Funcionalidad para mostrar/ocultar la contraseña
        const togglePassword = document.querySelector('.toggle-password');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Cambia el ícono basado en la visibilidad
            if (type === 'password') {
                togglePassword.innerHTML = '&#128065;'; // Ícono de ojo cerrado
            } else {
                togglePassword.innerHTML = '&#128064;'; // Ícono de ojo abierto
            }
        });

        // Validación del formulario (opcional pero recomendado)
        const form = document.querySelector('.formulario');
        form.addEventListener('submit', function(event) {
            const numControl = document.getElementById('numero-control').value.trim();
            const nombre = document.getElementById('nombre-completo').value.trim();
            const correo = document.getElementById('correo-electronico').value.trim();
            const password = document.getElementById('password').value.trim();
            const alerta = document.querySelector('.alerta');
            const success = document.querySelector('.success');

            // Limpiar mensajes previos
            alerta.textContent = '';
            success.textContent = '';

            let valid = true;
            let mensajes = [];

            // Validar Número de Control
            const numControlPattern = /^\d{8}$/;
            if (!numControlPattern.test(numControl)) {
                mensajes.push("El número de control debe tener exactamente 8 dígitos.");
                valid = false;
            }

            // Validar Nombre
            if (nombre.length < 3) {
                mensajes.push("El nombre completo debe tener al menos 3 caracteres.");
                valid = false;
            }

            // Validar Correo Electrónico
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(correo)) {
                mensajes.push("El correo electrónico es inválido.");
                valid = false;
            }

            // Validar Contraseña
            if (password.length < 8) {
                mensajes.push("La contraseña debe tener al menos 8 caracteres.");
                valid = false;
            }

            if (!valid) {
                event.preventDefault(); // Prevenir el envío del formulario
                alerta.innerHTML = mensajes.join('<br>');
            } else {
                success.textContent = "Registro exitoso.";
            }
        });
    </script>
</body>
</html>
