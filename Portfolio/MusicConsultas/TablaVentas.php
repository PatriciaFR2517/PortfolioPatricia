<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabla de Ventas</title>
    <link rel="stylesheet" type="text/css" href="Music.css">
</head>
<body>
<nav>
        <ul>
            <li>
                <a href="#">Registros</a>
                <ul class="submenu" id="submenuTabla"> 
                    <li><a href="Music.html">Alta de Registro</a></li>
                    <li><a href="Music2.html">Baja de Registro</a></li>
                    <li><a href="Music3.html">Modificación de Registro</a></li>
                    <li><a href="Consultas.html">Consultas</a></li>
                </ul>
            </li>     
            <li><a href="Music4.html">Transacción de consulta</a></li>
            <li><a href="Music5.html">Venta Automática</a></li>
            <li>
                <a href="#">Tablas</a>
                <ul class="submenu" id="submenuTabla"> 
                    <li><a href="Tabla.php">Tabla DVDs</a></li>
                    <li><a href="TablaVentas.php">Tabla Ventas</a></li>
                </ul>
            </li>  
            <li id="botonCambioTema">
                <button id="cambiarTema">Cambiar Tema</button>
            </li>          
        </ul>
    </nav>
    <h1>Tabla de Ventas</h1>
    <table>
        <tr>
            <th>ID Ventas</th>
            <th>ID DVD</th>
            <th>Nombre Cliente</th>
            <th>Datos Cliente</th>
            <th>Precio Venta</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "bbdd_all_Music";
        $table = "tb_all_Ventas"; 

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM tb_all_Ventas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["ID_Ventas"] . "</td><td>" . $row["ID_DVD"] . "</td><td>" . $row["NombreCliente"] . "</td><td>" . $row["DatosCliente"] . "</td><td>" . $row["PrecioVenta"] . "</td></tr>";
            }
        } else {
            echo "0 resultados";
        }
        $conn->close();
        ?>
    </table>

    <footer>
        <div class="footer-content">
            <p>© 2023 Alejandro Luna Lillo y Daniel Barrios Delgado</p>
        </div>
    </footer>
    <script src="Music3.js"></script>
    <script src="Music2.js"></script>
    <script src="Music.js"></script>
</body>
</html>
