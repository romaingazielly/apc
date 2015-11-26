<?php /* Template Name: Enseignement */ get_header(); query_posts('post_type=enseignements'); ?>

	<?php

	$post = get_page_by_path('enseignement',OBJECT,'page');
	$content = $post->post_content;

	?>
	<main role="main">
	<!-- section -->
	<section class="contact-container page-format sizer">
		<section class="enseignements">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?><div class="year" style="background:url('<?php echo $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>'); background-size:cover;">
				<a href="<?php the_permalink(); ?>">
					<aside><?php echo get_the_title() ?></aside>
					<img src="<?php echo $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" alt="<?php echo get_the_title() ?>">
				</a>
			</div><?php endwhile; endif; ?>
		</section><!-- 
	 --><aside class="map-infos">
	 		<div>
				<h1>Enseignement</h1>
				<p><?php echo $content ?></p>
			</div>
		</aside>
	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>

