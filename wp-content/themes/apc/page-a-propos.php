<?php /* Template Name: À Propos */ get_header(); query_posts('post_type=about'); ?>

	<?php

	$post = get_page_by_path('a-propos',OBJECT,'page');
	$content = $post->post_content;
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

	?>
	<main role="main">
	<!-- section -->
	<section class="contact-container page-format sizer">
		<section class="agence contact-map" style="background:url('<?php echo $url ?>') no-repeat center; background-size:cover;">
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

