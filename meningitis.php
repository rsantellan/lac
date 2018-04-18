<?php

// Email address verification, do not edit.
function isEmail( $email ) {
    return(preg_match( "/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email ));
}

$name		 = isset($_POST['name']) ? $_POST['name'] : '' ;
$email		 = isset($_POST['email']) ? $_POST['email'] : '' ;
$telefono		 = isset($_POST['telefono']) ? $_POST['telefono'] : '' ;
$ci		 = isset($_POST['ci']) ? $_POST['ci'] : '' ;
$newsletter	 = isset($_POST['newsletter'])? true : false;
$err = 0;
$post = 0;
$secret="6LecyDIUAAAAAOLTyOiM02CxRmgd3jMIp9nJNFdD";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post = 1;
    $response=$_POST["g-recaptcha-response"];
    $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
    $captcha_success=json_decode($verify);
    if ($captcha_success->success==false) {
      //This user was not verified by recaptcha.
      $msg .= '<div class="alert alert-danger">Captha incorrecto.</div>';
      $err = 1;
    }else if ($captcha_success->success==true) {
      // Is a post! Validate data.
      if ( trim( $name ) == '' ) {
        $msg .=  '<div class="alert alert-danger">Debe completar el campo "Nombre Completo".</div>';  
        $err = 1;
      }
      if ( trim( $email ) == '' ) {
          $msg .= '<div class="alert alert-danger">Debe completar el campo "Email"</div>';
          $err = 1;
      }
      if ( trim( $ci ) == '' ) {
          $msg .= '<div class="alert alert-danger">Debe completar el campo "Cédula de Identidad"</div>';
          $err = 1;
      }

      if ( !isEmail( $email ) ) {
          $msg .= '<div class="alert alert-danger">Atención! El email ingresado no es válido.</div>';
          $err = 1;
      }
      if($err == 0){
        require_once __DIR__.'/vendor/autoload.php';
        ob_start();
        include ('mail-meningitis.php');
        $messageBody = ob_get_clean();
        $from = 'acliente@lac.com.uy';
        $address = "acliente@lac.com.uy";
        $e_subject = 'Solicitud de hora para examen de meningitis';
        // Create the message
        $message = Swift_Message::newInstance()

          // Give the message a subject
          ->setSubject($e_subject)

          // Set the From address with an associative array
          ->setFrom($from)

          // Set the To addresses with an associative array
          ->setTo(array($address))

          // Give it a body
          ->setBody($messageBody, 'text/html');

          // And optionally an alternative body
          //->addPart('<q>Here is the message itself</q>', 'text/html');

          
        $transport = Swift_MailTransport::newInstance();
        $mailer = Swift_Mailer::newInstance($transport);
        $result = $mailer->send($message);

        if($result > 0){
          header("Location: landings-ok.php");
          die();
        }else{
          $msg .= '<div class="alert alert-danger">A ocurrido un error. Por favor intente nuevamente en unos minutos</div>';
            $err = 1;
        }
      }
    }  
}
?>
<!DOCTYPE html>
<html lang="es">
<title>Laboratorio de An&aacute;lisis Cl&iacute;nicos | Panel de agentes de meningitis / encefalitis 14 (AG) PCR en LCR</title>
<meta name="keywords" content="meningitis, encefalitis" />
<?php $paginainicial = 'pruebas';?>
<?php $pagina = 'meningitis';?>
<?php include('_head.php');?>

<body>
<?php include_once("analyticstracking.php") ?>	
<div class="theme-layout">

<?php include('_header.php');?>

	
	<section>
		<div class="gap gap-landing">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="blog-single-meta">
							<div class="post-avatar">
								<div class="news-detail">
									<h1>PANEL DE AGENTES DE MENINGITIS / ENCEFALITIS (14 AG) PCR EN LCR</h1>
								</div>
								<img src="images/resources/landings/meningitis.jpg" alt="meningitis" title="meningitis">
							</div><!-- single post image -->
							<p>Realizamos el estudio de 14 agentes de meningitis / encefalitis por metodología de Biología Molecular (PCR) en plataforma FilmArray/ Biofire / Biomerieux. (Agentes: ESCHERICHIA COLI K1, HAEMOPHILUS INFLUENZAE, LISTERIA MONOCYTOGENES, NEISSERIA MENINGITIDIS, STREPTOCOCCUS AGALACTIAE, STREPTOCOCCUS PNEUMONIAE, CYTOMEGALOVIRUS (CMV), ENTEROVIRUS, CRYPTOCOCCUS NEOFORMANS/GATTII, HERPES SIMPLEX VIRUS 1 (HSV-1), HERPES SIMPLEX VIRUS 2 (HSV-2), HUMAN HERPESVIRUS 6 (HHV-6), PARECHOVIRUS HUMANO, VARICELLA ZOSTER VIRUS (VZV).</p>
							<p>Luego de recibir la muestra le devolvemos el resultado en 70 minutos.</p>

							<div class="lab-features" style="margin-bottom:40px;">
								<div class="heading4">
									<h4>Solicitar<ins> hora</ins></h4>
									<p>Complete el formulario con sus datos y nos pondremos en contacto a la brevedad para coordinar el examen de meningitis</p>
								</div>

								<div class="contact-form landings-form" style="margin-top:15px;">
		                             <?php if($post == 1 && $err == 1): ?>
		                             	<?php echo $msg;?>
		                             <?php endif;?>    		                                                       
									<form class="merged" method="post" id="cvform">
		                                <div class="msg-box"></div>
										<div class="col-md-6">
											<input  type="text" name="name" placeholder="Nombre Completo*" id="name" value="<?php echo $name;?>">
										</div>
										<div class="col-md-6">
											<input type="text" name="email" placeholder="Email*" id="email" value="<?php echo $email;?>">
										</div>
										<div class="col-md-6">
											<input type="text" name="telefono" placeholder="Teléfono (opcional)" id="telefono" value="<?php echo $telefono;?>">
										</div>
										<div class="col-md-6">
											<input type="text" name="ci" placeholder="Cédula de Identidad*" id="ci" value="<?php echo $ci;?>">
										</div>
										<div class="col-md-6">
											<input type="checkbox" name="newsletter" id="newsletter" value="1" checked="checked"><span class="susc-news">Suscribite a nuestro Newsletter</span>
										</div>
										<button id="submit" type="submit" style="float:right;">COORDINAR HORA</button>
		                                <img src="images/ajax-loader.gif" class="loader" alt="loader" />
		                                <div class="g-recaptcha" data-sitekey="6LecyDIUAAAAAIHPYUa_T79rNXSadOJOF9c0U3bO"></div>
									</form>
								</div>


							</div><!-- lab features area -->

						</div>
					</div>

					<div class="col-md-4">
						<aside>

							<div class="side-widget">
								<div class="widget-title">
									<h4>otras <span>Pruebas</span></h4>
								</div>
								<div class="widget categories">
									<?php include('_otras-pruebas.php');?>
								</div>
							</div><!-- categories widget -->

							<div class="lab-departs lab-departs-php">
								<a href="manual-pruebas.php" title="" class="btn-1" style="margin-bottom: 30px; font-size:10px; text-align:center;" target="blank">VER MANUAL DE PRUEBAS Y TOMA DE MUESTRAS</a>
							</div>
							
						</aside>
					</div><!-- side widgets -->
				</div>
			</div>
		</div>
	</section><!-- single meta with right widgets -->
	
<?php include('_footer.php');?>
	

	
</div>

<!-- Google Code for Remarketing Tag -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 837265055;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/837265055/?guid=ON&amp;script=0"/>
</div>
</noscript>


</body>	
</html>
