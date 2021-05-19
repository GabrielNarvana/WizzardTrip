<?php
	get_header();
?>

    <div class="container">
		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item gradiente active">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/rio.jpg" class="d-block w-100 ">
				<div class="carousel-caption d-none d-md-block">
					<h1>Plano Bronze</h1>
					<h4>Nosso plano de Viagens locais dentro do território nacional</h4>
					<small class="text-muted hvr-grow pointer">
						<a href="../views/Pacotes.html" class="stretched-link text-light">Clique aqui para saber mais</a>
					</small>
				</div>
				</div>
				<div class="carousel-item gradiente">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/peru.jpg" class="d-block w-100">
				<div class="carousel-caption d-none d-md-block">
					<h1>Plano Prata</h1>
					<h4>Nossa opção com viagens internacionais dentro do território da America do Sul</h4>
					<small class="text-muted hvr-grow pointer">
						<a href="../views/Pacotes.html" class="stretched-link text-light">Clique aqui para saber mais</a>
					</small>
				</div>
				</div>
				<div class="carousel-item gradiente">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/paris.jpg" class="d-block w-100">
				<div class="carousel-caption d-none d-md-block">
					<h1>Plano Ouro</h1>
					<h4>Nosso melhor plano com viagens Internarcionais para qualquer lugar do mundo</h4>
					<small class="text-muted hvr-grow pointer">
						<a href="../views/Pacotes.html" class="stretched-link text-light">Clique aqui para saber mais</a>
					</small>
				</div>
				</div>
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
			<h1>O que é</h1>
			<div class="row">
				<div class="col-sm-12">
					<p>Wizzard é um serviço único, pioneiro no mercado de turismo, com a intenção de trazer aos nossos clientes experiências únicas e completamente magica. Fundamos a Wizzardtrip em um ano complicado ainda em meio a uma pandemia global. Nesse momento delicado da humanidade conseguimos visualizar não só os anceios de seus fundadores mas sim de todas as pessoas que tem essa essencia livre e são completamente apaixonado por novas historias e viagens</p>
					<p>Após ter-mos essa experiencia de certa forma ruim de isolamento e distanciamento social, oferecemos a oportunidade de poder abrar ao menos mais uma vez algum desconhecido entrar em contato com novas culturas e tradições, reconectar as pessoas. </p>   
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
						<h1>Fale com a gente </h1>
						<h4>Horário de atendimento</h4>
						<h6>De segunda à sexta-feira</h6>
						<h6>Das 9h às 18h </h6>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>

<?php
    get_footer();