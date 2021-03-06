<?php $args = $wp_query->post->ID;  ;
get_header();

$name = get_queried_object()->post_name;
query_posts('post_type=enseignements&name='.$name);

the_post();
$content = $post->post_content;

?>

	<main role="main">
	<!-- section -->
	<section class="enseignement-single">

	<?php if ($post): ?>

		<!-- article -->
		<article class="projet" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php $rows = get_field('images'); 
			if (count($rows) > 1) { 
		  ?><section class="photos sizer">
					<?php foreach($rows as $row) {?>
						<div class="pic" style="background: url('<?php echo $row['image']; ?>') no-repeat; background-size:cover;"></div>
					<?php } ?>
			</section><?php 
			}else{ 
			?><section class="solophoto sizer">
				<?php foreach($rows as $row) {?>
				<div class="pic" style="background: url('<?php echo $row['image']; ?>') no-repeat; background-size:cover;"></div>
				<?php } ?>
			</section><?php 
			} ?><!-- 
		 --><aside class="infos">
				<div>
					<!-- Appel des champs ACF -->
					<h1><?php echo get_the_title($post->ID) ?></h1>
					<p><?php echo get_post_meta($post->ID, 'description', true) ?></p>
					<a class="back" href="<?php bloginfo('url') ?>/enseignement/">Retour</a>
				</div>
		</article>
		<!-- /article -->


	<?php else: ?>

		<!-- article -->
		<article class="no">

			<h1>Désolé, cette rubrique est vide.</h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
