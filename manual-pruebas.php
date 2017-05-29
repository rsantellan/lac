<?php
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/DbConnector.php';

$page = isset($_GET['page']) ? (int) $_GET['page'] : 0;
$term = isset($_GET['term']) ? $_GET['term'] : '';
$dbConnector = new DbConnector();
$issearch = false;
$pageQuantity = 0;
if(isset($_GET['term'])){
	$issearch = true;
	$params = [':term' => '%'.strtoupper($term).'%'];
	$sql = 'select id, title, body from pruebas where upper(title) like :term or upper(body) like :term order by title asc';
	$data = $dbConnector->runSqlQuery($sql, $params);
}else{
	$quantity = 20;
	$offset = ($page * $quantity);// - $quantity;
	$quantityOnDb = $dbConnector->runSqlQuery('select count(id) as quantity from pruebas');
	$dbQuantity = 0;
	if(count($quantityOnDb) > 0){
		$dbQuantity = (int) $quantityOnDb[0]['quantity'];
	}
	$pageQuantity = (int) ($dbQuantity / $quantity);
	$data = $dbConnector->runSqlQuery(sprintf('select id, title, body from pruebas order by title asc limit %s offset %s', $quantity, $offset));
}
$dbConnector->closeAll();
?>
<!DOCTYPE html>
<html lang="es">
<title>Laboratorio de An&aacute;lisis Cl&iacute;nicos | Manual de pruebas</title>
<?php $pagina = 'instituciones_medicos';?>
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
							<img src="images/resources/manual-pruebas.jpg" alt="">
							<div class="top-heading">
								<h3>manual<b> de pruebas</b></h3>
								<span>VANGUARDIA AL SERVICIO DE LA SALUD</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- img top -->
	
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="lab-departs">
							<div class="heading heading-top">
								<span>Laboratorio de An&aacute;lisis Cl&iacute;nicos</span>
								<h4>MANUAL DE PRUEBAS <span> Y TOMA DE MUESTRAS  </span></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- intro section -->

	<section>
		<div class="gap no-top">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="lab-departs">
							<form class="search-form" method="get" action="manual-pruebas.php">
									<input type="search" value="<?php echo $term;?>" results="5" placeholder="BUSCAR" name="term">
									<button class="bt-search"><i class="fa fa-search"></i></button>
							</form>
							<?php if($issearch): ?>
								<?php if(count($data) > 0): ?>
									<p class="resultados">Su búsqueda arrojó <span><?php echo count($data);?></span> resultados</p>
								<?php else: ?>
									<p class="resultados resultados-none">No se encontraron coincidencias para su búsqueda.</p>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- intro section -->
	<?php
	$loopcounter = 0;
	?>
	<?php foreach($data as $section): ?>
	<?php if($loopcounter == 0): ?>	
	<section>
		<div class="gap no-top">
			<div class="container">
				<div class="row">
	<?php endif; ?>
					<div class="col-md-6">
						<div class="manual-pruebas">
							<span><?php echo $section['title']?></span>
							<?php echo $section['body']?>
						</div>
					</div>
	<?php $loopcounter ++ ; 
	if($loopcounter > 1){
		$loopcounter = 0;
	}	
	?>
	<?php if($loopcounter == 0): ?>
				</div>
			</div>
		</div>
	</section><!-- item 1 -->
	<?php endif;?>
	<?php endforeach; ?>
	<?php if($loopcounter > 0): ?>
				</div>
			</div>
		</div>
	</section><!-- item 1 -->
	<?php endif;?>	

	<section>
		<div class="gap no-top no-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
								<div class="pagin" style="margin-bottom:30px;">
									<div class="pageline">
										<?php 
											$deltaPager = 2; 
											$start = $page - $deltaPager;
											$finish = $page + $deltaPager;
											if($start < 0){
												$start = 0;
												$finish = $page + (2 * $deltaPager);
											}
											if($finish > $pageQuantity - 1){
												$finish = $pageQuantity - 1;
												$start = $pageQuantity - (2 * $deltaPager) - 1;
											}
										?>
										<?php if($page > 0): ?>
										<?php 
											$prevUrl = 'manual-pruebas.php';
											if($page > 1){
												$prevUrl .= '?page='.($page-1);
											}
										?>
										<a href="<?php echo $prevUrl;?>" title="">anterior</a>
										<?php endif; ?>
										<?php if($page + 1 < $pageQuantity ): ?>
										<a href="manual-pruebas.php?page=<?php echo $page + 1;?>" title="">siguiente</a>
										<?php endif; ?>
										<?php 
											$pageCounter = 0;
											$doDots = true;
										?>
										<ul>
											<?php while($pageCounter < $pageQuantity): ?>
												<?php if(($pageCounter == 0 || $pageCounter == ($pageQuantity -1)) || ($pageCounter == $page) || ($pageCounter >= $start && $pageCounter <= $finish) ): ?>
													<?php if($pageCounter == $page): ?>
														<li><a href="#" title="" class="current"><?php echo sprintf("%02d", $pageCounter + 1) ?></a></li>
													<?php else: ?>
														<li><a href="manual-pruebas.php<?php if($pageCounter > 0):?>?page=<?php echo $pageCounter;?><?php endif;?>" title=""><?php echo sprintf("%02d", $pageCounter + 1) ?></a></li>
													<?php endif; ?>
													<?php $doDots = true;?>
												<?php else: ?>
													<?php if($doDots): ?>
														<li>...</li>
														<?php $doDots = false;?>
													<?php endif;?>
												<?php endif;?>
												<?php $pageCounter ++;?>
											<?php endwhile; ?>
										</ul>
									</div>
								</div><!-- pagination -->
					</div>
				</div>
			</div>
		</div>
	</section><!-- items intro section -->


<?php include('_version_manual_pruebas.php');?>

	
<?php include('_footer.php');?>
    
</div>


</body>	
</html>