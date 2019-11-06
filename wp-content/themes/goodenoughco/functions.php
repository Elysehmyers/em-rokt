<?php
function goodco_enqueue_scripts() {

	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

  wp_enqueue_style( 'child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array(),
    filemtime( get_stylesheet_directory() . '/style.css' )
  );

	wp_enqueue_style( 'global',
    get_stylesheet_directory_uri() . '/dist/css/global.css',
    array(),
    filemtime( get_stylesheet_directory() . '/dist/css/global.css' )
  );

	wp_enqueue_style( 'jp-css',
    get_stylesheet_directory_uri() . '/dist/css/jp.css',
    array(),
    filemtime( get_stylesheet_directory() . '/dist/css/jp.css' )
  );

	// Previous includes
	// wp_enqueue_style('lity', get_template_directory_uri() . '/css/lity.css', [], filemtime( get_stylesheet_directory() . '/css/lity.css'));
	wp_enqueue_style('owl', "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css");
	wp_enqueue_style('owl-theme', "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css");
	wp_enqueue_script('owl-slider-js', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), '1');

	//
	// // JS
	// wp_enqueue_script('lity', get_template_directory_uri() . '/js/lity.js', array(), '1');
	// wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/dist/scripts/jquery-3.4.1.js', array(), '1');
	wp_enqueue_script('global', get_stylesheet_directory_uri() . '/dist/scripts/global.js', array('jquery'), '1');
	// wp_enqueue_script('modernizr-js', get_template_directory_uri() . '/js/plugins/modernizr.min.js', array(), '2.8.3');
	//
	// wp_enqueue_script('sticky', get_template_directory_uri() . '/js/sticky.js', array('jquery'), '5');
	//
	// wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/plugins/bootstrap.bundle.js', array('jquery'), '4');
	// wp_enqueue_script('caroufredsel-js', get_template_directory_uri() . '/js/plugins/caroufredsel-6.2.1.js', array('jquery'), '6.2.1');
	// wp_enqueue_script('selectbox', get_template_directory_uri() . '/js/jquery-selectbox.js', array('jquery'), '0.2');
	//
	// wp_enqueue_script('touchwipe-js', get_template_directory_uri() . '/js/plugins/jquery.touchwipe.js', array('jquery'), '1');
	// if (!is_page('Resources')) {
	// 		wp_enqueue_script('scrollify', get_template_directory_uri() . '/js/plugins/jquery.scrollify.min.js', array('jquery'), '1', true);
	// }
	// wp_enqueue_script('aos', get_template_directory_uri() . '/js/plugins/aos.js', array('jquery'), '1', true);
	// wp_enqueue_script('slick', get_template_directory_uri() . '/js/plugins/slick.min.js', array('jquery'), '1', true);
	// wp_enqueue_script('wow', get_template_directory_uri() . '/js/plugins/wow.min.js', array('jquery'), '1', true);
	// wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), filemtime( get_stylesheet_directory() . '/js/main.js'), true);
	//
	// if ( is_front_page()) {
	// 		wp_enqueue_script('app-js', get_template_directory_uri() . '/js/app.js', array('jquery'), filemtime( get_stylesheet_directory() . '/js/app.js'), true);
	// 		wp_enqueue_script('CSSPlugin-js', get_template_directory_uri() . '/js/plugins/CSSPlugin.min.js', array('jquery'), '1', true);
	// 		wp_enqueue_script('EasePack-js', get_template_directory_uri() . '/js/plugins/EasePack.min.js', array('jquery'), '1', true);
	// 		wp_enqueue_script('TweenLite-js', get_template_directory_uri() . '/js/plugins/TweenLite.min.js', array('jquery'), '1', true);
	// 		wp_enqueue_script('TweenMax-js', get_template_directory_uri() . '/js/plugins/TweenMax.min.js', array('jquery'), '1', true);
	// 		wp_enqueue_script('custom-home-js', get_template_directory_uri() . '/js/custom-home.js', array('jquery'), filemtime( get_stylesheet_directory() . '/js/custom-home.js' ), true);
	// }
	//
	// if ( is_page( 'vc-homepage') ) {
	// 		wp_enqueue_script('app-js', get_template_directory_uri() . '/js/app.js', array('jquery'), '1', true);
	// 		wp_enqueue_script('CSSPlugin-js', get_template_directory_uri() . '/js/plugins/CSSPlugin.min.js', array('jquery'), '1', true);
	// 		wp_enqueue_script('EasePack-js', get_template_directory_uri() . '/js/plugins/EasePack.min.js', array('jquery'), '1', true);
	// 		wp_enqueue_script('TweenLite-js', get_template_directory_uri() . '/js/plugins/TweenLite.min.js', array('jquery'), '1', true);
	// 		wp_enqueue_script('TweenMax-js', get_template_directory_uri() . '/js/plugins/TweenMax.min.js', array('jquery'), '1', true);
	// 		wp_enqueue_script('custom-home-js', get_template_directory_uri() . '/js/custom-home.js', array('jquery'), '1', true);
	// }

}
add_action( 'wp_enqueue_scripts', 'goodco_enqueue_scripts', 99 );


function block_frames() {
  header( 'X-FRAME-OPTIONS: SAMEORIGIN' );
}
add_action( 'send_headers', 'block_frames', 10 );

// Allow SVG uploads

function allow_svgimg_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

// Add tags to post meta data
function et_pb_postinfo_meta( $postinfo, $date_format, $comment_zero, $comment_one, $comment_more ){
	$postinfo_meta = '';
	if ( in_array( 'author', $postinfo ) )
		$postinfo_meta .= ' ' . esc_html__( 'by', 'et_builder' ) . ' <span class="author vcard">' . et_pb_get_the_author_posts_link() . '</span>';
	if ( in_array( 'date', $postinfo ) ) {
		if ( in_array( 'author', $postinfo ) ) $postinfo_meta .= ' | ';
		$postinfo_meta .= '<span class="published">' . esc_html( get_the_time( wp_unslash( $date_format ) ) ) . '</span>';
	}
	if ( in_array( 'categories', $postinfo ) ){
		if ( in_array( 'author', $postinfo ) || in_array( 'date', $postinfo ) ) $postinfo_meta .= ' | ';
		$postinfo_meta .= get_the_tag_list( '', ', ' );
		$postinfo_meta .= ' | ';
		$postinfo_meta .= get_the_category_list(', ');
	}
	if ( in_array( 'comments', $postinfo ) ){
		if ( in_array( 'author', $postinfo ) || in_array( 'date', $postinfo ) || in_array( 'categories', $postinfo ) ) $postinfo_meta .= ' | ';
		$postinfo_meta .= et_pb_get_comments_popup_link( $comment_zero, $comment_one, $comment_more );
	}
	return $postinfo_meta;
}

if (!function_exists('get_post_id_by_meta_key_and_value')) {
    /**
     * Get post id from meta key and value
     * @param string $key
     * @param mixed $value
     * @return int|bool
     * @author David M&aring;rtensson <david.martensson@gmail.com>
     */
    function get_post_id_by_meta_key_and_value($key, $value) {
        global $wpdb;
        $meta = $wpdb->get_results("SELECT * FROM `".$wpdb->postmeta."` WHERE meta_key='".$wpdb->escape($key)."' AND meta_value='".$wpdb->escape($value)."'");
        $hide_result = [];

        if (is_array($meta) && !empty($meta) && isset($meta[0])) {

            foreach ($meta as $value) {
                array_push($hide_result, $value->post_id);
            }

        }


            return $hide_result;


    }
}
