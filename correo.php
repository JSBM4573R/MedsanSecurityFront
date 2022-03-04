<?php
    //El correo al que se enviara el mensaje
    $destinatario = 'jsbustos43@misena.edu.co';
    $asunto = 'Comentario desde nuestra WEB';

    //Datos para el correo
    $nombre = $_POST['nombreComentario'];
    $comentario = $_POST['comentario'];
    $email = $_POST['emailComentario'];


    $carta = "De: $nombre \n";
    $carta .= "Correo: $email \n";
    $carta .= "Comentario: $comentario";

    //Enviar mensaje
    mail($destinatario, $asunto, $carta);
    echo "<script> alert('Enviado exitosamente') </script>";
    echo "<script> setTimeout(\"location.href='index.php'\",1000) </script>";
?>