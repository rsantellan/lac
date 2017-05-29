<!DOCTYPE html>
<html lang="es">
<title>Laboratorio de An&aacute;lisis Cl&iacute;nicos | Contacto</title>
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
							<img src="images/resources/contacto-top.jpg" alt="">
							<div class="top-heading">
								<h3>contacto</h3>
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
								<h4>tiene alguna <ins>consulta?</ins></h4>
								<p>Deje su mensaje en el formulario de contacto y con gusto nos contactaremos a la brevedad.</p>
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
                                                       
							<form class="merged" method="post" action="contact.php" id="contactform">
                                                                 <div class="msg-box"></div>
								<div class="col-md-12">
									<input type="text" name="name" placeholder="Nombre Completo" id="name">
								</div>
								<div class="col-md-6">
									<input type="text" name="email" placeholder="Email" id="email">
								</div>
								<div class="col-md-6">
									<input type="text" name="telefono" placeholder="Teléfono (opcional)" id="telefono">
								</div>
								<div class="col-md-12">
									<textarea name="comments" id="comments" cols="30" rows="10" placeholder="Mensaje"></textarea>
								</div>
								<button id="submit" type="submit">ENVIAR MENSAJE</button>
                                <img src="images/ajax-loader.gif" class="loader" alt="" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- contact section -->
	
	<section>
		<div class="gap nogap">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="contact-map">
							<div class="gen-map">
								<div id="canvas"></div>
							</div><!-- Google Map -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- google map -->
	
	<section>
		<div class="gray-bg">
			<div class="container">
				<div class="row">
						<?php include('_sponsors.php');?>
				</div>
			</div>
		</div>
	</section><!-- sponsors carousel -->
	
<?php include('_footer.php');?>

</div>

		

</body>	
</html>