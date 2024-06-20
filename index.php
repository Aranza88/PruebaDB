<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadatos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título -->
    <title>Main</title>

    <!-- CSS -->
    <link href="style.css" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./images/icono.png">

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="title">Página principal</div>
        <div class="content">
            <span class="subtitle">Búsqueda de productos</span>
            <form action="respuesta_busqueda.php" method="post">
                <div class="product-details">
                    <div class="input-box">
                        <span class="details">ID</span>
                        <input type="text" placeholder="Inserte el ID del producto" name="id" id="id">
                    </div>
                    <div class="input-box">
                        <span class="details">Producto</span>
                        <input type="text" placeholder="Inserte el nombre del producto" name="nombre" id="nombre">
                    </div>
                    <div class="input-box">
                        <span class="details">Tipo de producto</span>
                        <input type="text" placeholder="Inserte el tipo del producto" name="tipo" id="tipo">
                    </div>
                    <div class="input-box">
                        <span class="details">Precio</span>
                        <select name="comp-precio" id="comp-precio">
                            <option value="0">==</option>
                            <option value="1"><</option>
                            <option value="2"><=</option>
                            <option value="3">></option>
                            <option value="4">>=</option>
                            <option value="5">!=</option>
                        </select>
                        <input type="text" placeholder="Inserte el precio del producto" name="precio" id="precio">
                    </div>
                    <div class="input-box">
                        <span class="details">Stock</span>
                        <select name="comp-stock" id="comp-stock">
                            <option value="0">==</option>
                            <option value="1"><</option>
                            <option value="2"><=</option>
                            <option value="3">></option>
                            <option value="4">>=</option>
                            <option value="5">!=</option>
                        </select>
                        <input type="text" placeholder="Inserte el stock del producto" name="stock" id="stock">
                    </div>
                </div>
                <div class="btn-search">
                    <input type="submit" name="search" value="Buscar">
                </div>
            </form>
            <div class="btn">
                <a href="./registro/">Agregar producto</a>
                <a href="./eliminacion/">Eliminar producto</a>
            </div>
            <div class="info-products">
                <span class="subtitle">Productos disponibles</span>
                <?php
                    require("./conexion_db.php");
                    $db = new ConexionDB();
                    $db -> mostrar_todo();
                ?>
            </div>
        </div>
    </div>
</body>
</html>