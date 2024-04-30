



<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>


<?php 

//media
$all_media = get_attached_media('image', pll_get_post(get_the_ID(), 'de'));
$media_count = count($all_media) - 1;
if(get_field('youtube')) $media_count += 1;



//date
$datetime = strtotime(get_field('event_date'));
$year = date('Y', $datetime);
$day = date_i18n('l', $datetime);
$day_num = date('j', $datetime);
$month = date_i18n('M', $datetime);
$time = date('H:i', $datetime);

$content_date = date('Y-m-d', $datetime).'T'.date('H:i', $datetime);


$next_post = next_prev_post('events', get_the_ID(), 'event_date', '>');
$prev_post = next_prev_post('events', get_the_ID(), 'event_date', '<');




?>


<div class="container page-container" itemscope itemtype="http://schema.org/MusicEvent">
    
    <section class="concert-page">

        <header class="concert-header">

            <div class="concert-prev-container">
                <?php if ($prev_post): ?>
                    <a class="concert-prev" href="<?=$prev_post?>">
                        <img src="<?=get_template_directory_uri()?>/images/icons/red-arrow.svg" alt="Prev concert">
                    </a>
                <?php endif; ?>        
            </div>

            <h1 class="concert-title" itemprop="name"><?php the_title()?></h1>

            <div class="concert-next-container">
                <?php if ($next_post): ?>
                    <a class="concert-next" href="<?=$next_post?>">
                        <img src="<?=get_template_directory_uri()?>/images/icons/red-arrow.svg" alt="Next concert">
                    </a>
                <?php endif; ?>
            </div>

        </header>

        <div class="concert-slider-information">

            <div class="concert-slider">
                <div class="concert-slider-content">
                    <div class="concert-slider-item active"><img src="<?=get_the_post_thumbnail_url()?>" alt="<?php the_title()?>" itemprop="image"></div>

                    <?php foreach ($all_media as $img ):?>
                        <?php if(wp_get_attachment_image_src($img->ID,'full')[0] == get_the_post_thumbnail_url()) continue; ?>
                        <div class="concert-slider-item"><img src="<?=wp_get_attachment_image_src($img->ID,'full')[0];?>" alt="<?php the_title()?>" itemprop="image"></div>
                    <?php endforeach ?>

                    <?php if(get_field('youtube')):?>
                        <div class="concert-slider-item"><iframe width="100%" src="https://www.youtube.com/embed/HjHMoNGqQTI" frameborder="0" allowfullscreen></iframe></div>
                    <?php endif ?>
                </div>

                <?php if ($media_count > 0): ?>
                <div class="concert-slider-arrows">

                    <div class="concert-slider-arrow concert-slider-arrow-left">
                        <img src="<?=get_template_directory_uri()?>/images/icons/slider-arrow.svg" alt="Prev">
                    </div>

                    <div class="concert-slider-arrow concert-slider-arrow-right">
                        <img src="<?=get_template_directory_uri()?>/images/icons/slider-arrow.svg" alt="Prev">
                    </div>
                
                </div>
                <?php endif; ?>

                <?php if ($media_count > 0): ?>
                <div class="concert-slider-bullets">
                    <div class="concert-slider-bullet active"></div>
                    
                    <?php for($i = 0; $i < $media_count; $i++): ?>
                    <div class="concert-slider-bullet"></div>
                    <?php endfor;?>
                </div>
                <?php endif; ?>
            </div>

            <div class="concert-information">

                <div class="concert-date" itemprop="startDate" content="<?=$content_date?>">
                    <div class="concert-date-top">
                        <div class="concert-date-num"><?=$day_num?></div>
                        <div class="concert-date-my">
                            <div class="concert-date-month"><?=$month?></div>
                            <div class="concert-date-year"><?=$year?></div>
                        </div>
                    </div>

                    <div class="concert-date-bottom">
                        <div class="concert-date-day"><?=$day?></div>
                        <div class="concert-date-time"><?=$time?></div>
                    </div>
                </div>
              
                
                <div class="concert-icons">
                <add-to-calendar-button
                    name="<?php the_title()?>"
                    options="'Apple','Google', 'iCal', 'Microsoft365', 'Outlook.com', 'Yahoo'"
                    trigger="click"
                    location="Germany, 14193 Berlin, Warmbrunner Str. 52, BLACKMORE'S – Berlins Musikzimmer"
                    startDate="<?=date('Y-m-d', $datetime)?>"
                    endDate="<?=date('Y-m-d', $datetime)?>"
                    startTime="<?=date('H:i', $datetime)?>"
                    endTime="<?=date('H:i', $datetime + 7200)?>"
                    timeZone="Europe/Berlin"
                    hideTextLabelButton="true"
                    hideIconButton="true"
                    hideBackground="true"
                    buttonStyle="custom"
                    customCss="<?=get_template_directory_uri()?>/css/atcb.css"
                ></add-to-calendar-button>
                    <?php the_favorites_button();?>
                </div>

                <div class="concert-tickets" itemprop="offers" itemscope itemtype="http://schema.org/Offer">

                    <?php foreach (get_field('prices') as $price):?>

                        <div class="concert-tickets-item" itemprop="itemOffered" itemscope itemtype="http://schema.org/Product">
                            <div class="concert-tickets-price" itemprop="price"><?=$price['value']?>,- €</div>
                            <div class="concert-tickets-icon"><img src="<?=get_template_directory_uri()?>/images/icons/concert-tickets.svg" alt="<?=$price['label']?>"></div>
                            <div class="concert-tickets-category" itemprop="name"><?=$price['label']?></div>
                        </div>

                    <?php endforeach; ?>

                </div>

                <a class="concert-button" itemprop="offerUrl" href="<?php the_field('link')?>" target="_blank">Ticketkauf</a>
            </div>

        </div>

        <div class="concert-social">
            <div class="concert-social-item">Share</div>
            <div class="concert-social-item"><a href="https://www.facebook.com/sharer.php?u=<?=get_permalink();?>" itemprop="sameAs" ><img src="<?=get_template_directory_uri()?>/images/social/fb.svg" alt="Share on Facebook"></a></div>
            <span class="concert-social-item-delimiter"></span> 
            <div class="concert-social-item"><a href="#" itemprop="sameAs" ><img src="<?=get_template_directory_uri()?>/images/social/instagram.svg" alt="Share on Instagram"></a></div>
            <span class="concert-social-item-delimiter"></span>
            <div class="concert-social-item"><a href="https://t.me/share/url?url=<?=get_permalink();?>" itemprop="sameAs" ><img src="<?=get_template_directory_uri()?>/images/social/tg.svg" alt="Share on Telegram"></a></div>
            <span class="concert-social-item-delimiter"></span>
            <div class="concert-social-item"><a href="#" class="share-url-link" itemprop="sameAs" ><img src="<?=get_template_directory_uri()?>/images/social/link.svg" alt="Share Link"></a>

            <div class="share-link-text"><?php pll_e('Link copied') ?></div>

            </div>
            <span class="concert-social-item-delimiter"></span>
            <div class="concert-social-item"><a href="#" itemprop="sameAs" ><img src="<?=get_template_directory_uri()?>/images/social/mail.svg" alt="Share via e-mail"></a></div>  
        </div>

        <div class="concert-content">

            <div class="concert-programm-download">
                <div class="concert-programm">
                   <?php the_field('programm')?>
                </div>
            
                <div class="concert-download">

                    <div class="concert-download-title">Herunterladen</div>


                    <div class="concert-download-items">
                        <a class="concert-download-item" itemprop="contentUrl" href="#">
                            <img src="<?=get_template_directory_uri()?>/images/icons/arrow-down.svg" alt="Programm als PDF herunterladen">
                            <span>Programmheft & Anfahrt</span>
                        </a>

                        <a class="concert-download-item" itemprop="contentUrl" href="#">
                            <img src="<?=get_template_directory_uri()?>/images/icons/arrow-down.svg" alt="Programm als PDF herunterladen">
                            <span>Monatsprogramm</span>
                        </a>
                    </div>

                </div>
            </div>
            <div class="concert-text" itemprop="description">
            
            <?php the_content(); ?>
        </div>


    </div>
</section>
</div>

<?php endwhile; ?>

<script src="https://cdn.jsdelivr.net/npm/add-to-calendar-button@2" async defer></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const shareLink = document.querySelector('.share-url-link')
    const shareLinkText = document.querySelector('.share-link-text')
    shareLink.addEventListener('click', (e) => {
        e.preventDefault()
        navigator.clipboard.writeText(window.location.href)
        shareLinkText.classList.add('active')
        setTimeout(() => {
            shareLinkText.classList.remove('active')
        }, 2000)
    })
})  
</script>

<?php get_footer(); ?>