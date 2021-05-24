<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="publisher" content="contato@okngroup.com.brr">
	<?php

		get_template_part('template-parts/header/seo');
		# get_template_part('inc/analytics/analytics');
		wp_head();

		global $current_user;
		wp_get_current_user();

	?>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

	<!-- Assets -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/img-styles.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/plugins.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</head>

<body <?php body_class($post->post_name ?? ''); ?>>
	<?php
		// get_template_part('inc/analytics/analytics-noscript');
		// get_template_part('template-parts/navigation/menu');
	?>

    <header class="navbar navbar-expand-lg navbar-light header">
		<div class="container">
			<a class="navbar-brand hvr-grow" href="<?php echo home_url(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" width="200" height="55" class="d-inline-block align-top black-color" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
				<ul class="navbar-nav">
					<?php
						foreach ( wp_get_menu_array("Menu Header") as $menu ) {
							$current = isset($post->ID) && $post->ID == $menu["ID"] ? "roxo active" : "";
					?>
							<li class="nav-item nav-pills pr-2">
								<a class="nav-link hvr-back-pulse branco <?php echo $current; ?>" href="<?php echo $menu["url"] ?>" target="<?php echo $menu["target"] ?>">
									<?php echo $menu["title"] ?>
									<?php 
										if (isset($post->ID) && $post->ID == $menu["ID"]) {
											echo '<span class="sr-only">(current)</span>';
										}
									?>
								</a>
							</li>
					<?php
						}
					?>
					<?php if ( !is_user_logged_in() ) { ?>
							<li class="nav-item nav-pills pr-2">
								<a class="nav-link hvr-back-pulse branco" href="<?php echo home_url(); ?>/entrar" target="">Entrar</a>
							</li>
							<li class="nav-item nav-pills pr-2">
								<a class="nav-link hvr-back-pulse branco" href="<?php echo home_url(); ?>/cadastro" target="">Cadastro</a>
							</li>
					 <?php } else { ?>
							<li class="nav-item nav-pills pr-2">
								<a class="nav-link hvr-back-pulse branco" href="<?php echo home_url(); ?>/cliente" target="">Perfil</a>
							</li>
							<li class="nav-item nav-pills pr-2">
								<?php wp_loginout(); ?>
								<!-- <a class="nav-link hvr-back-pulse branco" href="" target="">Logout</a> -->
							</li>
					 <?php } ?>
				</ul>
			</div>
		</div>
	</header>