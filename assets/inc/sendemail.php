<?php

// Define some constants
define( "RECIPIENT_NAME", "Jugolfo Afonso" );
define( "RECIPIENT_EMAIL", "YOUR_MAIL_ADDRESS" );

// Read the form values
$success = false;
$name = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$fname = isset( $_POST['fname'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['fname'] ) : "";
$lname = isset( $_POST['lname'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['lname'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$phone = isset( $_POST['phone'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$services = isset( $_POST['services'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['services'] ) : "";
$date = isset( $_POST['date'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['date'] ) : "";
$time = isset( $_POST['time'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['time'] ) : "";
$subject = isset( $_POST['subject'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['subject'] ) : "";
$website = isset( $_POST['website'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['website'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";


// full name or first name last name;

$name = ( !empty( $name ) ) ? $name : $fname . ' ' . $lname;


$mail_subject = 'Uma solicitação de contato enviada por: ' . $name;

$body = 'Nome: '. $name . "\r\n";
$body .= 'Email: '. $senderEmail . "\r\n";


if ($phone) {$body .= 'Phone: '. $phone . "\r\n"; }
if ($services) {$body .= 'Serviços: '. $services . "\r\n"; }
if ($date) {$body .= 'Data: '. $date . "\r\n"; }
if ($time) {$body .= 'Hora: '. $time . "\r\n"; }
if ($subject) {$body .= 'Assunto: '. $subject . "\r\n"; }
if ($website) {$body .= 'Website: '. $website . "\r\n"; }

$body .= 'Mensagem: ' . "\r\n" . $message;



// If all values exist, send the email
if ( $name && $senderEmail && $message ) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "De: " . $name . " <" . $senderEmail . ">";  
  $success = mail( $recipient, $mail_subject, $body, $headers );
  echo "<div class='inner success'><p class='success'>Obrigado por entrar em contato conosco. Entraremos em contato com você o mais rápido possível!</p></div><!-- /.inner -->";
}else {
	echo "<div class='inner error'><p class='error'>Algo deu errado. Por favor, tente novamente.</p></div><!-- /.inner -->";
}

?>