<?php get_header();  ?>

<div class="container page-container">

    <h1 class="section-title">
    <?php pll_e('room_title')?>
    </h1>

    <div class="practice">
        <div class="practice-description">
           
        </div>

        <div class="practice-boxes">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="practice-box">
                <div class="practice-box-image" style="background-image: url(<?=get_field('gallery', pll_get_post(get_the_ID(), 'de'))[0]['url']?>)"></div>

                <div class="practice-box-description">
                    <div class="practice-box-title"><?php the_title()?></div>
                    <div class="practice-box-price">(<?php the_field('price')?><?php pll_e('room_price')?>)</div>
                    <a href="<?php the_permalink()?>" class="practice-box-link"><?php pll_e('More')?></a>
                </div>
       
            </div>

        <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
        </div>

    </div>
</div>







<?php get_footer(); ?>