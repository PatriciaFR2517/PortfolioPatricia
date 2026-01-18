<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consulta con WHERE + ORDER BY</title>
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
                    <li><a href="PrimeraC.php">Primer</a></li>
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
    
    <form action="MusicConsultas.php" method="post">
        <label for="consultaTipo">Tipo de Consulta:</label>
        <select id="consultaTipo" name="consultaTipo">
            <option value="where_order">Consultar con WHERE + ORDER BY</option>
        </select><br><br>
    
        <div id="condicionWhere" style="display: none;">
            <label for="campoWhere">Campo para condición WHERE:</label>
            <input type="text" id="campoWhere" name="campoWhere" required><br><br>
        </div>
    
        <div id="ordenOrderBy" style="display: none;">
            <label for="campoOrder">Campo para ORDER BY:</label>
            <select id="campoOrder" name="campoOrder">
                <option value="ID_DVD">ID DVD</option>
                <option value="nombreDVD">Nombre DVD</option>
            </select>
        <br><br>
        </div>

        <input type="submit" value="Consultar">
    </form>

    <?php
    // Código PHP para la consulta "con WHERE + ORDER BY"
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['campoWhere']) && isset($_POST['campoOrder'])) {
            $campoWhere = $_POST['campoWhere'];
            $campoOrder = $_POST['campoOrder'];
            $sql = "SELECT $campoWhere, $campoOrder FROM $table ORDER BY $campoOrder";
            $result = $conn->query($sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    echo "<table>
                            <tr>
                                <th>$campoWhere</th>
                                <th>$campoOrder</th>
                                <!-- Agrega más campos según sea necesario -->
                            </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row[$campoWhere] . "</td>
                                <td>" . $row[$campoOrder] . "</td>
                                <!-- Agrega más campos según sea necesario -->
                            </tr>";
                    }

                    echo "</table>";
                } else {
                    echo "No se encontraron resultados.";
                }
            } else {
                echo "Error en la consulta: " . $conn->error;
            }
        } else {
            echo "Por favor, proporciona un campo para la condición WHERE y un campo para ORDER BY.";
        }
    }
    ?>

    <footer>
        <div class="footer-content">
            <p>© 2023 Alejandro Luna Lillo y Daniel Barrios Delgado</p>
        </div>
    </footer>
    <script src="Music3.js"></script>
    <script src="Music2.js"></script>
</body>
</html>
