<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "bbdd_all_Music";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST['modificarDVD'])) {
    $ID_DVD = $_POST['ID_DVD'];
    $nuevoNombre = $_POST['nuevoNombre'];
    $nuevoArtista = $_POST['nuevoArtista'];
    $nuevoEstilo = $_POST['nuevoEstilo'];
    $nuevoAnio = $_POST['nuevoAnio'];
    $nuevoNumCanciones = $_POST['nuevoNumCanciones'];
    $nuevoTitulosCanciones = $_POST['nuevoTitulosCanciones'];
    $nuevaCantidad = $_POST['nuevaCantidad'];
    $nuevoPrecio = $_POST['nuevoPrecio'];
    $nuevoDescuento = $_POST['nuevoDescuento'];
    $nuevoIVA = $_POST['nuevoIVA'];

    $sqlUpdate = "UPDATE tb_all_dvds SET NombreDVD = '$nuevoNombre', ArtistaDVD = '$nuevoArtista', EstiloMusicalDVD = '$nuevoEstilo', AnioDVD = '$nuevoAnio', NumeroCancionesDVD = '$nuevoNumCanciones', TitulosCancionesDVD = '$nuevoTitulosCanciones', CantidadDVD = '$nuevaCantidad', PrecioDVD = '$nuevoPrecio', DescuentoDVD = '$nuevoDescuento', IVADVD = '$nuevoIVA' WHERE ID_DVD = '$ID_DVD'";

    if ($conn->query($sqlUpdate) === TRUE) {
        header("Location: Tabla.php");
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}
$conn->close();
?>
