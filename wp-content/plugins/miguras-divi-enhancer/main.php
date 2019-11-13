<?php
/*
Plugin Name: DIVI Enhancer
Plugin URI: https://miguras.com/divi_enhancer
Description: Add custom modules and options to DIVI
Version: 4.2
Author: Miguras
Author URI: https://miguras.com
License: GPLv2 or later
License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain: divienhancer
Domain Path: /languages
*/

// Create a helper function for easy SDK access.
function demg() {
    global $demg;

    if ( ! isset( $demg ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/freemius/start.php';

        $demg = fs_dynamic_init( array(
            'id'                  => '2539',
            'slug'                => 'miguras-divi-enhancer',
            'type'                => 'plugin',
            'public_key'          => 'pk_38e4349d274180e479a9982a0aef2',
            'is_premium'          => false,
            'has_addons'          => true,
            'has_paid_plans'      => false,
            'menu'                => array(
                'slug'           => 'divienhancerdashboard',
                'first-path'     => 'admin.php?page=divienhancerdashboard',
                'support'        => false,
            ),
        ) );
    }

    return $demg;
}

// Init Freemius.
demg();
// Signal that SDK was initiated.
do_action( 'demg_loaded' );

//plugin starts

function divienhancer_freemius_message(
    $message,
    $user_first_name,
    $product_title,
    $user_login,
    $site_link,
    $freemius_link
)
{
      return sprintf(
        __( 'Hey %1$s', 'divienhancer' ) . ',<br>' .
        __( 'Help me improve %2$s to provide you more and better features on next update - opt in to our security & feature updates notifications, and non-sensitive diagnostic tracking with %5$s', 'divienhancer' ),
        $user_first_name,
        '<b>' . $product_title . '</b>',
        '<b>' . $user_login . '</b>',
        $site_link,
        $freemius_link
      );
}


demg()->add_filter('connect_message_on_update', 'divienhancer_freemius_message', 10, 6);
demg()->add_filter('connect_message', 'divienhancer_freemius_message', 10, 6);


// send plugin kind to visual builder
function divienhancer_send_license_to_vb($classes){

  if(function_exists('de_pro')){
    if ( de_pro()->is_paying() ) {
      $classes[] = 'divienhancer-pro';
    }
    else {
      $classes[] = 'divienhancer-free';
    }
  }
  else {
    $classes[] = 'divienhancer-free';
  }

  return $classes;
}



add_filter( 'body_class','divienhancer_send_license_to_vb' );



if ( ! function_exists( 'divienhancer_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function divienhancer_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/DiviEnhancer.php';
}
add_action( 'divi_extensions_init', 'divienhancer_initialize_extension' );
endif;


/*================= required files ============================*/
/*=============================================================*/

    if (file_exists(plugin_dir_path( __FILE__ ) . 'custom/theme-customizer.php')){
    	require_once(plugin_dir_path( __FILE__ ) . 'custom/theme-customizer.php');
    }
    if (file_exists(plugin_dir_path( __FILE__ ) . 'custom/dynamic-styles.php')){
    	require_once(plugin_dir_path( __FILE__ ) . 'custom/dynamic-styles.php');
    }

    if (file_exists(plugin_dir_path( __FILE__ ) . 'custom/modules-mod.php')){
    	require_once(plugin_dir_path( __FILE__ ) . 'custom/modules-mod.php');
    }
    if (file_exists(plugin_dir_path( __FILE__ ) . 'notices.php')){
    	require_once(plugin_dir_path( __FILE__ ) . 'notices.php');
    }
    if (file_exists(plugin_dir_path( __FILE__ ) . 'functions.php')){
    	require_once(plugin_dir_path( __FILE__ ) . 'functions.php');
    }




//dashboard page
function divienhancer_admin_menu() {
	add_menu_page('Divi Enhancer', 'Divi Enhancer', 'manage_options', 'divienhancerdashboard');
  add_submenu_page('divienhancerdashboard', 'Guide', 'Guide', 'manage_options', 'divienhancerdashboard', 'divienhancer_guide_func');
}
add_action('admin_menu', 'divienhancer_admin_menu');

function divienhancer_guide_func(){
  $content = '<div style="display: inline-block; margin: 0 auto; float: left; width: 100%; text-align: center;">';
  $content .= '<iframe src="https://miguras.com/divienhancer-guide" width="90%" height="600px" scrolling="yes" frameborder="0"></iframe>';
  $content .= '</div>';
  echo $content;
}




function divienhancer_admin_styles(){
    wp_enqueue_style( 'divienhancer-admin-css',  plugin_dir_url( __FILE__ ) . 'styles/admin.css', rand(1, 100) );
}
add_action('admin_enqueue_scripts', 'divienhancer_admin_styles', 999);


// add kirki panel since 3.7
if (file_exists(plugin_dir_path( __FILE__ ) . 'panel/kirki/kirki.php')){
	require_once(plugin_dir_path( __FILE__ ) . 'panel/kirki/kirki.php');
}

if(class_exists('Kirki')){


    add_filter( 'kirki_telemetry', '__return_false' );

		if (file_exists(plugin_dir_path( __FILE__ ) . 'panel/divienhancer-options.php')){
			require_once(plugin_dir_path( __FILE__ ) . 'panel/divienhancer-options.php');
		}

}

$denotices = DIVIENHANCER_Admin_Notices::get_instance();
$denotices->info( 'Try our FREE DIVI plugin DIVI Section Enhancer. You can use youtube videos as background, add scrollbars to section and more. Download it <a target="_blank" href="https://wordpress.org/plugins/dse-divi-section-enhancer/">here (wordpress.org download)</a> or dismiss this notice pressing the X at top right corner', 'dse-free' );



?>
