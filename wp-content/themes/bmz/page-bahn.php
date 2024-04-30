<?php get_header(); ?>


<div class="container page-container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <h1 class="section-title">
        <?php the_title()?>
    </h1>


    <div class="bahn">
        <div class="bahn-intro">
            <?php the_content();?>
        </div>

        <div class="bahn-boxes">

        <?php foreach (get_field('boxes') as $box) : ?>

        <div class="bahn-box">
                <div class="bahn-box-image" style="background-image: url('<?=$box['box_image']?>')"></div>

                <div class="bahn-box-description">
                    <div class="bahn-box-title">
                        <?=$box['box_title']?>
                    </div>

                    <div class="bahn-box-text">
                        <?=$box['box_description']?>
                    </div>
                </div>
        </div>

        <?php endforeach; ?>

         
        </div>
        
        <div class="bahn-content">

            <?php the_field('second_content')?>
          
        </div>

    </div>

    


<?php endwhile; endif; ?>    
</div>

<?php get_footer(); ?>