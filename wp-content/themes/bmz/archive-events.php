<?php get_header();  ?>



<div class="container page-container">

    <section class="programm-page page-section" itemscope itemtype="http://schema.org/Event">

        <div class="programm-page-description">
            <h1 class="section-title"><?php pll_e('Program') ?></h1>

            <div class="programm-page-description-right">
                <h4 class="section-subtitle"><?php pll_e('Download') ?></h4>

                <a class="programm-page-download" href="#" itemprop="url">
                    <img src="<?=get_template_directory_uri()?>/images/icons/arrow-down.svg" alt="<?php pll_e('Monthly program') ?>">
                    <span><?php pll_e('Monthly program') ?></span>
                </a>
            </div>
          
        </div>

        <div class="programm-list">
   
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <?php $datetime = strtotime(get_field('event_date'))?>
        

            <div class="programm-item" itemscope itemtype="http://schema.org/MusicEvent">

                <div class="programm-item-description">
                    <h2 class="programm-item-title" itemprop="name"><?php the_title()?></h2>
                    <div class="programm-item-date" itemprop="startDate" content="<?=date('Y-m-d', $datetime).'T'.date('H:i', $datetime)?>"><?=date_i18n('D, j. M Y - H:i', $datetime)?></div>
                    <?php the_favorites_button();?>
                    <a href="<?=get_permalink(); ?>" class="programm-item-link" itemprop="url"></a>
                </div>


                <div class="programm-item-image">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title()?>" itemprop="image">
                </div>

                <div class="programm-item-more"><?php pll_e('More') ?></div>

            </div> 
          

            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
             <?php endif; ?>

        </div>

</section>

</div>


<?php get_footer(); ?>