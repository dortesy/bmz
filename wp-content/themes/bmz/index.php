<?php get_header(); 

$profiles = get_pages(['include' => '5, 12, 37, 39']);

$team_posts = get_pages(['include' => '46, 49, 41, 44']);
// параметры по умолчанию
$press_posts = get_posts( [
	'numberposts' => 2,
	'post_type'   => 'press',
    'orderby'     => 'meta_value_num',
    'meta_key' => 'date',
    'order'       => 'DESC',
] );


?>


<section class="container bmz-home">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.2.5/build/vanilla-calendar.min.css">
<script  src="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.2.5/build/vanilla-calendar.min.js"></script>

    <div class="bmz-home-section">
        
        <h2 class="section-title" id="profile"><?php pll_e('Home Profile') ?></h2>

        <div class="box-container">

            <?php foreach ($profiles as $profile) : ?>

                <div class="box">

                    <div class="box-image">
                        <img src="<?php echo get_the_post_thumbnail_url($profile->ID); ?>" alt="">
                    </div>
                    
                    <div class="box-wrapper">

                        <h2 class="box-title">
                            <?php echo $profile->post_title; ?>
                        </h2>
                
                        <div class="box-collapse-text">
                            <?php echo $profile->post_content; ?>
                        </div>
                
                        <div class="box-collapse-button">
                            <span class="box-collapse-arrow"></span>
                            <span class="box-collapse-button-text">mehr dazu</span>
                        </div>

                    </div>

                </div>
            
            <?php endforeach; ?>

    
          	
        </div>



    </div>


    <div class="bmz-home-section">
        <h2 class="section-title" id="press"><?php pll_e('Home Press') ?></h2>

        <div class="box-container press-boxes">


            <?php foreach ($press_posts as $press_post) : ?>

                <div class="box">
        
                    <div class="box-image">
                    <?php if(get_the_post_thumbnail_url($press_post->ID)): ?>
                        <img src="<?php echo get_the_post_thumbnail_url($press_post->ID); ?>" alt="<?=$press_post->post_title; ?>">
                    <?php endif;?>
                    </div>
                    
                    <div class="box-wrapper">
            
                        <h2 class="box-title">
                            <?=$press_post->post_title; ?>
                        </h2>
            
                        <div class="box-meta">
                            <div class="box-meta-author">
                                <?php echo get_field('newspaper', $press_post->ID); ?>
                            </div>


                            
            
                            <div class="box-meta-date"><?=date('d.m.Y', strtotime(get_field('date', $press_post->ID))); ?></div>
                        </div>
                
                        <div class="box-collapse-text">
                            <?php echo $press_post->post_content; ?>
                        </div>
                
                        <a href="<?php echo get_permalink($press_post->ID); ?>" class="box-button"><?php pll_e('Continue reading') ?></a>
            
                    </div>
            
                </div>

            <?php endforeach; ?>

        </div>

        <div class="section-more">
            <a class="section-more-button" href="<?=get_post_type_archive_link('press')?>">
                <?php pll_e('More') ?>
            </a>
        </div>
    
    </div>
    






    <div class="bmz-home-section team-section">
        
        <h2 class="section-title" id="team"><?php pll_e('Home Team') ?></h2>

        <div class="box-container">


        <?php foreach ($team_posts as $team_post) : ?>

            <div class="box">

                <div class="box-image">
                    <img src="<?php echo get_the_post_thumbnail_url($team_post->ID); ?>" alt="">
                </div>
                
                <div class="box-wrapper">
    
                    <h2 class="box-title">
                        <?php echo $team_post->post_title; ?>
                    </h2>

                    <div class="box-collapse-text">
                        <?php echo $team_post->post_content; ?>
                    </div>
            
                    <div class="box-collapse-button">
                        <span class="box-collapse-arrow"></span>
                        <span class="box-collapse-button-text"><?php pll_e('More on this') ?></span>
                    </div>
            
    
                </div>
            </div>

        <?php endforeach; ?>

         
        </div>


    </div>


</section>


<?php get_footer(); ?>