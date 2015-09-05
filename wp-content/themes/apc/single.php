<?php $args = $wp_query->post->ID;  ;
get_header();

$name = get_queried_object()->post_name;
query_posts('post_type=project&name='.$name);

the_post();

?>

	<main role="main">
	<!-- section -->
	<section>

	<?php if ($post): ?>

		<!-- article -->
		<article class="projet" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1><?php //var_dump($post); ?></h1>
			<section class="photos">
				<img src="<?php echo $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" id="img" alt="img">
				<img src="<?php echo get_template_directory_uri(); ?>/img/660.jpg" id="img" alt="img">
			</section><!-- 
		 --><aside class="infos">
				<div>
					<!-- Appel des champs ACF -->
					<?php echo get_post_meta($post->ID, 'description', true); ?>
				</div>
				<ul class="medias">
					<li>
						<a id="informations" href="javascript:;"></a>
					</li><!-- 
				 --><li>
						<a id="video" href="javascript:;"></a>
					</li>
				</ul>
			</aside>

		</article>
		<!-- /article -->


	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
