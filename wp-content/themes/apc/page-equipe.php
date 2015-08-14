<?php /* Template Name: Equipe */ get_header(); query_posts('post_type=membres'); ?>

	<?php

	$post = get_page_by_path('equipe',OBJECT,'page');
	$content = $post->post_content

	?>
	<main role="main">
	<!-- section -->
	<section class="page-format">
		<section class="team-container">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?> 
			<figure class="team-m">
				<img src="<?php echo get_template_directory_uri(); ?>/img/equipe.jpg">
				<figcaption>
					<h2><?php echo get_the_title() ?></h2>
					<p><?php echo get_post_meta($post->ID, 'description_membre', true) ?></p>
				</figcaption>
			</figure>
		<?php endwhile; endif; ?>
		</section><!-- 
	 --><aside class="team-infos-container map-infos">
	 		<div>
				<h1>L'équipe</h1>
				<p><?php echo $content ?></p>
			</div>
		</aside>
	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
