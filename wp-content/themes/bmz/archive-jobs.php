<?php get_header();  ?>



<div class="container page-container">
    <section class="page-wrapper press-container">

        <h1 class="section-title"><?php post_type_archive_title() ?></h1>

        <div class="box-container">


            
   
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="box">

                <div class="box-image">
                    <img src="<?=get_the_post_thumbnail_url(); ?>" alt="<?php the_title() ?>">
                </div>

                <div class="box-wrapper">

                    <h2 class="box-title">
                    <?php the_title() ?>
                    </h2>

                    <div class="box-collapse-text">
                        <?php the_content()?>
                    </div>

                    <div class="box-collapse-button">
                        <span class="box-collapse-arrow"></span>
                        <span class="box-collapse-button-text"><?php pll_e('More on this') ?></span>
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