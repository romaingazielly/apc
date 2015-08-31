<?php /* Template Name: Actualités */ get_header(); query_posts('post_type=actus'); ?>

	<?php

	$post = get_page_by_path('actus',OBJECT,'page');
	$content = $post->post_content;
	$i = 0;

	?>
	<main role="main">
	<!-- section -->
	<section class="actus">
		<?php while ( $i <= 10) { $i++ ?>
		<article>
			<figure>
				<img src="<?php echo get_template_directory_uri(); ?>/img/actu.jpg" alt="Actualité"><!-- 
			 --><figcaption>
					<span class="date">09.10.2015</span>
					<h1>Nouveau bâtiment en construction</h1>
					<p>Aenean id elementum sapien. Integer sagittis augue felis, at pharetra neque vehicula ut. Aliquam iaculis risus venenatis volutpat interdum. Quisque in nibh id ex efficitur congue nec eu purus. Vestibulum a euismod nisi. Phasellus ornare congue quam, sed placerat dui. Aenean interdum, quam at vulputate efficitur, ligula eros egestas lectus, quis fermentum erat quam nec odio. Vestibulum tellus quam, hendrerit at congue eget, consequat nec felis. Curabitur bibendum consectetur fermentum. dui. Aenean interdum, quam at vulputate efficitur, ligula eros egestas lectus, quis fermentum erat quam nec odio. Vestibulum tellus quam, hendrerit at congue eget, consequat nec felis. Curabitur bibendum consectetur fermentum</p>
				</figcaption>
			</figure>
		</article>
		<?php } ?>
	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>

