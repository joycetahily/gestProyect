<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuentraTec - Inicio de Sesión</title>
    <style>
        /* Estilos previos */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 600px;
            height: 98%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
        }

        .header {
            background-color: #001f54;
            padding: 15px;
            height: 50px;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header img {
            width: 50px;
            height: auto;
        }

        .header h1 {
            font-size: 25px;
            font-weight: bold;
            margin-left: 5px;
        }

        .image-container img {
            width: 100%;
            height: 140pt;
        }

        .icon-container {
            margin-top: -50px;
        }

        .icon-container img {
            width: 120px;
            height: 110px;
            background-color: #001f54;
            border-radius: 50%;
            padding: 20px;
        }

        .welcome-text {
            margin: 15px 0;
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        .selecciona-rol {
            margin: 10px 0;
            font-size: 13px;
            font-weight: bold;
            color: #333;
        }

        .form-group {
            padding: 0 40px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group input[type="password"] {
            padding-right: 40px;
        }

        .btn {
            background-color: #001f54;
            color: #fff;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #003682;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: -7px;
            display: none;
        }

        .register-text {
            margin-top: 15px;
            font-size: 16px;
            color: #666;
        }

        .register-link {
            color: #555;
            font-weight: bold;
            text-decoration: none;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="ImagenesPW/logoItver.png" alt="logoitver">
            <h1>EncuentraTec</h1>
            <img src="ImagenesPW/logoTecnm.png" alt="logotec">
        </div>

        <div class="image-container">
            <img src="ImagenesPW/imagentec.jpg" alt="entradatec">
        </div>

        <div class="icon-container">
            <img src="ImagenesPW/pngwing.com.png" alt="logoPagina">
        </div>

        <div class="welcome-text">Te damos la bienvenida a EncuentraTec</div>

        <div class="selecciona-rol">Selecciona tu Rol</div>

        <!-- Formulario de selección de rol y datos de usuario -->
        <form action="controlador_iniciosesion.php" method="POST">
            <select class="role-text" id="role-select" name="rol" required>
                <option value="" hidden></option>
                <option value="alumno">Alumno</option>
                <option value="administrador">Administrador</option>
            </select>

            <div class="form-group">
                <input type="text" id="user-input" name="username" placeholder="No de Control / Correo" required>
                <input type="password" id="password-input" name="password" placeholder="Contraseña" required>
            </div>

            <button type="submit" class="btn" name="login">Iniciar sesión</button>
        </form>

        <p>¿No tienes una cuenta?
            <button onclick="window.location.href='Registro.php'">Regístrate</button>
        </p>
    </div>

    <script>
        // JavaScript para actualizar el placeholder basado en el rol seleccionado
        document.getElementById('role-select').addEventListener('change', function() {
            const userInput = document.getElementById('user-input');
            userInput.placeholder = this.value === 'administrador' ? 'Correo Electrónico' : 'Número de Control';
            userInput.type = this.value === 'administrador' ? 'email' : 'text';
        });
    </script>
</body>

</html>