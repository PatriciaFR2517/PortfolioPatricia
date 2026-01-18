<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "bbdd_all_Music";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST['bajaDVD'])) {
    $ID_DVD_a_eliminar = $_POST['ID_DVD'];

    $sqlCheck = "SELECT * FROM tb_all_dvds WHERE ID_DVD = '$ID_DVD_a_eliminar'";
    $resultCheck = $conn->query($sqlCheck);

    if ($resultCheck->num_rows > 0) {
        $sqlDelete = "DELETE FROM tb_all_dvds WHERE ID_DVD = '$ID_DVD_a_eliminar'";

        if ($conn->query($sqlDelete) === TRUE) {
            header("Location: Tabla.php");
        } else {
            echo "Error al eliminar el registro: " . $conn->error;
        }
    } else {
        echo "El ID proporcionado no existe en la base de datos";
    }
}

$conn->close();
?>
