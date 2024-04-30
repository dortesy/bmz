<?php 
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );

function mytheme_custom_excerpt_length( $length ) {
  return 25;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function create_post_type() {
    register_post_type( 'press',
      array(
        'labels' => array(
          'name' => __( 'Press' ),
          'singular_name' => __( 'Press' )
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => get_template_directory_uri() .'/images/menu/press.png',
        'show_in_rest'       => true,
        'supports'            => [ 'title', 'editor', 'thumbnail'],
      )
    );


    register_post_type( 'events',
      array(
        'labels' => array(
          'name' => __( 'Programm' ),
          'singular_name' => __( 'Event' )
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => get_template_directory_uri() .'/images/menu/events.png',
        'show_in_rest'       => true,
        'supports'            => [ 'title', 'editor', 'thumbnail'],
      )
    );

    register_post_type( 'photos',
      array(
        'labels' => array(
          'name' => __( 'Gallery' ),
          'singular_name' => __( 'Gallery' )
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => get_template_directory_uri() .'/images/menu/gallery.png',
        'show_in_rest'       => true,
        'supports'            => [ 'title', 'editor', 'thumbnail'],
      )
    );

    register_post_type( 'exhibition',
    array(
      'labels' => array(
        'name' => __( 'Exhibition' ),
        'singular_name' => __( 'Exhibition' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => get_template_directory_uri() .'/images/menu/exhibition.png',
      'show_in_rest'       => true,
      'supports'            => [ 'title', 'editor', 'thumbnail'],
    )
  );

    register_post_type( 'jobs',
    array(
      'labels' => array(
        'name' => __( 'Jobs' ),
        'singular_name' => __( 'job' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => get_template_directory_uri() .'/images/menu/jobs.png',
      'show_in_rest'       => true,
      'supports'            => [ 'title', 'editor', 'thumbnail'],
    )
  );

  register_post_type( 'rooms',
    array(
      'labels' => array(
        'name' => __( 'Rooms' ),
        'singular_name' => __( 'Room' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => get_template_directory_uri() .'/images/menu/rooms.png',
      'show_in_rest'       => true,
      'supports'            => [ 'title', 'editor', 'thumbnail'],
    )
  );


  }


function theme_register_nav_menu() {
  register_nav_menu( 'primary', 'Primary Menu' );
  register_nav_menu( 'footer_1', 'Footer 1' );
  register_nav_menu( 'footer_2', 'Footer 2' );
  register_nav_menu( 'footer_3', 'Footer 3' );
  register_nav_menu( 'footer_4', 'Footer 4' );
}

// add_filter( 'nav_menu_css_class', 'change_menu_item_class', 10, 3 );

// function change_menu_item_class( $classes, $item, $args ) {
//     if ( $args->theme_location == 'primary' ) {
//         if ( in_array( 'menu-item-has-children', $classes ) ) {
//             $classes[] = 'header-nav-parent';
//             $key = array_search( 'menu-item-has-children', $classes );
//             unset( $classes[ $key ] );
//         }
//     }
//     return $classes;
// }

add_filter( 'nav_menu_css_class', 'add_child_item_class', 10, 3 );

function add_child_item_class( $classes, $item, $args ) {
    if ( $args->theme_location == 'primary' ) {
        if ( $item->menu_item_parent == 0 ) {
            $classes[] = 'header-nav-parent';
        } else {
            $classes[] = 'header-nav-child';
        }
    }
    return $classes;
}


function my_nav_menu_submenu_css_class( $classes ) {
    $classes[] = 'header-nav-children';
   return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'my_nav_menu_submenu_css_class' );

function add_additional_class_on_li($classes, $item, $args) {
  if(isset($args->add_li_class)) {
      $classes[] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


function add_specific_menu_location_atts( $atts, $item, $args ) {
  // check if the item is in the primary menu
  if( $args->menu == 'primary' ) {
    // add the desired attributes:
    $atts['class'] = 'header-nav-item-link';
  }
  return $atts;
}


add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );

add_action( 'after_setup_theme', 'theme_register_nav_menu' );



add_action( 'init', 'create_post_type' );

function enable_svg_upload( $upload_mimes ) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter( 'upload_mimes', 'enable_svg_upload', 10, 1 );



//Events
add_action( 'pre_get_posts', function ( $query ) {
	if ( $query->is_archive() && $query->is_main_query() ) { 
	  if ( get_query_var( 'post_type' ) == 'events' ) { 
    $query->set( 'meta_key', 'event_date');
		$query->set( 'order', 'ASC' );
		$query->set( 'orderby', 'meta_value' );
	  };
	};
} );


// Master Classes
function get_masterclasses($lang){

  if($lang == 'en'){
    $term_id = 23;
  }else{
    $term_id = 32;
  }

  $db = new mysqli('blackmore-academy.com', 'd038c6a1', 'c8KKeHpcsRdKbtTF', 'd038c6a1');
  $db->query('SET character_set_results=utf8');
  
  $result = $db->query("SELECT wp_posts.*, mt1.meta_value AS start_date, mt2.meta_value as end_date
  FROM wp_posts
  LEFT JOIN wp_term_relationships
  ON (wp_posts.ID = wp_term_relationships.object_id)
  INNER JOIN wp_postmeta
  ON ( wp_posts.ID = wp_postmeta.post_id )
  INNER JOIN wp_postmeta AS mt1
  ON ( wp_posts.ID = mt1.post_id )
  INNER JOIN wp_postmeta AS mt2
  ON ( wp_posts.ID = mt2.post_id )
  WHERE 1=1
  AND ( wp_term_relationships.term_taxonomy_id IN ($term_id) )
  AND ( wp_postmeta.meta_key = 'start_date'
  AND ( mt1.meta_key = 'start_date'
  AND CAST(mt1.meta_value AS DATE) >= NOW() ) )
  AND wp_posts.post_type = 'product'
  AND ((wp_posts.post_status = 'publish'))
  AND mt2.meta_key = 'end_date'
  GROUP BY wp_posts.ID
  ORDER BY wp_postmeta.meta_value ASC
  ");
  
  $data = $result->fetch_all(MYSQLI_ASSOC);
  
  $ids = array_map(function($item) {
      return $item['ID'];
  }, $data);
  

  $attachments = $db->query("SELECT wp_posts.*
  FROM wp_posts
  WHERE wp_posts.post_parent IN (".implode(',',$ids).")
  AND wp_posts.post_type = 'attachment'
  GROUP BY wp_posts.ID
  ");
  

  
  $images_assoc = $attachments->fetch_all(MYSQLI_ASSOC);
  $images = [];
  foreach ($images_assoc as $key => $value) {
    $images[$value['post_parent']] = $value;
  }

  return [
    'data' => $data,
    'images' => $images
  ];
}


//Gallery
//sort images by numeric title - 1,2,3,4 etc
function cmp($a, $b)
{
    return (int)$a->post_title - (int)$b->post_title;
}


function footer_menu($n) {
	$args = [
    'theme_location'  => "footer_$n",
    'menu' => "footer_$n",
    'container'       => false,
    'menu_class'      => 'footer-nav-list',
    'add_li_class'		=> 'footer-nav-item',
  ] ;

  wp_nav_menu( $args );
}





//events order query
function custom_query_args( $query ) {
  if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'events' ) ) {
      $query->set( 'posts_per_page', -1 );
      $query->set( 'orderby', 'event_date' );
      $query->set( 'order', 'ASC' );
      $query->set( 'meta_query', array(
          array(
              'key' => 'event_date',
              'value' => date('Ymd'),
              'compare' => '>=',
              'type' => 'DATE'
          )
      ));
  }
}
add_action( 'pre_get_posts', 'custom_query_args' );


//events order query
function custom_query_args_press( $query ) {
  if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'press' ) ) {
      $query->set( 'meta_key', 'date');
      $query->set( 'orderby', 'meta_value' );
      $query->set( 'order', 'DESC' );
      $query->set( 'posts_per_page', 9 );
  }
}
add_action( 'pre_get_posts', 'custom_query_args_press' );


//search

// function add_event_date_to_posts($data, $post, $request) {
//   $_data = $data->data;
//   $event_date = get_field($post->ID, 'event_date');
//   $_data['event_date'] = $event_date;
//   $data->data = $_data;
//   return $data;
// }

// add_filter('rest_prepare_post', 'add_event_date_to_posts', 10, 3);

function order_posts_by_event_date($query) {
  if (!is_admin() && $query->is_main_query() && $query->get('post_type') === 'events') {
      $query->set('orderby', 'meta_value');
      $query->set('meta_key', 'event_date');
      $query->set('order', 'ASC');
  }
}

function custom_api_search() {
  register_rest_route('bmz/v1', '/search', array(
      'methods' => 'GET',
      'callback' => 'my_search_results',
  ));
}

function my_search_results($data) {
  add_action('pre_get_posts', 'order_posts_by_event_date');

  if($data['lang'] == 'de') {
    switch_to_locale('de_DE');
  } else {
    switch_to_locale('en_GB');
  }

  if($data['calendar'] == 1) {
    $calendar = true;
  } else {
    $calendar = false;
  }

  $query = new WP_Query(array(
      's' => $data['search'],
      'post_type' => 'events',
      'posts_per_page' => -1,
      'meta_key' => 'event_date',
      'orderby' => 'meta_value',
      'order' => 'ASC',
      'meta_query' => array(
        array(
          'key' => 'event_date',
          'value' => date('Ymd'),
          'compare' => '>=',
          'type' => 'DATE'
        )
      )
  ));

  $response = [];

  
  foreach($query->posts as $post) {
    $datetime = strtotime(get_field('event_date', $post->ID));

    if($calendar) {
      $response[date('Y-n-d H:i', $datetime)] = [
        $post->post_title,
        get_permalink($post->ID),
        date('H:i', $datetime),
        get_the_post_thumbnail_url($post->ID, 'full')
      ];
    } else {
      $response[] = [
        $post->post_title,
        date_i18n('D, j. M Y - H:i', $datetime),
        get_permalink($post->ID),
      ];
    }
   
  }

  ksort($response);

  remove_action('pre_get_posts', 'order_posts_by_event_date');
  return $response;

}

add_action('rest_api_init', 'custom_api_search');


//OTHER FUNCTIONS

//next_prev_post

function next_prev_post($post_type, $post_id, $field, $compare) {

  if($compare == '>') {
    $order = 'ASC';
  } else {
    $order = 'DESC';
  }

  $args = [
      'post_type' => $post_type,
      'numberposts' => 1,
      'order' => $order,
      'orderby' => $field,
      'exclude' => $post_id,
      'meta_query' => array(
          array(
              'key'     =>  $field,
              'value'   => get_field($field, $post_id),
              'compare' => $compare,
          )
      )
  ];

  if($post_type != 'events') $args['meta_query'][0]['type'] = 'DATE';
  
  $post = get_posts( $args );

  if($post) return get_permalink($post[0]->ID);
      
  return false;

}


//return content_date for events




//Newsletter
function subscribe_sendinblue()
{

	if (empty($_POST) || !check_ajax_referer('subscribe_sendinblue', 'security')) wp_send_json_error();

	$email = $_POST['email'];
  $name = $_POST['name'];
	$curl = curl_init();
	$urlemail = urlencode($email);

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.sendinblue.com/v3/contacts/$urlemail",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"accept: application/json",
			"api-key: API_KEY"
		),
	));
	

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);	

	
	
	$encodedResponse = json_decode($response);
	
	
	if($encodedResponse->listIds) {
		if (in_array(25, $encodedResponse->listIds)) {
			echo json_encode(array('exist' => true));
			wp_die();
		}
	}
	

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.sendinblue.com/v3/contacts",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "{\"email\":\"$email\",\"attributes\":{\"FIRSTNAME\":\"$name\"},\"listIds\":[25],\"updateEnabled\":true}",
		CURLOPT_HTTPHEADER => array(
			"accept: application/json",
			"api-key: API_KEY",
			"content-type: application/json"
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
		wp_die();
	} else {
		echo true;
		wp_die();
	}
}

add_action('wp_ajax_nopriv_subscribe_sendinblue', 'subscribe_sendinblue');
add_action('wp_ajax_subscribe_sendinblue', 'subscribe_sendinblue');



//booking
function dequeue_booking_css() {
  wp_dequeue_style('cpapp-calendarstyle');
  wp_deregister_style('cpapp-publicstyle');
}

add_action('wp_enqueue_scripts','dequeue_booking_css',100);

//TRANSLATION

//Home Page
pll_register_string( 'home_press', 'Home Press');
pll_register_string( 'home_profile', 'Home Profile');
pll_register_string( 'home_team', 'Home Team');
pll_register_string( 'continue_reading', 'Continue reading');
pll_register_string( 'more_on_this', 'More on this');
pll_register_string( 'more', 'More');


//Programm
pll_register_string( 'program', 'Program');
pll_register_string( 'program_download', 'Download');
pll_register_string( 'program_monthly', 'Monthly program');
pll_register_string( 'favorites', 'Favorites');


//Event
pll_register_string( 'link_copied', 'Link copied');


//Master Classes
pll_register_string( 'application_form', 'Application form');
pll_register_string( 'more_info', 'More info');


pll_register_string( 'gallery', 'Gallery');


//Tickets
pll_register_string( 'seating_plan', 'The seating plan');
pll_register_string( 'concert_seating', 'Concert seating');
pll_register_string( 'bar_seating', 'Bar seating');

//bar
pll_register_string( 'download_menu', 'Download menu');


//search
pll_register_string( 'search', 'Search');
pll_register_string( 'search_no_events', 'No events found');


//newsletter
pll_register_string( 'newsletter_title', 'Subscribe to our newsletter');
pll_register_string( 'newsletter_email', 'E-mail address');
pll_register_string( 'newsletter_button', 'Subscribe');
pll_register_string( 'newsletter_agree', "I agree to receive emails about upcoming concerts at BLACKMORE'S – Berlins Musikzimmer");
pll_register_string( 'newsletter_desc_1', 'newsletter_desc_1');
pll_register_string( 'newsletter_desc_2', 'newsletter_desc_2');


//calendar
pll_register_string('calendar_sun', 'Sun');
pll_register_string('calendar_mon', 'Mon');
pll_register_string('calendar_tue', 'Tue');
pll_register_string('calendar_wed', 'Wed');
pll_register_string('calendar_thu', 'Thu');
pll_register_string('calendar_fri', 'Fri');
pll_register_string('calendar_sat', 'Sat');


//Rooms Price
pll_register_string('room_price', 'room_price');
pll_register_string('room_title', 'room_title');

?>