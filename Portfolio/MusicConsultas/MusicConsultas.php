<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultas</title>
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

    <center>
    <button class="BotonParaConsulta" onclick="window.location.href='Consultas.html'">Volver</button>
    </center>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "bbdd_all_music";
$table = "tb_all_dvds";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['consultaTipo'])) {
        $tipoConsulta = $_POST['consultaTipo'];

        switch ($tipoConsulta) {
            case 'todos':
                $sql = "SELECT * FROM $table";
                $result = $conn->query($sql);

                if ($result) {
                    if ($result->num_rows > 0) {
                        echo "<table>
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
                                </tr>";

                        while ($row = $result->fetch_assoc()) {
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
                                </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No se encontraron resultados.";
                    }
                } else {
                    echo "Error en la consulta: " . $conn->error;
                }
                break;
                    case 'where':
                        if (isset($_POST['campoWhere']) && isset($_POST['campoBusqueda'])) {
                            $campoWhere = $_POST['campoWhere'];
                            $campoBusqueda = $_POST['campoBusqueda'];
                            $sql = "SELECT * FROM $table WHERE $campoWhere = '$campoBusqueda'";
                            $result = $conn->query($sql);
                        $result = $conn->query($sql);
                        if ($result) {
                            if ($result->num_rows > 0) {
                                echo "<table>
                                <tr>
                                    <th>$campoWhere</th>
                                </tr>";
                    
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row[$campoWhere] . "</td>
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
                        echo "Por favor, proporciona un campo para la condición WHERE.";
                    }
                    break;
                    case 'order':
                        if (isset($_POST['campoOrder'])) {
                            $campoOrder = $_POST['campoOrder'];
                            $sql = "SELECT * FROM $table WHERE $campoOrder ORDER BY $campoOrder DESC";
                            $result = $conn->query($sql);
                    
                            if ($result) {
                                if ($result->num_rows > 0) {
                                    echo "<table>
                                            <tr>
                                                <th>$campoOrder</th>
                                            </tr>";
                    
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td>" . $row[$campoOrder] . "</td>
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
                            echo "Por favor, selecciona un campo para ORDER BY.";
                        }
                        break;
                        case 'where_order':
                            if (isset($_POST['campoWhere']) && isset($_POST['campoOrder']) && isset($_POST['campoBusqueda'])) {
                                $campoWhere = $_POST['campoWhere'];
                                $campoOrder = $_POST['campoOrder'];
                                $campoBusqueda = $_POST['campoBusqueda'];
                                $sql = "SELECT $campoWhere, $campoOrder FROM $table WHERE $campoOrder = '$campoBusqueda' ORDER BY $campoOrder";
                                $result = $conn->query($sql);
                        
                                if ($result) {
                                    if ($result->num_rows > 0) {
                                        echo "<table>
                                                <tr>
                                                    <th>$campoWhere</th>
                                                    <th>$campoOrder</th>
                                                </tr>";
                        
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>" . $row[$campoWhere] . "</td>
                                                    <td>" . $row[$campoOrder] . "</td>
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
                                echo "Por favor, proporciona un campo para la condición WHERE y un campo para ordenar con ORDER BY.";
                            }
                            break;
                        
                            case 'where_order_limit':
                                if (isset($_POST['campoWhere']) && isset($_POST['campoOrder']) && isset($_POST['valorLimit'])) {
                                    $campoWhere = $_POST['campoWhere'];
                                    $campoOrder = $_POST['campoOrder'];
                                    $valorLimit = $_POST['valorLimit'];
                                    $sql = "SELECT $campoWhere, $campoOrder FROM $table ORDER BY $campoOrder LIMIT $valorLimit";
                                    $result = $conn->query($sql);
                            
                                    if ($result) {
                                        if ($result->num_rows > 0) {
                                            echo "<table>
                                                    <tr>
                                                        <th>$campoWhere</th>
                                                        <th>$campoOrder</th>
                                                    </tr>";
                            
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                        <td>" . $row[$campoWhere] . "</td>
                                                        <td>" . $row[$campoOrder] . "</td>
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
                                    echo "Por favor, proporciona un campo para la condición WHERE, un campo para ordenar con ORDER BY y un valor para LIMIT.";
                                }
                                break;
            default:
                echo "Tipo de consulta no válido";
                break;
        }
    }
}

$conn->close();
?>
    <footer>
        <div class="footer-content">
            <p>© 2023 Alejandro Luna Lillo y Daniel Barrios Delgado</p>
        </div>
    </footer>
    <script src="Music.js"></script>
    <script src="Music3.js"></script>
    <script src="Music2.js"></script>
</body>
</html>
