<?php /* Template Name: Equipe */ get_header(); query_posts('post_type=membres'); ?>

	<main role="main">
	<!-- section -->
	<section class="page-format">
		<section class="team-container">
		<?php while ( $i <= 10) { 
 $i++ ?><figure class="team-m">
				<img src="<?php echo get_template_directory_uri(); ?>/img/equipe.jpg">
				<figcaption>
					<h2>Michel Seguin</h2>
					<p>Depuis plus de 10 ans, James est le specialiste de la mise en oeuvre sur des grands projets comme verrina ainsi que rt bat.</p>
				</figcaption>
			</figure><?php } ?>
		</section><!-- 
	 --><aside class="team-infos-container map-infos">
	 		<div>
				<h1>L'équipe</h1>
				<p>On est tous des ponneys qui rox dans l'art de l'architechture ! Et ouai morray !!</p>
			</div>
		</aside>
	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
