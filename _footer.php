	<footer>
		<div class="gap nogap">
			<div class="container">
				<div class="row">
					<div class="footer-bg overup">
						<div class="col-md-4 footer_izq">
							<div class="footer-widget">
								<div class="footer-logo">
									<h1><a href="#" title=""><img src="images/logo-2.png" alt="" class="logo-footer"></a></h1>
								</div>
								<div class="widget Address">
									<p>Vanguardia al servicio de la Salud</p>
									<ul>
										<li><i class="fa fa-phone"></i><span>TEL&eacute;FONOS:</span>
											2487 0180<sup>*</sup>
										</li>
										<li><i class="fa fa-envelope-o"></i><span>Email:</span>
											<a href="mailto:acliente@lac.com.uy"> acliente@lac.com.uy</a>
										</li>
										<li><i class="fa fa-home"></i><span>DIRECCI&oacute;N: </span>
											Av. Italia 2595
										</li>
									</ul>
										<div class="social-media" style="float:left;">
											<ul>
												<li><a href=""><img src="images/fb.png"></a></li>
												<li><a href=""><img src="images/in.png"></a></li>
												<li><a href=""><img src="images/tw.png"></a></li>
											</ul>
										</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 footer_centro">
							<div class="footer-widget">
								<div class="widget-title">
									<h4>Trabajar con nosotros</h4>
								</div>
								<div class="widget trabaja">
									<div class="recent-post">
										<p>Contamos con un equipo de profesionales actualizados que se desempe&ntilde;a con calidez. Complet&aacute; el formulario para formar parte del equipo LAC.</p>
										<form method="post" action="/trabajar_lac.php">
											<button><i class="fa"></i>enviar CV</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 footer_der">
							<div class="footer-widget">
								<div class="widget-title">
									<h4>Suscribite a nuestro<span><br/>Newsletter</span></h4>
								</div>
								<div class="widget newsletter">
									<p>Reciba nuestras &uacute;ltimas noticias y art&iacute;culos de actualidad</p>
									<form method="post" action="suscripcion.php" id="newsletterform">
										<div class="msg-box"></div>
										<input type="text" placeholder="INGRESE SU EMAIL AQUÍ" name="email" id="email" required="required">
										<button type="submit"><i class="fa"></i>SUSCRIBIRSE AHORA</button>
										<img src="images/ajax-loader.gif" class="loader" alt="" />
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- footer -->
	
	<section>
		<div class="gap nogap">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="bottombar">
							<div class="copyright">
								<p>© 2017 Todos los derechos reservados</p>
							</div>
							<ul class="bottom-menu">
								<li><a href="index.php" title="" <?php if($pagina == 'inicio'):?> class="current"<?php endif;?>>inicio</a></li>
								<li><a href="quienes_somos.php" title="" <?php if($pagina == 'quienes_somos'):?> class="current"<?php endif;?>>qui&eacute;nes somos</a></li>
								<li><a href="politicas_calidad.php" title="" <?php if($pagina == 'politicas_calidad'):?> class="current"<?php endif;?>>pol&iacute;ticas de calidad</a></li>
								<li><a href="instituciones_medicos.php" title="" <?php if($pagina == 'instituciones_medicos'):?> class="current"<?php endif;?>>instituciones y m&eacute;dicos</a></li>
								<li><a href="pacientes.php" title="" <?php if($pagina == 'pacientes'):?> class="current"<?php endif;?>>pacientes</a></li>
								<li><a href="contacto.php" title="" <?php if($pagina == 'contacto'):?> class="current"<?php endif;?>>contacto</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- bottom bar -->