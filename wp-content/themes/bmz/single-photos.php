<?php get_header();?>






<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"
/>

<div class="container page-container">
<?php while (have_posts()) : the_post(); ?>
    <h1 class="section-title">
        <?php the_title();?>
    </h1>

    <div class="gallery">
    
    <?php 

        $parent_id = pll_get_post(get_the_ID(), 'de');
        
        $images = get_posts(array(
        'post_parent' => $parent_id,
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'order' => 'ASC',
        'numberposts' => -1,
        ));

        usort($images, "cmp");
     ?>
     
        <?php  foreach($images as $image): ?>
        <div class="gallery-item">
            <a href="<?php echo wp_get_attachment_image_src($image->ID,'full')[0]; ?>" data-fancybox="gallery"> 
                <img src="<?php echo wp_get_attachment_image_src($image->ID,'full')[0]; ?>" alt="<?php the_title()?> <?=$image->post_title?>">
            </a>
        </div>
        <?php endforeach?>

    </div>
<?php endwhile; ?>
</div>


<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>



<?php get_footer();?>