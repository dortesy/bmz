<?php get_header(); ?>


<div class="container page-container">
    <?php while (have_posts()) : the_post(); ?>

<?php 

$next_post = next_prev_post('press', get_the_ID(), 'date', '>');
$prev_post = next_prev_post('press', get_the_ID(), 'date', '<');

?>

    <article class="press" itemtype="http://schema.org/Article">
        <header class="press-header" style="background-image: url(<?=get_the_post_thumbnail_url()?>">

            <div class="press-header-content">
                <h1 class="press-header-title" itemprop="headline"><?php the_title()?></h1>

                <div class="press-header-meta">
                    <div class="press-header-meta-author"><?php the_field('newspaper') ?></div>
                    <div class="press-header-meta-date" itemprop="datePublished"><?=date('d.m.Y', strtotime(get_field('date'))); ?></div>
                </div>

            </div>

            <div class="press-header-arrows">


                <div class="press-header-arrow-container">
                    <?php if($prev_post):?>
                    <a class="press-header-arrow press-header-arrow-prev" href="<?=$prev_post?>">
                        <img src="<?=get_template_directory_uri()?>/images/arrow.svg" alt="Previous press article">
                    </a>
                    <?php endif;?> 
                </div>

                <div class="press-header-arrow-container">
                    <?php if($next_post):?>
                    <a class="press-header-arrow press-header-arrow-next" href="<?=$next_post?>">
                        <img src="<?=get_template_directory_uri()?>/images/arrow.svg" alt="Next press article">
                    </a>
                    <?php endif;?> 
                </div>
                
            </div>
            
        </header>


        <div class="press-content">

            <div class="press-image-meta">
                <?php if (get_field('image_caption')): ?>
                    <div class="press-image-caption"><?php the_field('image_caption')?></div>
                <?php endif; ?>


                <?php if (get_field('image_author')): ?>
                    <div class="press-image-author"><?php the_field('image_author')?></div>
                <?php endif; ?>
                
            </div>

            <div class="press-logo">
                <img src="<?php the_field('newspaper_logo')?>" alt="<?php the_field('newspaper') ?>">
            </div>

            <div class="press-text">
                <?php the_content()?>
            </div>


            <?php 
            $images = get_field('gallery');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if( $images ): ?>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
                <div class="gallery">
                    <?php foreach( $images as $image ): 
                        
                        ?>
                        <div class="gallery-item">
                            <a href="<?=$image['url']?>" data-fancybox="gallery" data-caption="<?=$image['caption']?>"> 
                                <img src="<?=$image['url']?>" alt="<?=$image['caption']?>" >
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

            <?php endif; ?>


            
        </div>
        
    </article>
    <?php endwhile; ?>



</div>


<?php get_footer(); ?>