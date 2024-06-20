<?php
    class ConexionDB{
        private string $db_host, $db_name, $db_user, $db_pass;

        public function __construct(string $host = "localhost", string $name = "pruebas", string $user = "root", string $pass = ""){
            $this->db_host = $host;
            $this->db_name = $name;
            $this->db_user = $user;
            $this->db_pass = $pass;
        }

        function insertar_registro(string $nombre, string $tipo, string $precio, string $stock){
            $db_connect = mysqli_connect($this->db_host, $this->db_user, $this->db_pass);

            // mysqli_connect_errno se ejecuta cuando no se logra tener conección con la base de datos
            if(mysqli_connect_errno()){
                echo "Error al conectar a la BDD";
                exit();
            }

            // En este caso la base de datos se especifica una vez que la conexión con el servidor ya esté
            mysqli_select_db($db_connect, $this->db_name) or die ("No se encuentra a la BDD");

            // Para que se acepten caractéres en español
            mysqli_set_charset($db_connect, "utf8");

            // Se hace la consulta
            $consulta = "INSERT INTO productos (Nombre_producto, Tipo_producto, Precio, Stock) VALUES ('$nombre', '$tipo', '$precio', '$stock')";

            // $res es un result set, es decir, una tabla virtual con el resultado de la sentencia
            $res = mysqli_query($db_connect, $consulta);

            if($res == false){
                echo "Error en la consulta";
            }else{
                $id = mysqli_insert_id($db_connect);
                echo "<span>Registro guardado</span>";
                echo"<table class='res_table'><thead><tr>";
                echo"<th>ID_producto</th>";
                echo"<th>Nombre_producto</th>";
                echo"<th>Tipo_producto</th>";
                echo"<th>Precio</th>";
                echo"<th>Stock</th>";
                echo"</tr></thead><tbody><tr>";
                echo"<td data-th='ID_producto'>$id</td>";
                echo"<td data-th='Nombre_producto'>$nombre</td>";
                echo"<td data-th='Tipo_producto'>$tipo</td>";
                echo"<td data-th='Precio'>$precio</td>";
                echo"<td data-th='Stock'>$stock</td>";
                echo"</tr></tbody></table>";
            }

            // Se cierra la conexión con la BDD
            mysqli_close($db_connect);
        }

        function eliminar_registro(string $id){
            $db_connect = mysqli_connect($this->db_host, $this->db_user, $this->db_pass);

            // mysqli_connect_errno se ejecuta cuando no se logra tener conección con la base de datos
            if(mysqli_connect_errno()){
                echo "Error al conectar a la BDD";
                exit();
            }

            // En este caso la base de datos se especifica una vez que la conexión con el servidor ya esté
            mysqli_select_db($db_connect, $this->db_name) or die ("No se encuentra a la BDD");

            // Para que se acepten caractéres en español
            mysqli_set_charset($db_connect, "utf8");

            // Se hace la consulta
            $consulta = "DELETE FROM productos WHERE ID_producto='$id";

            // $res es un result set, es decir, una tabla virtual con el resultado de la sentencia
            $res = mysqli_query($db_connect, $consulta);

            if($res == false){
                echo "Error en la consulta";
            }else{
                if(mysqli_affected_rows($db_connect) == 0){
                    echo "No existe el registro indicado";
                } else{
                    echo "Se han eliminado " . mysqli_affected_rows($db_connect) . " registros";
                }
            }

            // Se cierra la conexión con la BDD
            mysqli_close($db_connect);
        }

        function buscar_registro(string $consulta){
            $db_connect = mysqli_connect($this->db_host, $this->db_user, $this->db_pass);

            // mysqli_connect_errno se ejecuta cuando no se logra tener conección con la base de datos
            if(mysqli_connect_errno()){
                echo "Error al conectar a la BDD";
                exit();
            }

            // En este caso la base de datos se especifica una vez que la conexión con el servidor ya esté
            mysqli_select_db($db_connect, $this->db_name) or die ("No se encuentra a la BDD");

            // Para que se acepten caractéres en español
            mysqli_set_charset($db_connect, "utf8");

            // $res es un result set, es decir, una tabla virtual con el resultado de la sentencia
            $res = mysqli_query($db_connect, $consulta);

            if (mysqli_num_rows($res) > 0){
                echo"<table class='res_table'><thead><tr>";
                echo"<th>ID_producto</th>";
                echo"<th>Nombre_producto</th>";
                echo"<th>Tipo_producto</th>";
                echo"<th>Precio</th>";
                echo"<th>Stock</th>";
                echo"</tr></thead><tbody>";
                while($fila=mysqli_fetch_array($res, MYSQLI_ASSOC)){
                //while($fila=mysqli_fetch_assoc($res)){
                    echo "<tr>";
                    // Con indices asociativos tener cuidado con poner la variable dentro del string, da erROR
                    echo "<td>" . $fila['ID_producto'] . "</td>";
                    echo "<td>" . $fila['Nombre_producto'] . "</td>";
                    echo "<td>" . $fila['Tipo_producto'] . "</td>";
                    echo "<td>" . $fila['Precio'] . "</td>";
                    echo "<td>" . $fila['Stock'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            }else{
                echo "No hay registros con la información especificada";
            }
            

            // Se cierra la conexión con la BDD
            mysqli_close($db_connect);
        }

        function mostrar_todo(){
            $db_connect = mysqli_connect($this->db_host, $this->db_user, $this->db_pass);

            // mysqli_connect_errno se ejecuta cuando no se logra tener conección con la base de datos
            if(mysqli_connect_errno()){
                echo "Error al conectar a la BDD";
                exit();
            }

            // En este caso la base de datos se especifica una vez que la conexión con el servidor ya esté
            mysqli_select_db($db_connect, $this->db_name) or die ("No se encuentra a la BDD");

            // Para que se acepten caractéres en español
            mysqli_set_charset($db_connect, "utf8");

            // Se hace la consulta
            $consulta = "SELECT * FROM productos";

            // $res es un result set, es decir, una tabla virtual con el resultado de la sentencia
            $res = mysqli_query($db_connect, $consulta);

            echo"<table class='res_table'><thead><tr>";
            echo"<th>ID_producto</th>";
            echo"<th>Nombre_producto</th>";
            echo"<th>Tipo_producto</th>";
            echo"<th>Precio</th>";
            echo"<th>Stock</th>";
            echo"</tr></thead><tbody>";
            while($fila=mysqli_fetch_array($res, MYSQLI_ASSOC)){
            //while($fila=mysqli_fetch_assoc($res)){
                echo "<tr>";
                // Con indices asociativos tener cuidado con poner la variable dentro del string, da erROR
                echo "<td>" . $fila['ID_producto'] . "</td>";
                echo "<td>" . $fila['Nombre_producto'] . "</td>";
                echo "<td>" . $fila['Tipo_producto'] . "</td>";
                echo "<td>" . $fila['Precio'] . "</td>";
                echo "<td>" . $fila['Stock'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";

            // Se cierra la conexión con la BDD
            mysqli_close($db_connect);
        }
    }
?>