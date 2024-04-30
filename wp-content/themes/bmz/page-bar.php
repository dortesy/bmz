<?php get_header(); ?>

<div class="container page-container">
<?php if (have_posts()) : while (have_posts()) : the_post(); 

$parent_id = pll_get_post(get_the_ID(), 'de');
        
$all_media = get_posts(array(
'post_parent' => $parent_id,
'post_type' => 'attachment',
'post_mime_type' => 'image',
'order' => 'ASC',
'numberposts' => -1,
));

usort($all_media, "cmp");
$media_count = count($all_media) - 1;
?>

    <div class="concert-slider bar-slider">
        <div class="concert-slider-content">
            <div class="concert-slider-item active"><img src="<?=get_the_post_thumbnail_url()?>" alt="<?php the_title()?>" itemprop="image"></div>
            <?php foreach ($all_media as $img ):?>
                <?php if(wp_get_attachment_image_src($img->ID,'full')[0] == get_the_post_thumbnail_url()) continue; ?>
                <div class="concert-slider-item"><img src="<?=wp_get_attachment_image_src($img->ID,'full')[0];?>" alt="<?php the_title()?>" itemprop="image"></div>
            <?php endforeach ?>
        </div>

        <div class="concert-slider-arrows">

            <div class="concert-slider-arrow concert-slider-arrow-left">
                <img src="<?=get_template_directory_uri()?>/images/icons/bar-arrow.svg" alt="Prev">
            </div>

            <div class="concert-slider-arrow concert-slider-arrow-right">
                <img src="<?=get_template_directory_uri()?>/images/icons/bar-arrow.svg" alt="Prev">
            </div>
        
        </div>

        <?php if ($media_count > 0): ?>
            <div class="concert-slider-bullets">
                <div class="concert-slider-bullet active"></div>
                
                <?php for($i = 0; $i < $media_count; $i++): ?>
                <div class="concert-slider-bullet"></div>
                <?php endfor;?>
            </div>
        <?php endif; ?>

        <h1 class="bar-title">
            <?php the_title()?>
        </h1>
    </div>


    <div class="page-content">
        <div class="page-text">
            <?php the_content();?>
        </div>


        <div class="bar-download-container">
            <a class="bar-download" href="<?php the_field('menu_link')?>">
                <img src="<?=get_template_directory_uri()?>/images/icons/arrow-down.svg" alt="Download">
                <span><?php pll_e('Download menu')?></span>
            </a>
        </div>
       
    </div>

<?php endwhile; endif; ?>    
</div>

<?php get_footer(); ?>