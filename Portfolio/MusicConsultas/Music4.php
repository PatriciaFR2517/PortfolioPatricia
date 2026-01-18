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

$conn->begin_transaction();

$query1 = "INSERT INTO $table (ID_DVD, NombreCliente, DatosCliente, PrecioVenta) VALUES (4, 'Cliente4', 'cliente4@email.com', 200)";
$query2 = "INSERT INTO $table (ID_DVD, NombreCliente, DatosCliente, PrecioVenta) VALUES (5, 'Cliente5', 'cliente5@email.com', 350)";
$query3 = "DELETE FROM $table WHERE ID_Ventas = 4";
$query4 = "DELETE FROM $table WHERE ID_Ventas = 5";
$query5 = "DELETE FROM $table WHERE PrecioVenta > 400";

$result1 = $conn->query($query1);
if (!$result1) {
    echo "Error en la consulta 1: " . $conn->error;
}

$result2 = $conn->query($query2);
if (!$result2) {
    echo "Error en la consulta 2: " . $conn->error;
}

$result3 = $conn->query($query3);
if (!$result3) {
    echo "Error en la consulta 3: " . $conn->error;
}

$result4 = $conn->query($query4);
if (!$result4) {
    echo "Error en la consulta 4: " . $conn->error;
}

$result5 = $conn->query($query5);
if (!$result5) {
    echo "Error en la consulta 5: " . $conn->error;
}

if ($result1 && $result2 && $result3 && $result4 && $result5) {
    $conn->commit();
    echo "Transacción realizada exitosamente.";
} else {
    $conn->rollback();
    echo "Error en la transacción: " . $conn->error;
}

$conn->close();
?>
