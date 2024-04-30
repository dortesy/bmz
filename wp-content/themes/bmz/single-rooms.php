<?php get_header(); ?>

<div class="container page-container">
<?php if (have_posts()) : while (have_posts()) : the_post(); 

$images = get_field('gallery', pll_get_post(get_the_ID(), 'de'));
$media_count = count($images) - 1;
$size = 'full'; // (thumbnail, medium, large, full or custom size)
?>

    <div class="concert-slider bar-slider">
        <div class="concert-slider-content">
           
            <?php foreach ($images as $key => $image ):?>

                <div class="concert-slider-item <?=($key === array_key_first($images)) ? 'active' : ''?>">
                    <?php if($image['mime_type'] === 'video/mp4'):?>
                        <div class="video-buttons">
                            <div class="video-button video-button-play">
                                <img src="<?=get_template_directory_uri()?>/images/icons/play.svg" alt="Play">
                            </div>
                            <div class="video-button video-button-pause">
                                <img src="<?=get_template_directory_uri()?>/images/icons/pause.svg" alt="Pause">
                            </div>
                        </div>
                        <video>
                            <source src="<?=$image['url']?>" type="video/mp4">
                        </video>
                    <?php else:?>
                        <img src="<?=$image['url']?>" alt="<?php the_title()?>" itemprop="image">
                    <?php endif;?>
                </div>

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

        <h1 class="room-title">
            <?php the_title()?>
        </h1>

        <div class="room-price">
            (<?php the_field('price'); ?><?php pll_e('room_price')?>)
        </div>
    </div>


<?php 
    if(pll_current_language() == 'en') {
        $de = array('Vorname', 'Nachname', 'Tel.', 'Land', 'PLZ', 'Ort', 'Strasse','Names des Kreditkarteninhabers', 'Bitte tragen Sie Ihre Kreditkartennummer ein', 'Gultig bis', 'Senden', 'Kammermusksaal mit 2 Flugel','Ubezimmer klein mit Klavier','Ubezimmer grob mit Klavier', 'Preis');
		$en = array('First name', 'Last name', 'Phone', 'Country', 'Postcode', 'City', 'Street', 'Names of the credit card holder', 'Please enter your credit card number', 'Date of Expiry', 'Send', 'Chamber music hall with 2 piano', 'Small practice room with piano', 'Large practice room with piano', 'Price');
		
		$content = apply_filters( 'the_content', get_post_field('post_content', get_the_ID()) );
		$content = str_replace('\u00fc', 'u', $content);
		$content = str_replace('\u00dc', 'U', $content);
		$content = str_replace('\u00df', 'b', $content);
		$content = str_replace($de, $en, $content);

        echo $content;
    }

    else {
        the_content();
    }
?>




<?php endwhile; endif; ?>    
</div>

