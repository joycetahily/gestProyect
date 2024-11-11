<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuentraTec - Escribe una Pregunta</title>
    <style>
        {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }
        .back-button {
            color: #001f54;
            font-size: 24px;
            text-align: left;
            cursor: pointer;
            margin-bottom: 30px;
        }
        .container {
            width: 100%;
            height: max-content;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 100px;
        }
        .header {
            width: 100%;
            height: 50px;
            background-color: #001f54;
            padding: 10px;
            color: #fff;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
        }
        .header h1 {
            font-size: 24px;
            font-weight: bold;
            font-family: 'Arial', sans-serif;
        }
        .circle-icon, .profile-icon {
            width: 30px;
            height: 30px;
            background-color: #ccc;
            border-radius: 50%;
        }
        .question-container {
            width: 90%;
            background-color: #fff;
            border-radius: 25px;
            margin: auto;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            position: center;
        }
        .question-container input {
            width: 100%;
            height: 150px;
            border: none;
            resize: none;
            font-size: 18px;
            color: #333;
            outline: none;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 8px;
            text-align: center;
        }
        .image-upload {
            margin-top: 35px;
            text-align: center;
        }
        .image-upload input[type="file"] {
            display: none;
        }
        .image-upload label {
            background-color: #001f54;
            color: #fff;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .publish-btn {
            background-color: #001f54;
            color: #fff;
            border: none;
            padding: 12px;
            width: 80%;
            border-radius: 5px;
            font-size: 18px;
            margin: 20px 0;
            cursor: pointer;
            margin-top: 25px;
        }
        .publish-btn:hover {
            background-color: #003682;
        }
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
        /* Estilos de previsualización de imágenes */
        .image-preview-container {
            display: flex;
            flex-wrap: wrap;
            margin-top: 15px;
            gap: 10px;
        }
        .image-preview-wrapper {
            position: relative;
            display: inline-block;
        }
        .image-preview {
            width: 70px;
            height: 70px;
            border-radius: 5px;
            object-fit: cover;
            border: 2px solid #ccc;
        }
        .delete-btn {
            position: absolute;
            top: -5px;
            right: -5px;
            background: red;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="circle-icon"></div>
        <h1>EncuentraTec</h1>
        <div class="profile-icon"></div>
    </div>

    <?php
        include"C:/xampp/htdocs/EncuentraTec/modelo/conexion_BD.php";
        include("C:/xampp/htdocs/EncuentraTec/controlador/controlador_preguntarObjeto.php");
        ?>
    
    <div class="container">
        <div class="back-button">&#8592;</div>
        <form action="" method="POST" class="formulario">
        <!-- Pregunta Section -->
        <div class="question-container">
            <input type="text" id="user-input" name="descripcion" placeholder="Escribe una pregunta" required></input>
        </div>

        <!-- Subir imagen -->
        <div class="image-upload">
            <input type="file" id="file-input" name="img" accept="image/*" multiple>
            <label for="file-input">Subir Imagen</label>
        </div>

        <!-- Contenedor de previsualización de imágenes -->
        <div class="image-preview-container" id="image-preview-container"></div>

        <!-- Botón Publicar -->
        <button class="publish-btn" name="publicar">Publicar</button>
        </form>
    </div>
    

    <!-- Footer -->
    <div class="footer">Instituto Tecnológico de Veracruz</div>

    <script>
        const backButton = document.querySelector('.back-button');
        const publishButton = document.querySelector('.publish-btn');
        const userInput = document.getElementById('user-input');
        const fileInput = document.getElementById('file-input');
        const imagePreviewContainer = document.getElementById('image-preview-container');
        let files = []; // Array para almacenar los archivos

        // Función para mostrar previsualización de imágenes
        fileInput.addEventListener('change', () => {
            Array.from(fileInput.files).forEach(file => {
                // Añadir archivo al array de archivos
                files.push(file);

                if (files.length > 5) {
                alert("Puedes subir un máximo de 5 imágenes.");
                fileInput.value = ''; // Limpiar el campo de archivos si se excede el límite
                return;
            }

                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewWrapper = document.createElement('div');
                    previewWrapper.classList.add('image-preview-wrapper');
                    
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('image-preview');
                    
                    // Botón de eliminar
                    const deleteBtn = document.createElement('button');
                    deleteBtn.textContent = 'x';
                    deleteBtn.classList.add('delete-btn');
                    
                    // Evento de eliminación
                    deleteBtn.addEventListener('click', () => {
                        previewWrapper.remove();
                        files = files.filter(f => f !== file); // Elimina el archivo del array
                    });

                    previewWrapper.appendChild(img);
                    previewWrapper.appendChild(deleteBtn);
                    imagePreviewContainer.appendChild(previewWrapper);
                };
                reader.readAsDataURL(file);
            });
            fileInput.value = ''; // Resetea el input para permitir subir la misma imagen si se elimina
        });

        // Confirmación antes de retroceder
        backButton.addEventListener('click', function(event) {
            const hasContent = userInput.value.trim() !== "" || files.length > 0;
            if (hasContent) {
                const confirmExit = confirm("¿Está seguro que desea salir? Se perderán los datos ingresados.");
                if (!confirmExit) {
                    event.preventDefault();
                    return;
                }
            }
            window.location.href = 'inicioPublicaciones.php';
        });

        // Validación de los campos requeridos antes de publicar
        publishButton.addEventListener('click', (event) => {
            if (!userInput.value) {
                event.preventDefault(); // Previene la redirección si hay campos vacíos
                alert("Por favor, completa todos los campos requeridos.");
            } else {
                window.location.href = 'inicioPublicaciones.php'; // Redirige si todos los campos están completos
            }
        });
    </script>
</body>
</html>
