<?php query_posts('post_type=project' . '&posts_per_page=-1'); $a = 0; $nbProj = $wp_query->post_count; ?> <!-- https://codex.wordpress.org/Class_Reference/WP_Query#Parameters -->

	<!-- Appel des champs ACF -->
	<?php //echo get_post_meta($post->ID, 'url_video', true); ?>

	<!-- article -->
	<article class="list">
	<div class="line-container">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?><!-- 
		--><div class="mini">
				<?php $a++ ?>
				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists 
					$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

					<img class="bigger" src="<?php echo $url; ?>" longdesc="URL_2" alt="Text_2" />
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<img src="<?php echo $url; ?>" longdesc="URL_2" alt="Text_2" />
					</a>
				<?php endif; ?>
				<!-- /post thumbnail -->
			</div><?php if ($a % 5 == 0 && $a != $nbProj): ($a % 5 == 0 && $a == $nbProj) ?></div><div class="line-container"><?php endif; ?><!--
	--><?php endwhile; wp_reset_postdata(); ?>

	</article>
	<!-- /article -->


<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
