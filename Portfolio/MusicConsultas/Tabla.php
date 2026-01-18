<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabla de DVDs</title>
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
    <h1>Tabla de DVDs</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre DVD</th>
            <th>Artista</th>
            <th>Estilo Musical</th>
            <th>Año</th>
            <th>Número de Canciones</th>
            <th>Títulos de Canciones</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Descuento</th>
            <th>IVA</th>
        </tr>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "bbdd_all_Music";
        $table = "tb_all_dvds";
        
        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM $table"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["ID_DVD"] . "</td>
                        <td>" . $row["NombreDVD"] . "</td>
                        <td>" . $row["ArtistaDVD"] . "</td>
                        <td>" . $row["EstiloMusicalDVD"] . "</td>
                        <td>" . $row["AnioDVD"] . "</td>
                        <td>" . $row["NumeroCancionesDVD"] . "</td>
                        <td>" . $row["TitulosCancionesDVD"] . "</td>
                        <td>" . $row["CantidadDVD"] . "</td>
                        <td>" . $row["PrecioDVD"] . "</td>
                        <td>" . $row["DescuentoDVD"] . "</td>
                        <td>" . $row["IVADVD"] . "</td>
                        <!-- Agrega más celdas para las demás columnas -->
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='11'>0 resultados</td></tr>";
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
