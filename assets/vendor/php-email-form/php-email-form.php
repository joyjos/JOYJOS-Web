<?PHP
$to = "info@joyjos.eu";
$subject = "JOYJOS";
$from = $_POST['email'];
$message = "Nombre: " . $_POST['name'];
$message .= "\nEmail: " . $from;
$message .= "\n\nMensaje: " . $_POST['message'];
$headers = "From: $e";
$headers .= "\nReply-To: $e";

if (filter_var($from, FILTER_VALIDATE_EMAIL)) {
    $headers = ['From' => ($name?"<$name> ":'').$from,
            'X-Mailer' => 'PHP/' . phpversion()
           ];

    mail($to, $subject, $message."\r\n\r\nfrom: ".$_SERVER['REMOTE_ADDR'], $headers);
    die('OK');
    
} else {
    die('Email inválido');
}

?>
success