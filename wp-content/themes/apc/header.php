<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/owl.carousel.css" />

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
        <script src="https://maps.googleapis.com/maps/api/js"></script>

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
					<span id="sentence">Atelier Patrick Corda</span>
				</div>
				<div id="fourthline">
					<span>Architecture - Programmation - Conseil</span>
				</div>
				<div id="lastline"></div>
				<img src="<?php echo get_template_directory_uri(); ?>/img/5sens.svg" id="chinois" alt="5 sens" width="350">
				<img src="<?php echo get_template_directory_uri(); ?>/img/bg-intro.png" id="intro" alt="Intro">
			</div>
		</section>
		<!-- /intro -->

		<!-- diapo -->
		<?php $diapo_query = new WP_Query(array('post_type' => 'diaporama')); ?>
		<section id="diapo">
			<?php if ($diapo_query->have_posts()): while ($diapo_query->have_posts()) : $diapo_query->the_post(); ?><!-- 
			--><div class="diapo">
					<!-- post thumbnail -->
					<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists 
						$urlThumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

						<!--<a href="<?php //the_permalink(); ?>" title="<?php //the_title(); ?>" style="background:url(<?php //echo $urlThumb; ?>) no-repeat center; background-size:cover;">
							<!-- <img src="<?php //echo $urlThumb; ?>" longdesc="URL_2" alt="Text_2" /> -->
						<!--</a>-->

						<a style="background:url(<?php echo $urlThumb; ?>) no-repeat center; background-size:cover;">
							<span class="diapo-title"><?php the_title(); ?></span>
						</a>
					<?php endif; ?>
					<!-- /post thumbnail -->
				</div><!--
		--><?php endwhile; endif;?>
		</section>
		<!-- /diapo -->

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">

					<aside class="diapo">
						<a href="javascript:;" id="player" class="played"></a>
					</aside>

					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo-img">
						</a>
					</div>
					<!-- /logo -->

			</header>
			<!-- /header -->
