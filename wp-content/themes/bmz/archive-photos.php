<?php get_header();  ?>



<div class="container page-container">
    <section class="page-wrapper press-container">

        <h1 class="section-title"><?php pll_e('Gallery') ?></h1>

        <div class="gallery-list">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="gallery-box">
            
            <div class="gallery-box-image">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title()?>">
            </div>
                <div class="gallery-box-description">
                    <h3 class="gallery-box-title">
                        <?php the_title()?>
                    </h3>

                    <div class="gallery-box-text">
                        <?php the_excerpt(10); ?>
                    </div>

                    <div class="gallery-box-date"><?php the_field('date')?></div>

                    <a href="<?php the_permalink()?>" class="gallery-box-link"></a>

                    <div class="gallery-box-button">
                    <?php pll_e('More') ?>
                    </div>
                </div>
        </div>

            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
             <?php endif; ?>

        </div>
</section>
</div>


<?php get_footer(); ?>