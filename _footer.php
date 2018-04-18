	<footer>
		<div class="gap nogap">
			<div class="container">
				<div class="row">
					<div class="footer-bg overup">
						<div class="col-md-4 footer_izq">
							<div class="footer-widget">
								<div class="footer-logo">
									<h1><img src="images/logo-2.png" alt="LAC" class="logo-footer"></h1>
								</div>
								<div class="widget Address">
									<p>Tecnología e innovación al servicio de la salud</p>
									<ul>
										<li><i class="fa fa-phone"></i><span>TEL&eacute;FONOS:</span>
											2487 0180<sup>*</sup>
										</li>
										<li><i class="fa fa-envelope-o"></i><span>Email:</span>
											<a href="mailto:acliente@lac.com.uy"> acliente@lac.com.uy</a>
										</li>
										<li><i class="fa fa-home"></i><span>DIRECCI&oacute;N: </span>
											Av. Italia 2595</br>Montevideo, Uruguay - CP 11600
										</li>
									</ul>
										<div class="social-media" style="float:left;">
											<ul>
												<li><a href="https://www.facebook.com/LACuruguay/" target="blank"><img src="images/fb.png" alt="Facebook"></a></li>
												<li><a href="https://www.linkedin.com/company-beta/22348375/" target="blank"><img src="images/in.png" alt="Instagram"></a></li>
												<!--<li><a href=""><img src="images/tw.png"></a></li>-->
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
										<form method="get" action="trabajar_lac.php">
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
                    <div id="newsletter-form" class="g-recaptcha" data-sitekey="6LecyDIUAAAAAIHPYUa_T79rNXSadOJOF9c0U3bO" <!--data-size="compact"--> ></div>
										<button type="submit"><i class="fa"></i>SUSCRIBIRSE AHORA</button>
										<img src="images/ajax-loader.gif" class="loader" alt="loader" />
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
								<p>© 2018 Todos los derechos reservados</p>
							</div>
							<!--<ul class="bottom-menu">
								<li><a href="index.php" title="" <?php if($pagina == 'inicio'):?> class="current"<?php endif;?>>inicio</a></li>
								<li><a href="quienes-somos.php" title="" <?php if($pagina == 'quienes_somos'):?> class="current"<?php endif;?>>qui&eacute;nes somos</a></li>
								<li><a href="panorama.php" title="" <?php if($paginainicial == 'pruebas'):?> class="current"<?php endif;?>>pruebas</a></li>								
								<li><a href="politica-calidad.php" title="" <?php if($pagina == 'politica_calidad'):?> class="current"<?php endif;?>>pol&iacute;tica de calidad</a></li>
								<li><a href="instituciones-medicos.php" title="" <?php if($pagina == 'instituciones_medicos'):?> class="current"<?php endif;?>>instituciones y m&eacute;dicos</a></li>
								<li><a href="pacientes.php" title="" <?php if($pagina == 'pacientes'):?> class="current"<?php endif;?>>pacientes</a></li>
								<li><a href="contacto.php" title="" <?php if($pagina == 'contacto'):?> class="current"<?php endif;?>>contacto</a></li>
							</ul>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- bottom bar -->
<script src='https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit' async defer></script>
