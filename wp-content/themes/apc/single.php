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
			<section class="photos">
				<?php $rows = get_field('project_images'); if (count($rows) > 0) { ?>
					<?php foreach($rows as $row) {?>
						<img src="<?php echo $row['image']; ?>" alt="<?php the_title() ?>">
					<?php } ?>
				<?php } ?>
			</section><!-- 
		 --><aside class="infos">
				<div>
					<!-- Appel des champs ACF -->
					<h1><?php echo get_the_title($post->ID) ?></h1>
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
