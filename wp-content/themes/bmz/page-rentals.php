<?php get_header(); ?>

<div class="container page-container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <h1 class="section-title">
        <?php the_title()?>
    </h1>

    <div class="page-content">

        <div class="page-text">
            <?php the_content();?>
        </div>

        <div class="rental-container">

            <?php foreach (get_field('boxes') as $box) : ?>

                <div class="rental-box">
                        <div class="rental-box-image">
                            <img src="<?=$box['image']?>" alt="<?=$box['title']?>">

                            <div class="rental-box-description">
                                <h3 class="rental-box-title">
                                    <?=$box['title']?>
                                </h3>

                                <div class="rental-box-date"><?=$box['date']?></div>
                            </div>
                        </div>
                </div>

            <?php endforeach; ?>

        </div>

        <div class="rental-contact">
            <h2 class="rental-subtitle"><?php the_field('contact_title')?></h2>

            <p><?php the_field('contact_name')?></p>
                
            
            <ul class="rental-contact-list">
                <li><img src="<?=get_template_directory_uri()?>/images/icons/location.svg" alt="Location"><?php the_field('contact_location')?></li>
                <li><img src="<?=get_template_directory_uri()?>/images/icons/phone.svg" alt="Phone"><?php the_field('contact_phone')?></li>
                <li><img src="<?=get_template_directory_uri()?>/images/icons/website.svg" alt="Website"><a href="mailto:kontakt@blackmores-musikzimmer.de"></a><?php the_field('contact_website')?></li>
            </ul>


        </div>

    </div>

<?php endwhile; endif; ?>    
</div>

<?php get_footer(); ?>