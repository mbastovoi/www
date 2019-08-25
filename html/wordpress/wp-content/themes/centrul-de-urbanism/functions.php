
<?php  
function urbanism_files(){
	wp_enqueue_script('urbanism-js', get_theme_file_uri('/script.js'), NULL, '1.0', true);
	wp_enqueue_style('google-fonts','https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,400i,500i,700|Ubuntu:200,300,400,500,600,700&display=swap', false);

    if ( is_front_page() ) {
        wp_enqueue_script( 'urbanism-front-js', get_theme_file_uri('/script2.js'), NULL, '1.0', true );
    }

}
add_action('wp_head', 'wpb_hook_javascript');

//add_filter( 'wpseo_remove_reply_to_com', '__return_false' );


function custom_short_excerpt($excerpt){
    $limit = 300;

    if (strlen($excerpt) > $limit) {
        return substr($excerpt, 0, strpos($excerpt, ' ', $limit));
    }

    return $excerpt;
}

add_filter('the_excerpt', 'custom_short_excerpt');


if( !defined(THEME_IMG_PATH)){
    define( 'THEME_IMG_PATH', get_stylesheet_directory_uri() . '/images' );
}

//Stop wp from resizing thumbnails

function remove_img_attr ($html) {
    return preg_replace('/(width|height)="\d+"\s/', "", $html);
}

add_filter( 'post_thumbnail_html', 'remove_img_attr' );


add_action('wp_enqueue_scripts', 'urbanism_files');

// Add featured image support
add_theme_support( 'post-thumbnails' );
add_image_size('norm-thumbnail',500, 300, true);
add_image_size('banner-image', 920, 400, true);
add_image_size('small-thumbnail',300, 300, true);




add_action('init', 'cu_post_types');
?>