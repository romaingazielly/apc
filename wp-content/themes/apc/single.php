<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>

	<?php if (have_posts()): the_post(); ?>

		<!-- article -->
		<article class="projet" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<section class="photos">
				<img src="<?php echo get_template_directory_uri(); ?>/img/img.jpg" id="img" alt="img">
				<img src="<?php echo get_template_directory_uri(); ?>/img/660.jpg" id="img" alt="img">
			</section><!-- 
		 --><aside class="infos">
				<div>
					<h1>Centre culturel</h1>
					<h2>Equipements - 2012</h2>
					<p>Aenean id elementum sapien. Integer sagittis augue felis, at pharetra neque vehicula ut. Aliquam iaculis risus venenatt. Aliquam iaculis risus venenatt. Aliquam iaculis risus venenatt. Aliquam iaculis risus venenatis volutpat interdum. Quisque in nibh id ex efficitur congue nec eu purus. Vestibulum a euismod nisi. Phasellus ornare congue quam, sed placerat dui. Aenean interdum, quam at vulputate efficitur, ligula eros egestas lectus, quis fermentum erat quam nec odio. Vestibulum tellus quam, hendrerit at congue eget, consequat nec felis. Curabitur bibendum consectetur fermentum. dui. Aenean interdum, quam at vulputate efficitur, ligula eros egestas lectus, quis fermentum erat quam nec odio. Vestibulum tellus quam, hendrerit at congue eget, consequat nec felis. Curabitur bibendum consectetur fermentum</p>
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
