<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- intro -->
		<section class="prehome">
			<div id="anim-container">
				<div id="firstline" class="grey"></div>
				<div id="secline">
					<img src="<?php echo get_template_directory_uri(); ?>/img/apc.svg" alt="APC">
				</div>
				<div id="thirdline" class="grey">
					<span class="red" id="acces">Accès au site</span>
					<span id="sentence">Architecture - Programmation - Conseil</span>
				</div>
				<div id="fourthline">
					<span>Atelier - Perspective - Couleur</span>
				</div>
				<div id="lastline"></div>
				<img src="<?php echo get_template_directory_uri(); ?>/img/chinois.png" id="chinois" alt="Chinois">
			</div>
		</section>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">

					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo-img">
						</a>
					</div>
					<!-- /logo -->

					<!-- nav -->
					<nav class="nav" role="navigation">
						<ul>
							<li><a href="#">L'agence</a></li>
							<li>
								<a href="#">Réalisations</a>
								<ul>
									<li><a href="#">Logements</a></li>
									<li><a href="#">Urbanisme</a></li>
									<li><a href="#">Municipalite</a></li>
									<li><a href="#">Concours</a></li>
								</ul>
							</li>
							<li><a href="#">Actualités Enseignement</a></li>
							<li><a href="#">Carnet d'adresses</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</nav>
					<!-- /nav -->

			</header>
			<!-- /header -->
