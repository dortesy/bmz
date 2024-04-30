<?php get_header();  ?>



<div class="container page-container">
    <section class="page-wrapper press-container">

        <h1 class="section-title"><?php pll_e('Home Press') ?></h1>

        <div class="box-container press-boxes">
   
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="box">

                <div class="box-image">
                    <?php if(get_the_post_thumbnail_url()): ?>
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title()?>">
                    <?php endif; ?>
                </div>
                
                <div class="box-wrapper">

                    <h2 class="box-title">
                        <?php the_title() ?>
                    </h2>

                    <div class="box-meta">
                        <div class="box-meta-author">
                            <?=get_field('newspaper'); ?>
                        </div>

                        <div class="box-meta-date"><?=date('d.m.Y', strtotime(get_field('date'))); ?></div>
                    </div>

                    <div class="box-collapse-text">
                        <?php the_excerpt(); ?>
                    </div>

                    <a href="<?=get_permalink(); ?>" class="box-button"><?php pll_e('Continue reading') ?></a>

                </div>

            </div>

            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
             <?php endif; ?>

        </div>
</section>
</div>


<?php get_footer(); ?>