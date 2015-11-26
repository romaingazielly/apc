<?php /* Template Name: À Propos */ get_header(); query_posts('post_type=about'); ?>

	<?php

	$post = get_page_by_path('about',OBJECT,'page');
	$content = $post->post_content;

	?>
	<main role="main">
	<!-- section -->
	<section class="contact-container page-format sizer">
		<section class="agence contact-map">
		</section><!-- 
	 --><aside class="map-infos">
	 		<div>
				<h1>L'agence APC</h1>
				<p><?php echo $content ?></p>
			</div>
		</aside>
	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>

