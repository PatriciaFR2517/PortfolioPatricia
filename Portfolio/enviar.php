<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $mensaje = $_POST["mensaje"];

    $para = "tucorreo@example.com";
    $asunto = "Nuevo mensaje de $nombre";
    $contenido = "Nombre: $nombre\nCorreo: $correo\nTeléfono: $telefono\nMensaje: $mensaje";
    $headers = "From: tucorreo@example.com";

    // Para enviar el correo
    mail($para, $asunto, $contenido, $headers);

    // Redireccionar a una página de confirmación
    header("Location: confirmacion.html");
    exit;
}
?>