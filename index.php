<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Regalo para Ti</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('fondo1.png'); /* Asegúrate de tener una imagen llamada portada.jpg */
            background-size: cover;
            background-position: center;
            text-align: center;
            color: white;
            font-family: Arial, sans-serif;
        }

        .container {
            background: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            font-size: 18px;
            color: white;
            background: red;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn:hover {
            background: darkred;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>200 Razones para amarte y 1 para irme</h1>
        <a href="razones.php" class="btn">Iniciar</a>
    </div>

</body>
</html>
