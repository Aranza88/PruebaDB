<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadatos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título -->
    <title>Registro de artículos</title>

    <!-- CSS -->
    <link href="style_res.css" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../images/icono.png">

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="title">Registro de articulo</div>
        <div class="content">
            <?php
                // Recuperación de las variables del formulario
                $nombre = $_POST["nombre"];
                $tipo = $_POST["tipo"];
                $precio = $_POST["precio"];
                $stock = $_POST["stock"];
                
                // Creación de instancia para la conexión con la base de datos
                require("../conexion_db.php");
                $db = new ConexionDB();

                // Adición de registro
                $db -> insertar_registro($nombre, $tipo, $precio, $stock);
            ?>
            <div class="btn">
                <a href="./">Nuevo registro</a>
                <a href="../">Menú principal</a>
            </div>
        </div>
    </div>
    
</body>
</html>