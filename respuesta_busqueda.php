<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadatos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título -->
    <title>Búsqueda de artículos</title>

    <!-- CSS -->
    <link href="style_res.css" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./images/icono.png">

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="title">Búsqueda de articulo</div>
        <div class="content">
            <?php
                // Recuperación de las variables del formulario
                $id = $_POST["id"];
                $nombre = $_POST["nombre"];
                $tipo = $_POST["tipo"];
                $precio = $_POST["precio"];
                $stock = $_POST["stock"];
                $compPrecio = $_POST["comp-precio"];
                $compStock = $_POST["comp-stock"];
                
                // Creación de instancia para la conexión con la base de datos
                require("./conexion_db.php");
                $db = new ConexionDB();

                $conditions = [];
                if ($id != "") {
                    $conditions[] = "ID_Producto = '$id'";
                }
                if ($nombre != "") {
                    $conditions[] = "Nombre_Producto LIKE '%$nombre%'";
                }
                if ($tipo != "") {
                    $conditions[] = "Tipo_Producto LIKE '%$tipo%'";
                }
                if ($precio != "") {
                    switch ($compPrecio){
                        case 1:
                            $conditions[] = "Precio < '$precio'";
                            break;
                        case 2:
                            $conditions[] = "Precio <= '$precio'";
                            break;
                        case 3:
                            $conditions[] = "Precio > '$precio'";
                            break;
                        case 4:
                            $conditions[] = "Precio >= '$precio'";
                            break;
                        case 5:
                            $conditions[] = "Precio != '$precio'";
                            break;
                        default:
                            $conditions[] = "Precio = '$precio'";
                            break;
                    }
                }
                if ($stock != "") {
                    switch ($compStock){
                        case 1:
                            $conditions[] = "Stock < '$stock'";
                            break;
                        case 2:
                            $conditions[] = "Stock <= '$stock'";
                            break;
                        case 3:
                            $conditions[] = "Stock > '$stock'";
                            break;
                        case 4:
                            $conditions[] = "Stock >= '$stock'";
                            break;
                        case 5:
                            $conditions[] = "Stock != '$stock'";
                            break;
                        default:
                            $conditions[] = "Stock = '$stock'";
                            break;
                    }
                }
                
                if(empty($conditions)){
                    echo "La consulta está vacía";
                }else{
                    $consulta = "SELECT * FROM productos WHERE " . implode(" AND ", $conditions);
                    $db -> buscar_registro($consulta);
                }
                
            ?>
            <div class="btn">
                <a href="./registro/">Agregar registro</a>
                <a href="./eliminacion/">Eliminar registro</a>
                <a href="./">Menú principal</a>
            </div>
        </div>
    </div>
    
</body>
</html>