<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        function changeInputToSelect() {
            if (document.getElementById('fieldname4_1')) {

                    let cleave = new Cleave('#fieldname9_1', {
                        creditCard: true,
                    });

                    var cleaveDate = new Cleave('#fieldname10_1', {
                        date: true,
                        datePattern: ['m', 'y']
                    });

                    let inputField = document.getElementById("fieldname4_1");
                    let selectField = document.createElement("select");
                    console.log(inputField);
                    selectField.id = inputField.id;
                    selectField.name = inputField.name;
                    selectField.className = inputField.className;

                    let countries = [
                        'Afghanistan',
                        'Åland Islands',
                        'Albania',
                        'Algeria',
                        'American Samoa',
                        'Andorra',
                        'Angola',
                        'Anguilla',
                        'Antarctica',
                        'Antigua and Barbuda',
                        'Argentina',
                        'Armenia',
                        'Aruba',
                        'Australia',
                        'Austria',
                        'Azerbaijan',
                        'Bahamas',
                        'Bahrain',
                        'Bangladesh',
                        'Barbados',
                        'Belarus',
                        'Belgium',
                        'Belize',
                        'Benin',
                        'Bermuda',
                        'Bhutan',
                        'Bolivia',
                        'Bosnia and Herzegovina',
                        'Botswana',
                        'Bouvet Island',
                        'Brazil',
                        'British Indian Ocean Territory',
                        'Brunei Darussalam',
                        'Bulgaria',
                        'Burkina Faso',
                        'Burundi',
                        'Cambodia',
                        'Cameroon',
                        'Canada',
                        'Cape Verde',
                        'Cayman Islands',
                        'Central African Republic',
                        'Chad',
                        'Chile',
                        'China',
                        'Christmas Island',
                        'Cocos (Keeling Islands',
                        'Colombia',
                        'Comoros',
                        'Congo',
                        'Congo, The Democratic Republic of The',
                        'Cook Islands',
                        'Costa Rica',
                        "Cote D'ivoire",
                        'Croatia',
                        'Cuba',
                        'Cyprus',
                        'Czech Republic',
                        'Denmark',
                        'Djibouti',
                        'Dominica',
                        'Dominican Republic',
                        'Ecuador',
                        'Egypt',
                        'El Salvador',
                        'Equatorial Guinea',
                        'Eritrea',
                        'Estonia',
                        'Ethiopia',
                        'Falkland Islands (Malvinas',
                        'Faroe Islands',
                        'Fiji',
                        'Finland',
                        'France',
                        'French Guiana',
                        'French Polynesia',
                        'French Southern Territories',
                        'Gabon',
                        'Gambia',
                        'Georgia',
                        'Germany',
                        'Ghana',
                        'Gibraltar',
                        'Greece',
                        'Greenland',
                        'Grenada',
                        'Guadeloupe',
                        'Guam',
                        'Guatemala',
                        'Guernsey',
                        'Guinea',
                        'Guinea-bissau',
                        'Guyana',
                        'Haiti',
                        'Heard Island and Mcdonald Islands',
                        'Holy See (Vatican City State',
                        'Honduras',
                        'Hong Kong',
                        'Hungary',
                        'Iceland',
                        'India',
                        'Indonesia',
                        'Iran, Islamic Republic of',
                        'Iraq',
                        'Ireland',
                        'Isle of Man',
                        'Israel',
                        'Italy',
                        'Jamaica',
                        'Japan',
                        'Jersey',
                        'Jordan',
                        'Kazakhstan',
                        'Kenya',
                        'Kiribati',
                        "Korea, Democratic People's Republic of",
                        'Korea, Republic of',
                        'Kuwait',
                        'Kyrgyzstan',
                        "Lao People's Democratic Republic",
                        'Latvia',
                        'Lebanon',
                        'Lesotho',
                        'Liberia',
                        'Libyan Arab Jamahiriya',
                        'Liechtenstein',
                        'Lithuania',
                        'Luxembourg',
                        'Macao',
                        'Macedonia, The Former Yugoslav Republic of',
                        'Madagascar',
                        'Malawi',
                        'Malaysia',
                        'Maldives',
                        'Mali',
                        'Malta',
                        'Marshall Islands',
                        'Martinique',
                        'Mauritania',
                        'Mauritius',
                        'Mayotte',
                        'Mexico',
                        'Micronesia, Federated States of',
                        'Moldova, Republic of',
                        'Monaco',
                        'Mongolia',
                        'Montenegro',
                        'Montserrat',
                        'Morocco',
                        'Mozambique',
                        'Myanmar',
                        'Namibia',
                        'Nauru',
                        'Nepal',
                        'Netherlands',
                        'Netherlands Antilles',
                        'New Caledonia',
                        'New Zealand',
                        'Nicaragua',
                        'Niger',
                        'Nigeria',
                        'Niue',
                        'Norfolk Island',
                        'Northern Mariana Islands',
                        'Norway',
                        'Oman',
                        'Pakistan',
                        'Palau',
                        'Palestinian Territory, Occupied',
                        'Panama',
                        'Papua New Guinea',
                        'Paraguay',
                        'Peru',
                        'Philippines',
                        'Pitcairn',
                        'Poland',
                        'Portugal',
                        'Puerto Rico',
                        'Qatar',
                        'Reunion',
                        'Romania',
                        'Russian Federation',
                        'Rwanda',
                        'Saint Helena',
                        'Saint Kitts and Nevis',
                        'Saint Lucia',
                        'Saint Pierre and Miquelon',
                        'Saint Vincent and The Grenadines',
                        'Samoa',
                        'San Marino',
                        'Sao Tome and Principe',
                        'Saudi Arabia',
                        'Senegal',
                        'Serbia',
                        'Seychelles',
                        'Sierra Leone',
                        'Singapore',
                        'Slovakia',
                        'Slovenia',
                        'Solomon Islands',
                        'Somalia',
                        'South Africa',
                        'South Georgia and The South Sandwich Islands',
                        'Spain',
                        'Sri Lanka',
                        'Sudan',
                        'Suriname',
                        'Svalbard and Jan Mayen',
                        'Swaziland',
                        'Sweden',
                        'Switzerland',
                        'Syrian Arab Republic',
                        'Taiwan, Province of China',
                        'Tajikistan',
                        'Tanzania, United Republic of',
                        'Thailand',
                        'Timor-leste',
                        'Togo',
                        'Tokelau',
                        'Tonga',
                        'Trinidad and Tobago',
                        'Tunisia',
                        'Turkey',
                        'Turkmenistan',
                        'Turks and Caicos Islands',
                        'Tuvalu',
                        'Uganda',
                        'Ukraine',
                        'United Arab Emirates',
                        'United Kingdom',
                        'United States',
                        'United States Minor Outlying Islands',
                        'Uruguay',
                        'Uzbekistan',
                        'Vanuatu',
                        'Venezuela',
                        'Viet Nam',
                        'Virgin Islands, British',
                        'Virgin Islands, U.S.',
                        'Wallis and Futuna',
                        'Western Sahara',
                        'Yemen',
                        'Zambia',
                        'Zimbabwe'
                        // Add more countries as needed
                    ];

                    for (let i = 0; i < countries.length; i++) {
                        let option = document.createElement("option");
                        option.value = countries[i];
                        option.text = countries[i];
                        selectField.appendChild(option);
                    }

                    inputField.parentNode.replaceChild(selectField, inputField);
            } else {
                setTimeout(changeInputToSelect, 1500);
            }
        }

        changeInputToSelect();

     

})  
</script>

<?php get_footer(); ?>