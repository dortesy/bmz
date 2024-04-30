<?php 
$events_args = array(
	'post_type' => 'events',
	'posts_per_page' => 15,
	'meta_key' => 'event_date',
	'orderby' => 'meta_value',
	'order' => 'ASC',
	'meta_query' => array(
		array(
			'key' => 'event_date',
			'value' => date('Ymd'),
			'compare' => '>=',
			'type' => 'DATE'
		)
	)
);

$events_posts = get_posts($events_args);

?>
		
		
		<section class="container upcoming">
			
			<?php foreach($events_posts as $post):?>
				<?php setup_postdata($post); 
				$datetime = strtotime(get_field('event_date'));
				$day = date_i18n('d', $datetime);
				$month = date_i18n('M', $datetime);
				$content_date = date('Y-m-d', $datetime).'T'.date('H:i', $datetime);
				?>
				<div class="upcoming-event" itemscope itemtype="http://schema.org/Event">	

					<div class="upcoming-event-date">
						<div class="upcoming-event-date-month" itemprop="startDate" content="<?=$content_date?>"><?=$month?></div>
						<div class="upcoming-event-date-day"><?=$day?></div>
					</div>

					<div class="upcoming-event-info">
						<div class="upcoming-event-info-title" itemprop="name"><?php the_title(); ?></div>
					</div>

					<a href="<?php the_permalink(pll_get_post(get_the_ID())); ?>" class="upcoming-event-link" target="_blank" itemprop="url"></a>

				</div>
				<?php wp_reset_postdata(); ?>
			<?php endforeach; ?>

		</section>