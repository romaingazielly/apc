			<!-- footer -->
			<footer class="footer" role="contentinfo">

				<!-- nav -->
					<nav class="nav" role="navigation">
						<ul>
							<li>
								<a href="#">L'agence</a>
								<ul>
									<li><a href="<?php bloginfo('url') ?>/equipe/">L'équipe</a></li>
									<li><a href="<?php bloginfo('url') ?>/a-propos/">L'agence</a></li>
								</ul>
							</li><!--  
						 --><li><a href="<?php bloginfo('url') ?>/actus">Actualites</a></li><!-- 
						 --><li>
								<a href="/">Realisations</a>
								<ul class="<?php echo get_site_url(); ?> hihi">
									<li><a href="<?php bloginfo('url') ?>/?categorie=logement">Logements</a></li>
									<li><a href="<?php bloginfo('url') ?>/?categorie=bureaux">Bureaux</a></li>
									<li><a href="<?php bloginfo('url') ?>/?categorie=hotellerie_commerces">Hotellerie et commerces</a></li>
									<li><a href="<?php bloginfo('url') ?>/?categorie=equipements">Équipements</a></li>
									<li><a href="<?php bloginfo('url') ?>/?categorie=urbanisme">Urbanisme</a></li>
								</ul>
							</li><!--
						 --><li><a href="<?php bloginfo('url') ?>/enseignement/">Enseignement</a></li><!-- 
						 --><!-- <li><a href="#">Carnet d'adresses</a></li> --><!-- 
						 --><li <?php if (is_page('contact')): ?>class="active"<?php endif; ?>><a href="<?php bloginfo('url') ?>/contact/">Contact</a></li>
						</ul>
					</nav>
				<!-- /nav -->

			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<script src="<?php echo get_template_directory_uri(); ?>/js/lib/owl.carousel.min.js"></script>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
