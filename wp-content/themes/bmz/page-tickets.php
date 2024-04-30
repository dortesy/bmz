<?php get_header(); ?>

<div class="container page-container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <h1 class="section-title">
        <?php the_title()?>
    </h1>

    <div class="tickets">
        
        <div class="tickets-description">
           <?php the_content();?>
        </div>


        <div class="tickets-price">

            <?php foreach (get_field('prices') as $price):?>
                <div class="tickets-price-item">
                    <div class="tickets-price-item-title">
                        <img src="<?=get_template_directory_uri()?>/images/icons/tickets.svg" alt="<?=$price['label']?>" class="tickets-price-item-icon"><?=$price['label']?>
                    </div>

                    <div class="tickets-price-item-subtitle">
                        <?=$price['value']?>
                    </div>
                </div>
            <?php endforeach; ?>
            
        </div>


        <h2><?php pll_e('The seating plan')?></h2>


        <div class="tickets-tabs">
            <div class="tickets-tabs-links">
                <div class="tickets-tabs-link active" data-tab="tab1"><?php pll_e('Concert seating')?></div>
                <div class="tickets-tabs-link" data-tab="tab2"><?php pll_e('Bar seating')?></div>
            </div>

            <div class="tickets-tabs-items">
                <div class="tickets-tabs-item active" data-tab="tab1">
                    <img src="<?php the_field('concert_seating');?>" alt="Tickets" class="tickets-tabs-item-img">
                </div>
    
                <div class="tickets-tabs-item" data-tab="tab2">
                    <img src="<?php the_field('bar_seating');?>" alt="Tickets" class="tickets-tabs-item-img">
                </div>
            </div>
            
        </div>

    </div>

<?php endwhile; endif; ?>    
</div>

<?php get_footer(); ?>