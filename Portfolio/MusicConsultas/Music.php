<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "bbdd_all_Music";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST['altaDVD'])) {
    $ID_DVD = $_POST['ID_DVD'];
    $nombreDVD = $_POST['nombreDVD'];
    $artistaDVD = $_POST['artistaDVD'];
    $estiloDVD = $_POST['estiloDVD'];
    $anioDVD = $_POST['anioDVD'];
    $numCancionesDVD = $_POST['numCancionesDVD'];
    $titulosCancionesDVD = $_POST['titulosCancionesDVD'];
    $cantidadDVD = $_POST['cantidadDVD'];
    $precioDVD = $_POST['precioDVD'];
    $descuentoDVD = $_POST['descuentoDVD'];
    $ivaDVD = $_POST['ivaDVD'];

    $sqlInsert = "INSERT INTO tb_all_dvds (ID_DVD, NombreDVD, ArtistaDVD, EstiloMusicalDVD, AnioDVD, NumeroCancionesDVD, TitulosCancionesDVD, CantidadDVD, PrecioDVD, DescuentoDVD, IVADVD) VALUES ('$ID_DVD', '$nombreDVD', '$artistaDVD', '$estiloDVD', '$anioDVD', '$numCancionesDVD', '$titulosCancionesDVD', '$cantidadDVD', '$precioDVD', '$descuentoDVD', '$ivaDVD')";

    if ($conn->query($sqlInsert) === TRUE) {
        header("Location: Tabla.php");
    } else {
        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
    }
}
$conn->close();
?>
