<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuentraTec</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #333;
        }
        /* Header */
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
            margin-left: 15px;
            font-size: 24px;
        }
        .header img {
            border-radius: 50%;
            margin-right: 15px;
        }

        /* Container */
        .container {
            width: 90%;
            max-width: 600px;
            margin-top: 20px;
        }

        /* Card */
        .card {
            background-color: #1c2752;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }
        .card img {
            width: 60px;
            height: 60px;
            background-color: #cfcfcf;
            border-radius: 4px;
        }
        .card-info {
            margin-left: 15px;
            flex-grow: 1;
        }
        .card-info .type {
            background-color: #1e88e5;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 12px;
            margin-bottom: 5px;
            display: inline-block;
        }
        .card-info .description {
            background-color: #e0e0e0;
            padding: 8px;
            border-radius: 4px;
            color: #333;
        }
        .action-buttons {
            margin-top: 10px;
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .action-buttons button {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            color: white;
        }
        .accept {
            background-color: #e53935;
            margin-left: 0px;
        }
        .reject {
            background-color: #fdd835;
            color: #333;
            margin-left: 10px;
        }

        /* Add Button */
        .add-button {
            background-color: #1c2752;
            color: white;
            font-size: 30px;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
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
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>EncuentraTec</h1>
        <img src="profile-icon.png" alt="User" width="40" height="40">
    </div>

    <!-- Cards Container -->
    <div class="container">
        <!-- Card 1 -->
        <div class="card">
            <img src="image-placeholder.png" alt="Objeto">
            <div class="card-info">
                <div class="type">Tipo de Objeto</div>
                <div class="description">Descripción</div>
            </div>
            <div class="action-buttons">
                <button class="reject">Rechazar</button>
                <button class="accept">Aceptar</button>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="card">
            <img src="image-placeholder.png" alt="Objeto">
            <div class="card-info">
                <div class="type">Tipo de Objeto</div>
                <div class="description">Descripción</div>
            </div>
            <div class="action-buttons">
                <button class="reject">Rechazar</button>
                <button class="accept">Aceptar</button>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="card">
            <img src="image-placeholder.png" alt="Objeto">
            <div class="card-info">
                <div class="type">Tipo de Objeto</div>
                <div class="description">Descripción</div>
            </div>
            <div class="action-buttons">
                <button class="reject">Rechazar</button>
                <button class="accept">Aceptar</button>
            </div>
        </div>
    </div>

    <!-- Add Button -->
    <button class="add-button">+</button>

    <!-- Footer -->
    <div class="footer">
        Instituto Tecnológico de Veracruz
    </div>
</body>
</html>