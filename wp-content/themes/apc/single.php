<?php $args = $wp_query->post->ID;  ;
get_header();

$name = get_queried_object()->post_name;
query_posts('post_type=project&name='.$name);

the_post();

$urlVideo = get_post_meta($post->ID, 'url_video', true);
?>

	<main role="main">
	<!-- section -->
	<section>

	<?php if ($post): ?>

		<!-- article -->
		<article class="projet" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<section class="photos sizer">
				<?php $rows = get_field('project_images'); if (count($rows) > 0) { ?>
					<?php foreach($rows as $row) {?>
						<!--<img src="<?php //echo $row['image']; ?>" alt="<?php //the_title() ?>">-->
						<div class="pic" style="background: url('<?php echo $row['image']; ?>') no-repeat; background-size:cover;"></div>
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
						<a id="video" <?php if($urlVideo == '') { ?>class="novid"<?php } ?>href="javascript:;"></a>
					</li>
				</ul>
				<div class="infos-hidden">
					<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							<th>Maître d'ouvrage</th>
							<td>Michel</td>
						</tr>
						<tr>
							<th>Maître d'oeuvre</th>
							<td>Jena)patruck</td>
						</tr>
						<tr>
							<th>S.H.O.N</th>
							<td>324546</td>
						</tr>
						<tr>
							<th>Coût d'objectif</th>
							<td>34556546546 5654€</td>
						</tr>
						<tr>
							<th>Date de livraison</th>
							<td>04/42/2222</td>
						</tr>
					</table>
				</div>
			</aside>
			<?php 
				if($urlVideo != '') { ?>
					<div class="video-y ">
						<!-- Appel des champs ACF -->
						<div class="vid">
							<a class="close-vid" href="javascript:;"></a>
							<iframe id="vid-ytb" width="640" height="480" src="<?php echo $urlVideo ?>" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
				<?php } ?>
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
