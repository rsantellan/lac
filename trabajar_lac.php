<?php

// Email address verification, do not edit.
function isEmail( $email ) {
    return(preg_match( "/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email ));
}

function check_doc_mime( $tmpname, $ext ) {
  // MIME types: http://filext.com/faq/office_mime_types.php
  $return = false;
  if(function_exists('finfo_open')){
	$finfo = finfo_open( FILEINFO_MIME_TYPE );
	$mtype = finfo_file( $finfo, $tmpname );
	if( $mtype == ( "application/vnd.openxmlformats-officedocument.wordprocessingml.document" ) || 
		$mtype == ( "application/vnd.ms-excel" ) ||
		$mtype == ( "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" ) || 
		$mtype == ( "application/vnd.ms-powerpoint" ) ||
		$mtype == ( "application/vnd.openxmlformats-officedocument.presentationml.presentation" ) || 
		$mtype == ( "application/pdf" ) ) {
		$return = true;
	}
	finfo_close( $finfo );
  }	else {
  	if($ext == 'doc' || $ext == 'docx' || $ext == 'pdf'){
  		$return = true;
  	}
  }
  return $return;
}

function check_image_type($tmpfile){
	$imageInfo = getimagesize( $tmpfile );
	if ($imageInfo['mime'] == ( "image/png" ) || $imageInfo['mime'] == ( "image/jpeg" ) 
	  || $imageInfo['mime'] == ( "image/gif" ) || $imageInfo['mime'] == ( "image/psd" ) || 
	  $imageInfo['mime'] == ( "image/bmp" ) ) {
		return true;
	}
	return false;
}

$name		 = isset($_POST['name']) ? $_POST['name'] : '' ;
$email		 = isset($_POST['email']) ? $_POST['email'] : '' ;
$telefono		 = isset($_POST['telefono']) ? $_POST['telefono'] : '' ;
$profesion		 = isset($_POST['profesion']) ? $_POST['profesion'] : '' ;
$born		 = isset($_POST['born']) ? $_POST['born'] : '' ;
$ci		 = isset($_POST['ci']) ? $_POST['ci'] : '' ;
$nacionalidad		 = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : '' ;
$err = 0;
$post = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
	if ( trim( $born ) == '' ) {
	    $msg .= '<div class="alert alert-danger">Debe completar el campo "Fecha de Nacimiento"</div>';
	    $err = 1;
	}
	if ( !isEmail( $email ) ) {
	    $msg .= '<div class="alert alert-danger">Atención! El email ingresado no es válido.</div>';
	    $err = 1;
	}
	/**
	*
	* Files validations
	*
	**/

	if($_FILES['cvFile']['error'] == 4 || $_FILES['photoFile']['error'] == 4){
		$msg .= '<div class="alert alert-danger">Debe de adjuntar un CV y la imagen de su persona.</div>';
	    $err = 1;
	} else {
		if($_FILES['cvFile']['error'] !== UPLOAD_ERR_OK ){
			$msg .= '<div class="alert alert-danger">Ocurrio un error al subir el CV.</div>';
	    	$err = 1;
		}
		if($_FILES['photoFile']['error'] !== UPLOAD_ERR_OK ){
			$msg .= '<div class="alert alert-danger">Ocurrio un error al subir la imagen de su persona.</div>';
		    $err = 1;
		}
		if($err == 0){
			$ext = strtolower(substr(strrchr($_FILES["cvFile"]["name"], "."), 1));
			if(!check_doc_mime($_FILES["cvFile"]["tmp_name"], $ext) && !check_image_type($_FILES["cvFile"]["tmp_name"])){
				$msg .= '<div class="alert alert-danger">Solo puede subir archivos pdf, imagenes o documentos de word al CV.</div>';
	    		$err = 1;
			}
			$ext = strtolower(substr(strrchr($_FILES["photoFile"]["name"], "."), 1));
			if(!check_doc_mime($_FILES["photoFile"]["tmp_name"], $ext) && !check_image_type($_FILES["photoFile"]["tmp_name"])){
				$msg .= '<div class="alert alert-danger">Solo puede subir archivos pdf, imagenes o documentos de word a la imagen de su persona.</div>';
	    		$err = 1;
			}
		}			
	}
	if($err == 0){
		require_once __DIR__.'/vendor/autoload.php';
		ob_start();
		include ('mail-trabaja-con-nosotros.php');
		$messageBody = ob_get_clean();
		$from = 'laura@lauranozar.com';
		$address = "laura@lauranozar.com";
		$e_subject = 'Contacto vía Sitio web. Trabaja con nosotros';
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
		$message->attach(
			Swift_Attachment::fromPath($_FILES["cvFile"]["tmp_name"])->setFilename($_FILES["cvFile"]["name"])
		);
		$message->attach(
			Swift_Attachment::fromPath($_FILES["photoFile"]["tmp_name"])->setFilename($_FILES["photoFile"]["name"])
		);  
		$transport = Swift_MailTransport::newInstance();
		$mailer = Swift_Mailer::newInstance($transport);
		$result = $mailer->send($message);
		@unlink($_FILES["cvFile"]["tmp_name"]);
		@unlink($_FILES["photoFile"]["tmp_name"]);
		if($result > 0){
			header("Location: trabajar_lac_correcto.php");
			die();
		}else{
			$msg .= '<div class="alert alert-danger">A ocurrido un error. Contactate con el administrador del sitio.</div>';
    		$err = 1;
		}
	}
	$post = 1;
}
?>
<!DOCTYPE html>
<html lang="es">
<title>Laboratorio de An&aacute;lisis Cl&iacute;nicos | Trabajar en LAC</title>
<?php $pagina = 'contacto';?>
<?php include('_head.php');?>
<body>
<div class="theme-layout">

<?php include('_header.php');?>
	
	<section>
		<div class="gap nogap">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="page-top overlap black-layer">
							<img src="images/resources/trabaja-top.jpg" alt="">
							<div class="top-heading">
								<h3>trabaja con <b>nosotros</b></h3>
								<span>VANGUARDIA AL SERVICIO DE LA SALUD</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- blog top -->
	
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="lab-contact">
							<div class="heading4">
								<h4>Quiere trabajar con <ins>nosotros?</ins></h4>
								<p>complete el formulario de y con guardaremos su cv en nuestra base de datos.</p>
							</div>
							<ul class="lab-contact-detail">
								<li>
									<i class="fa fa-phone"></i>
									<span><b>TELÉFONOS</b><ins>2487 0180<sup>*</sup></ins></span>										
								</li>
								<li>
									<i class="fa fa-envelope"></i>
									<span><b>EMAIL</b><ins><a href="info@lac.com.uy">info@lac.com.uy</a></ins></span>										
								</li>
								<li>
									<i class="fa fa-home"></i>
									<span><b>dirección</b><ins>Av. Italia 2595</ins></span>										
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-8">
						<div class="contact-form">
                             <?php if($post && $err > 0): ?>
                             	<?php echo $msg;?>
                             <?php endif;?>          
							<form class="merged" method="post" id="cvform" enctype="multipart/form-data" style="margin-bottom:40px;">
                                <div class="msg-box"></div>
								<div class="col-md-12">
									<input type="text" name="name" placeholder="Nombre Completo*" id="name" value="<?php echo $name;?>">
								</div>
								<div class="col-md-6">
									<input type="text" name="ci" placeholder="Cédula de Identidad*" id="ci" value="<?php echo $ci;?>">
								</div>
								<div class="col-md-6">
									<input type="text" name="nacionalidad" placeholder="Nacionalidad (opcional)" id="nacionalidad" value="<?php echo $nacionalidad;?>">
								</div>
								<div class="col-md-6">
									<label class="label-born">Fecha de Nacimiento</label>
									<input type="date" name="born" placeholder="Fecha de Nacimiento" id="born" class="input-born"value="<?php echo $born;?>">
								</div>
								<div class="col-md-6">
									<input type="text" name="profesion" placeholder="Profesión (opcional)" id="profesion" value="<?php echo $profesion;?>">
								</div>
								<div class="col-md-6">
									<input type="text" name="email" placeholder="Email*" id="email" value="<?php echo $email;?>">
								</div>
								<div class="col-md-6">
									<input type="text" name="telefono" placeholder="Teléfono (opcional)" id="telefono" value="<?php echo $telefono;?>">
								</div>
								<div class="col-md-6">
									<label class="adj-trab">Adjuntar CV</label>
									<input id="uploadBtn" type="file" class="upload" name="cvFile" />								
								</div>
								<div class="col-md-6">
									<label class="adj-trab">Adjuntar Foto</label>
									<input id="uploadBtn" type="file" class="upload" name="photoFile" />		
								</div>
								<button id="submit" type="submit">ENVIAR CV</button>
                                <img src="images/ajax-loader.gif" class="loader" alt="" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- contact section -->

	
	<section>
		<div class="gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="sponsors">
							<li><a href="http://www.mayomedicallaboratories.com/index.html" title="Clínica Mayo" target="blank"><img src="images/resources/sponsor-1.png" alt=""></a></li>
							<li><a href="http://www.organismouruguayodeacreditacion.org/Pagina_Principal.htm" title="OUA (15189)" target="blank"><img src="images/resources/sponsor-2.png" alt=""></a></li>
							<li><a href="http://aladil.org" title="Aladil" target="blank"><img src="images/resources/sponsor-3.png" alt=""></a></li>
							<li><a href="http://www.mayomedicallaboratories.com/index.html" title="Clínica Mayo" target="blank"><img src="images/resources/sponsor-1.png" alt=""></a></li>
							<li><a href="http://www.organismouruguayodeacreditacion.org/Pagina_Principal.htm" title="OUA (15189)" target="blank"><img src="images/resources/sponsor-2.png" alt=""></a></li>
							<li><a href="http://aladil.org" title="Aladil" target="blank"><img src="images/resources/sponsor-3.png" alt=""></a></li>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</section><!-- sponsors carousel -->
	
<?php include('_footer.php');?>

</div>

		

</body>	
</html>
