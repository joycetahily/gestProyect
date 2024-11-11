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
        }

        .form-group label {
            display: block;
            text-align: left;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            font-size: 16px;
        }

        /* Imagen de vista previa */
        .preview-foto {
            margin-top: 15px;
        }

        .preview-foto img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            display: none;
        }

        /* Botón de registro */
        button {
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
        }
        
        button:hover {
            background-color: #6e6e70;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: -7px;
            display: none;
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
        }
        .success{
            text-align: center;
            color: rgb(31, 156, 0);
        }
    </style>
</head>
<body>
    <!-- Barra superior -->
    <div class="header">
        <img src="ImagenesPW/logoTecnm.png" alt="Logo Izquierda">
        <span>EncuentraTec</span>
        <img src="ImagenesPW/logoItver.png" alt="Logo Derecha">
    </div>

    <!-- Contenedor de registro -->
    <div class="container">
        <h1>Te damos la bienvenida</h1>
        <div class="foto-perfil">
            <label for="foto-perfil">Foto de perfil</label>
            <input type="file" id="foto-perfil" accept="image/*">
        </div>

        <!-- Vista previa de la foto -->
        <div class="preview-foto">
            <img id="preview-image" src="" alt="Vista previa de la foto de perfil">
        </div>

        <div class="form-group">
            <label for="role-select">Selecciona tu Rol</label>
            <select id="role-select">
                <option value="alumno">Alumno</option>
                <option value="administrador">Administrador</option>
            </select>
        </div>
        <?php
        include("C:/xampp/htdocs/EncuentraTec/modelo/conexion_BD.php");
        include("C:/xampp/htdocs/EncuentraTec/controlador/controlador_registrar.php");
        ?>
        <form action="" method="POST" class="formulario">
            <div id="control-container" class="form-group">
                <label for="numero-control">Número de Control</label>
                <input type="text" id="numero-control" name="num_control" placeholder="Num Control" maxlength="8">
                <div class="error-message" id="control-error">Ingresa un número de control válido.</div>
            </div>
            
            <div class="form-group">
                <label for="nombre-completo">Nombre completo</label>
                <input type="text" id="nombre-completo" name="nombre" placeholder="Nombre Completo" required>
                <div class="error-message" id="nombre-error">Ingresa un nombre válido (solo letras y espacios).</div>
            </div>

            <div class="form-group">
                <label for="correo-electronico">Correo electrónico</label>
                <input type="email" id="correo-electronico" name="correo"placeholder="Correo electrónico" required>
                <div class="error-message" id="email-error">Ingresa un correo válido (ejemplo@dominio.com).</div>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password"name="password" placeholder="Crea una contraseña" required>
                <div class="error-message" id="password-error">La contraseña debe tener al menos 8 caracteres.</div>
            </div>

            <input class="register-button" type="submit" value="Registrar" name="registro">
            <a href= "index.php">Salir</a>
        </form>

        <p class="login-link">¿Ya tienes una cuenta? <a href="index.php">Inicia Sesión</a></p>
    </div>

    <script>
        const fotoPerfilInput = document.getElementById('foto-perfil');
        const previewImage = document.getElementById('preview-image');
        const roleSelect = document.getElementById('role-select');
        const controlContainer = document.getElementById('control-container');
        const registerButton = document.getElementById('register-button');
        const nombreInput = document.getElementById('nombre-completo');
        const nombreError = document.getElementById('nombre-error');
        const passwordInput = document.getElementById('password');
        const passwordError = document.getElementById('password-error');
        const emailInput = document.getElementById('correo-electronico');
        const emailError = document.getElementById('email-error');
        const controlInput = document.getElementById('numero-control');
        const controlError = document.getElementById('control-error');

        fotoPerfilInput.addEventListener('change', () => {
            const file = fotoPerfilInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                previewImage.style.display = 'none';
            }
        });

        roleSelect.addEventListener('change', () => {
            controlContainer.classList.toggle('hidden', roleSelect.value !== 'alumno');
        });

        //function validarNumeroControl(numero) {
        //    const regex = /^\d{8}$/;
        //    return regex.test(numero);
        //}

       // function validarCorreo(email) {
       //     const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
       //     return regex.test(email);
        //}

        //function validarNombre(nombre) {
          //  const regex = /^[a-zA-Z\s]+$/;
            //return regex.test(nombre);
        //}

        //registerButton.addEventListener('click', (e) => {
          //  e.preventDefault();

            //const nombre = nombreInput.value;
            //const correo = emailInput.value;
            //const password = passwordInput.value;
            //const numeroControl = controlInput.value;

            //if (!validarNombre(nombre)) {
              //  nombreError.style.display = 'block';
                //return;
            //} else {
              //  nombreError.style.display = 'none';
            //}

            if (roleSelect.value === 'alumno' && !validarNumeroControl(numeroControl)) {
               controlError.style.display = 'block';
               return;
            } else {
                controlError.style.display = 'none';
            }

            //if (!validarCorreo(correo)) {
             //   emailError.style.display = 'block';
              //  return;
            //} else {
            //    emailError.style.display = 'none';
            //}

            //if (password.length < 8) {
            //    passwordError.style.display = 'block';
             //   return;
            //} else {
            //    passwordError.style.display = 'none';
            //}

            //alert('Registro exitoso.');
           // window.location.href = 'inicioSesión.html';
        //});
    </script>
</body>
</html>
