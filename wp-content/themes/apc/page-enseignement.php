<?php /* Template Name: Enseignement */ get_header(); query_posts('post_type=enseignement'); ?>

	<?php

	$post = get_page_by_path('enseignement',OBJECT,'page');
	$content = $post->post_content;
	$i = 0;

	?>
	<main role="main">
	<!-- section -->
	<section class="contact-container page-format">
		<section class="agence contact-map">
		</section><!-- 
	 --><aside class="map-infos">
	 		<div>
				<h1>Enseignement</h1>
				<p>Vestibulum a euismod nisi. Phasellus ornare congue quam, sed placerat dui. Aenean interdum, quam at vulputate efficitur, ligula eros egestas lectus, quis fermentum erat quam nec odio. Vestibulum tellus quam, hendrerit at congue eget, consequat nec felis. Curabitur bibendum consectetur fermentum. dui. Aenean interdum, quam at vulputate efficitur, ligula eros egestas lectus, quis fermentum erat quam nec odio. Vestibulum tellus quam, hendrerit at congue eget, consequat nec felis. Curabitur bibendum consectetur fermentumger sagittis augue felis, at pharetra neque vehicula ut. Aliquam iaculis risus venenatis volutpat interdum. Quisque in nibh id ex efficitur congue nec eu purus. Vestibulum a euismod nisi. Phasellus ornare congue quam, sed placerat dui. Aenean interdum, quam at vulputate efficitur, ligula eros egestas lectus, quis fermentum erat quam nec odio. Vestibulum tellus quam, hendrerit at congue eget, consequat nec felis. Curabitur bibendum consectetur fermentum. dui. Aenean interdum, quam at vulputate efficitur, ligula eros egestas lectus, quis fermentum erat quam nec odio. Vestibulum tellus quam, hendrerit at congue eget, consequat nec felis. Curabitur bibendum consectetur fermentum</p>
			</div>
		</aside>
	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>

