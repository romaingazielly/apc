<?php get_header(); query_posts('post_type=actus'); ?>

	<?php

	$post = get_page_by_path('actus',OBJECT,'page');
	$content = $post->post_content;
	$i = 0;

	query_posts('post_type=actus');

	?>
	<main role="main">
	<!-- section -->
	<section class="actus">
		<?php while (have_posts()) { the_post(); ?>
		<article>
			<figure>
				<img src="<?php echo get_template_directory_uri(); ?>/img/actu.jpg" alt="Actualité"><!-- 
			 --><figcaption>
					<span class="date"><?php echo get_the_date('d.m.Y') ?></span>
					<h1><?php echo get_the_title(); ?></h1>
					<p><?php echo get_the_content(); ?></p>
				</figcaption>
			</figure>
		</article>
		<?php } ?>
	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>