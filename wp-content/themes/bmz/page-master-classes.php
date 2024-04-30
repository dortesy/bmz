<?php get_header()?>

<?php 
$masterclasses = get_masterclasses(pll_current_language()); 
$data = $masterclasses['data'];
$images = $masterclasses['images'];

?>



<div class="container page-container">

    <section class="ms-section">

        <h1 class="section-title"><?php the_title()?></h1>

        <div class="ms-section-description">
            <?php the_content();?>
        </div>


        <div class="programm-list">


        <?php foreach ($data as $post): ?>

            <div class="programm-item">

                <div class="programm-item-description">
                    <h2 class="programm-item-title"><?=$post['post_title']?></h2>
                    <div class="programm-item-date"><?= date_i18n('d F Y', strtotime($post['start_date'])).' – '.date_i18n('d F Y', strtotime($post['end_date'])); ?></div>
                    <a class="programm-item-formular" href="https://blackmore-academy.com/wp-content/themes/blackmore-academy/application-form-academy.pdf" target="_blank"><img src="<?=get_template_directory_uri()?>/images/icons/arrow-down.svg" alt="Anmeldeformular"><span><?php pll_e('Application form')?></span></a>
                   
                    <a href="<?=$post['guid']?>" class="programm-item-link" target="_blank"></a>

                </div>


                <div class="programm-item-image">
                    <img src="<?=$images[$post['ID']]['guid']?>" alt="<?=$post['post_title']?>">
                </div>

                <div class="programm-item-more"><?php pll_e('More info') ?></div>

            </div>

        <?php endforeach; ?>



        </div>

    </section>

</div>



<?php get_footer()?>