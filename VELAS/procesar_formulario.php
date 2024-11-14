<?php
// Procesar el formulario solo si el método es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener los datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validar que los campos no estén vacíos
    if (empty($name) || empty($phone) || empty($email) || empty($message)) {
        echo "Por favor, rellena todos los campos.";
    } else {
        // Aquí puedes procesar los datos como enviar un correo o guardar en una base de datos

        // Enviar un correo
        $to = "rebecalleja412@gmail.com";  // Cambia esto por tu correo real
        $subject = "Nuevo mensaje de contacto desde el formulario";
        $body = "Nombre: $name\nTeléfono: $phone\nEmail: $email\nMensaje: $message";
        $headers = "From: $email";

        // Enviar el correo
        if (mail($to, $subject, $body, $headers)) {
            echo "¡Gracias! Tu mensaje ha sido enviado correctamente.";
        } else {
            echo "Hubo un problema al enviar tu mensaje. Intentalo de nuevo.";
        }
    }
} else {
    echo "El formulario no ha sido enviado correctamente.";
}
?>
