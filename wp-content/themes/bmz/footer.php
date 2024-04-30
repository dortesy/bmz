

<?php get_template_part('template-parts/newsletter', 'newsletter'); ?>


<div class="footer-wrapper">

	<footer class="footer container">
		
		<div class="footer-nav-social-container">

			<div class="footer-social">

				<div class="footer-social-item">
					<a href="https://instagram.com/musikzimmer/" class="footer-social-link" target="_blank">
						<img src="<?=get_template_directory_uri()?>/images/slider/1.jpg" alt="Blackmore's Berlins Musikzimmer" class="footer-social-image">
					</a>
					<div class="footer-social-badge">
						<div class="footer-social-icon">
							<img src="<?=get_template_directory_uri()?>/images/icons/instagram.svg" alt="Blackmore's Berlins Musikzimmer instagram">
						</div>
						<div class="footer-social-title">@musikzimmer</div>
					</div>
				</div>

				<div class="footer-social-item">
					<a href="https://www.facebook.com/blackmoresmusikzimmer" class="footer-social-link" target="_blank">
						<img src="<?=get_template_directory_uri()?>/images/slider/2.jpg" alt="Blackmore's Berlins Musikzimmer" class="footer-social-image">
					</a>
					<div class="footer-social-badge">
						<div class="footer-social-icon">
							<img src="<?=get_template_directory_uri()?>/images/icons/facebook.svg" alt="Blackmore's Berlins Musikzimmer facebook">
						</div>
						<div class="footer-social-title">@musikzimmer</div>
					</div>
				</div>

			</div>

			<nav class="footer-nav">

			<?php 
			footer_menu(1);
			footer_menu(2);
			footer_menu(3);
			footer_menu(4);

			//get translated id of contact page
			$contact_id = pll_get_post(94)
			
			?>

			

				<ul class="footer-nav-list">
					<li class="footer-nav-item"><a href="<?=get_permalink($contact_id)?>" class="footer-nav-link"><?=get_the_title($contact_id)?></a></li>
					<li class="footer-nav-item"><a href="<?=get_permalink($contact_id)?>#find-us" class="footer-nav-link">Anfahrt</a></li>
					<li class="footer-nav-item">BLACKMORE'S – Berlins Musikzimmer</li>
					<li class="footer-nav-item">Warmbrunner Str. 52</li>
					<li class="footer-nav-item">14193 Berlin | Germany</li>
					<li class="footer-nav-item"><strong>Tel. +49 30 8973 4865</strong></li>
					<li class="footer-nav-item"><strong><a href="mailto:kontakt@blackmores-musikzimmer.de">kontakt@blackmores-musikzimmer.de</a></strong></li>
					
				</ul>
			</nav>

		</div>


		<div class="footer-bottom">
			<div class="footer-copyright">

				<div class="footer-copyright-logo">
					<a href="https://blackmore-music-group.com/" target="_blank"><img src="<?=get_template_directory_uri()?>/images/bmg.svg" alt="Blackmore Music Group"></a>
				</div>

				<div class="footer-copyright-text">
					<p>© <?=date('Y')?> Blackmore's - ein Unternehmen der Blackmore Music Group</p>	
					<p><a href="#">Impressum</a> und <a href="#">Datenschutzerklärung</a></p>
				</div>

			</div>


			<div class="footer-sponsors">
				<a href="<?php the_permalink(pll_get_post(343))?>" target="_blank"><img src="<?=get_template_directory_uri()?>/images/sponsors/db-logo.png" alt="Bahn logo" class="db-logo"></a>
				<a href="https://www.rbb-online.de/rbbkultur/" target="_blank"><img src="<?=get_template_directory_uri()?>/images/sponsors/rbb.svg" alt="rbb kultur" class="rbb-logo"></a>
				<a href="https://konzerte-brandenburgertor.de/" target="blank"><img src="<?=get_template_directory_uri()?>/images/sponsors/konzerte-tor.svg" alt="KONZERTE AM BRANDENBURGER TOR" class="tor-logo"></a>
			</div>
		</div>
		

	</footer>

</div>
</body>

<?php
wp_enqueue_script( 'mainscript', get_template_directory_uri() . '/js/app.min.js');
wp_footer(); 
?>

</body>
</html>