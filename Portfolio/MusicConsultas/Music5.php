<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "bbdd_all_Music";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM tb_all_dvds LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $ID_DVD = $row['ID_DVD'];
    $NombreCliente = "Cliente Nuevo";
    $DatosCliente = "cliente@email.com"; 
    $PrecioVenta = $row['PrecioDVD']; 

    $insert_query = "INSERT INTO tb_all_Ventas (ID_DVD, NombreCliente, DatosCliente, PrecioVenta)
                     VALUES ('$ID_DVD', '$NombreCliente', '$DatosCliente', '$PrecioVenta')";

    if ($conn->query($insert_query) === TRUE) {
        echo "Venta creada correctamente.";
    } else {
        echo "Error al crear la venta: " . $conn->error;
    }
} else {
    echo "No se encontraron registros en la tabla tb_all_dvds.";
}

$conn->close();
?>
