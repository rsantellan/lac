	<header class="stick style2">
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="topbar-contact">
							<li><i class="fa fa-phone"></i>TEL&Eacute;FONOS:<span> 2487 0180<sup>*</sup></span></li>
							<li><i class="fa fa-envelope-o"></i>EMAIL: <span><a href="mailto:acliente@lac.com.uy">acliente@lac.com.uy</a></span></li>
							<li><i class="fa fa-home"></i>DIRECCI&Oacute;N: <span>Av. Italia 2595</span></li>
							<li><i class="fa fa-clock-o"></i>HORARIO: <span>L a V: 07:30-21:30 - Sáb: 08:00-15:00</span></li>
						</ul>
						<div class="social-media">
							<ul>
								<li><a href=""><img src="images/fb.png"></a></li>
								<li><a href=""><img src="images/in.png"></a></li>
								<li><a href=""><img src="images/tw.png"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="menubar">
						<div class="logo">
							<h1><a href="index.php" title=""><img src="images/logo-1.png" alt=""></a></h1>
						</div>
						<nav>
							<div class="main-menu">
								<ul>
									<li><a href="index.php" title="" <?php if($pagina == 'inicio'):?> class="current"<?php endif;?>>inicio</a></li>
									<li><a href="quienes_somos.php" title="" <?php if($pagina == 'quienes_somos'):?> class="current"<?php endif;?>>qui&eacute;nes somos</a></li>
									<li><a href="politica_calidad.php" title="" <?php if($pagina == 'politica_calidad'):?> class="current"<?php endif;?>>pol&iacute;tica de calidad</a></li>
									<li><a href="instituciones_medicos.php" title="" <?php if($pagina == 'instituciones_medicos'):?> class="current"<?php endif;?>>instituciones y m&eacute;dicos</a></li>
									<li><a href="pacientes.php" title="" <?php if($pagina == 'pacientes'):?> class="current"<?php endif;?>>pacientes</a></li>
									<li><a href="contacto.php" title="" <?php if($pagina == 'contacto'):?> class="current"<?php endif;?>>contacto</a></li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header><!-- Header -->
	
	<div class="responsive-menu">
		<div class="respnsv-top">
			<span><i class="fa fa-phone"></i>Tel&eacute;fonos: 2487 0180*</span>
			<a href="#" title=""><i class="fa fa-envelope"></i>info@lac.com.uy</a>
		</div>
		<div class="res-head">
			<div class="res-logo">
				<a href="#" title=""><img src="images/responsive-logo.png" alt=""></a>
			</div>
			<a href="#" title="" class="menu-btn"><i class="fa fa-align-justify"></i></a>
		</div>
		<div class="res-menu-dropdown">
        	<a href="#" title="" class="res-close-btn"><i class="fa fa-close"></i></a>
        	<div class="logo"><a href="#" title=""><img src="images/responsive-logo.png" alt=""></a></div>
			<ul class="dropdown">
				<li class="has-dropdown"><a href="index.php" title="" <?php if($pagina == 'inicio'):?> class="current"<?php endif;?>>inicio</a></li>
				<li class="has-dropdown"><a href="quienes_somos.php" title="" <?php if($pagina == 'quienes_somos'):?> class="current"<?php endif;?>>qui&eacute;nes somos</a></li>
				<li class="has-dropdown"><a href="politicas_calidad.php" title="" <?php if($pagina == 'politicas_calidad'):?> class="current"<?php endif;?>>pol&iacute;ticas de calidad</a></li>
				<li class="has-dropdown"><a href="instituciones_medicos.php" title="" <?php if($pagina == 'instituciones_medicos'):?> class="current"<?php endif;?>>instituciones y m&eacute;dicos</a></li>
				<li><a href="pacientes.php" title="" <?php if($pagina == 'pacientes'):?> class="current"<?php endif;?>>pacientes</a></li>
				<li><a href="contacto.php" title="" <?php if($pagina == 'contacto'):?> class="current"<?php endif;?>>contacto</a></li>
			</ul>
			<div class="responsive-menu-footer">
				<span><i class="fa fa-clock-o"></i> Horario:</span>
                <i>De lunes a sábados de 7:30 a 21:30 hs. </i>
			</div>
		</div>
	</div><!-- responsive menu -->