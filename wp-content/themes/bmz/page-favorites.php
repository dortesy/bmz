<?php get_header();  ?>

<?php 
$favorite_list = get_user_favorites();

$args = array(
    'post_type' => 'events',
    'post__in' => $favorite_list,
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

$posts = get_posts($args);

?>



<div class="container page-container">

    <section class="page-wrapper press-container" itemscope itemtype="http://schema.org/Event">

        <h1 class="section-title"><?php pll_e('Favorites') ?></h1>

        <?php if($favorite_list): ?>
        <div class="programm-list">
   
        <?php foreach ($posts as $post):?>
        
        <?php $datetime = strtotime(get_field('event_date', $post->ID))?>
        

            <div class="programm-item" itemscope itemtype="http://schema.org/MusicEvent">

                <div class="programm-item-description">
                    <h2 class="programm-item-title" itemprop="name"><?php the_title()?></h2>
                    <div class="programm-item-date" itemprop="startDate" content="<?=date('Y-m-d', $datetime).'T'.date('H:i', $datetime)?>"><?=date_i18n('D, j. M Y - H:i', $datetime)?></div>
                    <?php the_favorites_button();?>
                    <a href="<?=get_permalink($post->ID); ?>" class="programm-item-link" itemprop="url"></a>
                </div>


                <div class="programm-item-image">
                    <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="<?php the_title()?>" itemprop="image">
                </div>

                <div class="programm-item-more"><?php pll_e('More') ?></div>

            </div> 
          
        <?php endforeach;?>
        </div>

        <?php else:?>
                <h4>Favoritenliste ist leer</h4>
        <?php endif;?>
        

</section>

</div>



<?php get_footer(); ?>