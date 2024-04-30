<!DOCTYPE html>
	<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="shortcut icon" href="<?=get_template_directory_uri()?>/images/favicon.ico"/>
		<?php wp_enqueue_style('style', get_template_directory_uri() . '/css/app.min.css') ?>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

    <div class="full-wrapper">
		<div class="header-wrapper">
			
			<header class="header">
					<div class="header-menu-button">
						<img src="<?=get_template_directory_uri()?>/images/menu-button.svg" alt="Menu Button">
					</div>

					<nav class="header-nav">
						<?php 
						$args = [
							'theme_location'  => 'primary',
							'menu' => 'primary',
							'container'       => false,
							'menu_class'      => 'header-nav-list',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'add_li_class'		=> 'header-nav-item',
							'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
							'depth'           => 0,
						] ;
						wp_nav_menu( $args ); ?>


					<div class="header-icons">
						<a href="<?=get_permalink(pll_get_post(81))?>"><img src="<?=get_template_directory_uri()?>/images/icons/favorites.svg"></a>
						<a href="#" class="open-calendar-mob"><img src="<?=get_template_directory_uri()?>/images/icons/calendar.svg"></a>
						<div class="open-search">
							<img src="<?=get_template_directory_uri()?>/images/icons/search.svg" class="open-search-button">
							<div class="search-form">
								<input id="autoComplete-mob" class="search-form-input" autocomplete="off" placeholder="<?php pll_e('Search')?>" data-lang="<?=pll_current_language()?>"> 
								<div class="close-button">
									<img src="<?=get_template_directory_uri()?>/images/icons/close-button.svg" alt="Close button">
								</div>
							</div>
							
						</div>
						<a href="#"><img src="<?=get_template_directory_uri()?>/images/icons/tickets.svg"></a>
					</div>

						<div class="header-lang">
						<?php pll_the_languages(array('display_names_as'=>'slug','show_names'=>1)); ?>
						</div>


						<div class="header-nav-close">X</div>
					</nav>

					<div class="header-logo">
						<a href="<?=pll_home_url()?>"><img src="<?=get_template_directory_uri()?>/images/logo.svg" alt="Blackmore's Berlins Musikzimmer" class="header-logo-img"></a>
					</div>

					<div class="header-lang">
						<?php pll_the_languages(array('display_names_as'=>'slug','show_names'=>1)); ?>
						</div>

					<div class="header-icons">
						<a href="<?=get_permalink(pll_get_post(81))?>"><img src="<?=get_template_directory_uri()?>/images/icons/favorites.svg"></a>
						<a href="#" class="open-calendar"><img src="<?=get_template_directory_uri()?>/images/icons/calendar.svg"></a>
						<div class="open-search">
							<img src="<?=get_template_directory_uri()?>/images/icons/search.svg" class="open-search-button">
							<div class="search-form">
								<input id="autoComplete-main" class="search-form-input" autocomplete="off" placeholder="<?php pll_e('Search')?>" data-lang="<?=pll_current_language()?>"  > 
								<div class="close-button">
									<img src="<?=get_template_directory_uri()?>/images/icons/close-button.svg" alt="Close button">
								</div>
							</div>
							
						</div>
						<a href="#"><img src="<?=get_template_directory_uri()?>/images/icons/tickets.svg"></a>
					</div>




					<div class="calendar">

						<div class="calendar-header">
						<div class="calendar-header-arrow prev-month"><img src="<?=get_template_directory_uri()?>/images/icons/red-arrow.svg" alt="Prev month"></div>
							<h3 class="calendar-header-title" id="monthAndYear"></h3>
						<div class="calendar-header-arrow next-month"><img src="<?=get_template_directory_uri()?>/images/icons/red-arrow.svg" alt="Prev month"></div>
						</div>

						<table class="calendar-table" id="calendar" data-lang="<?=pll_current_language()?>">
							<thead>
							<tr>
								<th><?php pll_e('Mon')?></th>
								<th><?php pll_e('Tue')?></th>
								<th><?php pll_e('Wed')?></th>
								<th><?php pll_e('Thu')?></th>
								<th><?php pll_e('Fri')?></th>
								<th><?php pll_e('Sat')?></th>
								<th><?php pll_e('Sun')?></th>
							</tr>
							</thead>

							<tbody class="calendar-tbody" id="calendar-body">

							</tbody>
						</table>


						<div class="calendar-events" data-time-icon="<?=get_template_directory_uri()?>/images/icons/time.svg">
							
						</div>

					</div>

			</header>



		</div>




	<?php get_template_part( 'template-parts/slider'); ?>

	<?php get_template_part( 'template-parts/upcoming'); ?>