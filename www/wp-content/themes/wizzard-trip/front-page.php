<?php
	get_header();
?>

    <div class="container">
		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<?php
					if ( have_rows('slider') ) :
						$contador = 0;
						while ( have_rows('slider') ) : the_row();
				?>
							<li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $contador?>" class="<?php echo $contador == 0 ? "active" : ""; ?>"></li>
				<?php 
							$contador++;
						endwhile;
					endif;
				?>
			</ol>
			<div class="carousel-inner">
				<?php
					if ( have_rows('slider') ) :
						$contador = 0;
						while ( have_rows('slider') ) : the_row();
				?>
							<div class="carousel-item gradiente <?php echo $contador == 0 ? "active" : ""; ?>">
								<img src="<?php echo get_sub_field("imagem") ?>" class="d-block w-100 ">
								<div class="carousel-caption d-none d-md-block">
									<h1><?php echo get_sub_field("titulo") ?></h1>
									<h4><?php echo get_sub_field("descricao") ?></h4>
									<small class="text-muted hvr-grow pointer">
										<a href="<?php echo get_sub_field("link")["url"]; ?>" target="<?php echo get_sub_field("link")["target"]; ?>" class="stretched-link text-light"><?php echo get_sub_field("link")["title"]; ?></a>
									</small>
								</div>
							</div>
				<?php 
							$contador++;
						endwhile;
					endif;
				?>
				
			</div>
			<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
    </div>

    <div class="sobre-nos mb-0">
		<div class="container">
			<h1><?php echo get_field("sobre_titulo"); ?></h1>
			<div class="row">
				<div class="col-sm-12">
					<?php echo get_field("sobre_descricao"); ?>
				</div>
			</div>
		</div>
    </div>

	<div class="box-contato">
		<div class="container">
			<div class="form-row">
				<div class="col-sm-6 mt-5">
					<label for="NomeContato" class="form-label">Nome</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Insira seu nome">
					</div>
					<label for="EmailContato" class="form-label">Email</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="email@dominio.com">
					</div>
					<label for="AssuntoContato" class="form-label">Assunto</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="">
					</div>
					<label for="DescricaoContato" class="form-label">Descrição</label>
					<div class="input-group mb-3">
						<textarea class="form-control" rows="4"></textarea>
					</div>
					<button type="button" class="btn btn-primary mb-5">Enviar</button>
				</div>
				<div class="col-sm-6 mt-5">
					<div class="row m-5 text-center">
						<div class="col-sm-12">
							<h1><?php echo get_field("contato_titulo"); ?></h1>
							<h4><?php echo get_field("contato_linha_fina"); ?></h4>
							<h6><?php echo get_field("contato_dias"); ?></h6>
							<h6><?php echo get_field("contato_horario"); ?></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
    get_footer();