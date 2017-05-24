<?php
if ( !$_POST ) exit;
require_once __DIR__.'/swiftmailer/lib/swift_required.php';
// Email address verification, do not edit.
function isEmail( $email ) {
    return(preg_match( "/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email ));
}
if ( !defined( "PHP_EOL" ) ) define( "PHP_EOL", "\r\n" );

$email		 = $_POST['email'];
$err = 0;
if ( trim( $email ) == '' ) {
    $msg .= '<div class="alert alert-danger">Debe completar el campo "EMAIL"</div>';
    $err = 1;
}

if($err == 1){
	echo $msg;
	exit;
}
$from = 'info@rodrigosantellan.com';
$address = "rsantellan@gmail.com";
$e_subject = 'Contacto vía Sitio web. Usuario en newsletter';
ob_start();
include ('mail-suscripcion.php');
$messageBody = ob_get_clean();

// Create the message
$message = Swift_Message::newInstance()

  // Give the message a subject
  ->setSubject($e_subject)

  // Set the From address with an associative array
  ->setFrom($from)

  // Set the To addresses with an associative array
  ->setTo(array('rsantellan@gmail.com'))

  // Give it a body
  ->setBody($messageBody, 'text/html');

  // And optionally an alternative body
  //->addPart('<q>Here is the message itself</q>', 'text/html');

$transport = Swift_MailTransport::newInstance();
$mailer = Swift_Mailer::newInstance($transport);
$result = $mailer->send($message);
if($result > 0){
    echo "<div class='alert alert-success'>";
    echo "<h1>Suscripción realizada con éxito</h1>";
    echo "</div>";
} else {
    echo "<div class='alert alert-danger'>Error al enviar la suscripción, por favor intente nuevamete en unos minutos</div>";
}
exit;
$address = "laura@lauranozar.com";

$e_subject		 = 'Suscripcion a Newsletter';
$e_body			 = "La siguiente persona desea estar suscripita a su newsletter $email" . PHP_EOL . PHP_EOL;

$message = wordwrap( $e_body . $e_content . $e_reply, 70 );
$headers = "From: $email" . PHP_EOL;
$headers .= "Reply-To: $email" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

if ( mail( $address, $e_subject, $message, $headers) ) {

    echo "<div class='alert alert-success'>";
    echo "<h1>Suscripción realizada con éxito</h1>";
    echo "</div>";

} else {
    echo "<div class='alert alert-danger'>Error al enviar la suscripción, por favor intente nuevamete en unos minutos</div>";
}
exit;