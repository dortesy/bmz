<?php get_header(); ?>

<div class="container page-container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <h1 class="section-title">
        <?php the_title()?>
    </h1>

    <div class="page-content">
        <?php the_content();?>
    </div>


<?php endwhile; endif; ?>    
</div>

<?php get_footer(); ?>