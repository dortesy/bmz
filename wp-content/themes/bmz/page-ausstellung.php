<?php get_header(); ?>

<?php 

$args = [
    'post_type' => 'exhibition',
    'numberposts' => -1,
];

$arts = get_posts( $args );
?>

<div class="container page-container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <h1 class="section-title">
        <?php the_title()?>
    </h1>

    <div class="page-content">
        <div class="page-text">
            <?php the_content();?>
        </div>
    </div>

    <div class="art">

        <?php foreach($arts as $index => $art): ?>
            <?php $index = $index + 1; ?> 
            <div class="art-item <?=($index % 2 == 0) ? 'odd' : 'even'?>">
                <div class="art-item-image">
                    <img src="<?=get_the_post_thumbnail_url($art->ID)?>" alt="<?=$art->post_title?>">
                </div>

                <h2 class="art-item-title"><?=$art->post_title?></h2>

                <div class="art-item-description">
                    <div class="art-item-meta">
                        <div class="art-item-year-price">
                            <?php if(get_field('year', $art->ID)): ?>
                                <span class="art-item-year"><?=get_field('year', $art->ID)?></span>
                            <?php endif; ?>
                            <span class="art-item-price"><?=get_field('price', $art->ID)?> €</span>
                        </div>
                        <div class="art-item-author"><?=get_field('author', $art->ID)?></div>
                    </div>

                    <div class="art-item-text">
                        <?=$art->post_content?>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
        
    </div>

<?php endwhile; endif; ?>    
</div>

<?php get_footer(); ?>