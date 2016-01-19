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
			<?php $rows = get_field('project_images'); 
			if (count($rows) > 1) { 
		  ?><section class="photos sizer">
					<?php foreach($rows as $row) {?>
						<div class="pic" style="background: url('<?php echo $row['image']; ?>') no-repeat; background-size:contain; background-position:center;"></div>
					<?php } ?>
			</section><?php 
			}else{ 
			?><section class="solophoto sizer">
				<?php foreach($rows as $row) {?>
				<div class="pic" style="background: url('<?php echo $row['image']; ?>') no-repeat; background-size:contain; background-position:center;"></div>
				<?php } ?>
			</section><?php 
			} ?><!-- 
		 --><aside class="infos">
				<div>
					<!-- Appel des champs ACF -->
					<h1><?php echo get_the_title($post->ID) ?></h1>
					<h2><?php echo get_post_meta($post->ID, 'date_et_lieu', true) ?></h2>
					<div class="txt">
						<?php echo get_post_meta($post->ID, 'description', true); ?>
						<div class="infos-hidden">
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td><strong>Maître d'ouvrage</strong>
										<?php echo get_post_meta($post->ID, 'maitre_ouvrage', true) ?>
									</td>
								</tr>
								<tr>
									<td><strong>Architecte</strong>
										<?php echo get_post_meta($post->ID, 'architecte', true) ?>
									</td>
								</tr>
								<tr>
									<td><strong>Type de mission</strong>
										<?php echo get_post_meta($post->ID, 'type_de_mission', true) ?>
									</td>
								</tr>
								<tr>
									<td><strong>S.H.O.N</strong>
										<?php echo get_post_meta($post->ID, 'shon', true) ?>
									</td>
								</tr>
								<tr>
									<td><strong>Coût d'objectif</strong>
										<?php echo get_post_meta($post->ID, 'cout_objectif', true) ?>
									</td>
								</tr>
								<tr>
									<td><strong>Date de livraison</strong>
										<?php echo get_post_meta($post->ID, 'date_de_livraison', true) ?>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<ul class="medias">
					<li>
						<a id="informations" href="javascript:;"></a>
					</li><!-- 
				 --><li>
						<a id="video" <?php if($urlVideo == '') { ?>class="novid"<?php } ?>href="javascript:;"></a>
					</li>
				</ul>
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
