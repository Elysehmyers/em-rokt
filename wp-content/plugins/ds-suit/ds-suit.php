<?php

/*
Plugin Name: Battle Suit for Divi
Plugin URI:  https://divi-sensei.com/suit
Description: A useful collection of Divi modules and extensions.
Version:     1.15.6
Author:      Divi Sensei
Author URI:  https://divi-sensei.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: ds-suit
Domain Path: /languages

Divi Sensei Suit is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Divi Sensei Suit is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Divi Sensei Suit. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */

if (!defined('ABSPATH')) {
    exit;
}

/*
* Library to handle permanent dismissal of admin notices
*/
require_once plugin_dir_path(__FILE__) . 'includes/persist-admin-notices-dismissal/persist-admin-notices-dismissal.php';
add_action( 'admin_init', array( 'PAnD', 'init' ) );

add_action( 'admin_notices', function() {
    $notification_key = "ds-suit-" . DIVI_SENSEI_SUIT_VERSION . '-advertise-add-ons';
    if ( ! PAnD::is_admin_notice_active( $notification_key ) ) {
		return;
	}
    ?>
    <div class="notice notice-success is-dismissible" data-dismissible="<?php echo $notification_key; ?>">
        <div class="ds-suit-notice ds-suit-notice-advertise-add-ons">
            <img src="<?php echo plugin_dir_url(__FILE__) . 'admin/assets/divi-sensei-100.png'; ?>">
            <div>
            <?php 
            echo sprintf(
                '%1$s <a href="%3$s">%2$s</a>',
                __( 'Battle Suit for Divi has some <b>awesome premium features</b> to offer.', 'ds-suit') ,
                __( 'Check out our add-ons', 'ds-suit'),
                "admin.php?page=ds-suit-addons"
            );
            ?>
            </div>
        </div>
    </div>
    <?php
} );

if (!function_exists('dss_get_comments_link')) {
    function dss_get_comments_link($post_id = false, $zero = false, $one = false, $more = false)
    {
        $id = (false === $post_id) ? get_the_ID() : $post_id;
        $number = get_comments_number($id);

        // if ( 0 == $number && !comments_open() && !pings_open() ) return;

        if ($number > 1) {
            $output = str_replace('%', number_format_i18n($number), (false === $more) ? __('% Comments', 'ds-suit') : $more);
        } elseif ($number == 0) {
            $output = (false === $zero) ? __('No Comments', 'ds-suit') : $zero;
        } else // must be one
        {
            $output = (false === $one) ? __('1 Comment', 'ds-suit') : $one;
        }

        return '<span class="comments-number">' . '<a href="' . esc_url(get_permalink() . '#respond') . '">' . apply_filters('comments_number', esc_html($output), esc_html($number)) . '</a>' . '</span>';
    }
}

if (!function_exists('ds_suit')) {

    // Create a helper function for easy SDK access.
    function ds_suit()
    {
        global $ds_suit;

        if (!isset($ds_suit)) {
            // Activate multisite network integration.
            if (!defined('WP_FS__PRODUCT_1997_MULTISITE')) {
                define('WP_FS__PRODUCT_1997_MULTISITE', true);
            }

            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/freemius/start.php';

            $ds_suit = fs_dynamic_init(array(
                'id' => '1997',
                'slug' => 'ds-suit',
                'type' => 'plugin',
                'public_key' => 'pk_9aaec4277e65e9b3a8d13ecdba08e',
                'is_premium' => false,
                'has_addons' => true,
                'has_paid_plans' => false,
                'menu' => array(
                    'slug' => 'ds-suit',
                    'first-path' => 'admin.php?page=ds-suit',
                    'support' => false,
                ),
            ));
        }

        return $ds_suit;
    }

}

// add_action("after_theme_setup", "ds_after_divi_theme_setup", 11);
// function ds_after_divi_theme_setup(){
if (!function_exists('ds_get_footer')) {
    function ds_get_footer($show_sidebar, $show_nav_menu)
    {
        ob_start();

        echo '<footer id="main-footer">';

        //Footer Sidebar
        if ('on' === $show_sidebar) {
            // get_sidebar('footer');
            get_template_part('sidebar', 'footer');
        }

        //Footer Nav Menu
        if ('on' === $show_nav_menu && has_nav_menu('footer-menu')) {
            echo '<div id="et-footer-nav">';
            echo '<div class="container">';
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'depth' => '1',
                'menu_class' => 'bottom-nav',
                'container' => '',
                'fallback_cb' => '',
            ));
            echo '</div>';
            echo '</div>';
        }

        //Bottom Bar
        echo '<div id="footer-bottom">';
        echo '<div class="container clearfix">';
        if (function_exists("et_get_option") && false !== et_get_option('show_footer_social_icons', true)) {
            get_template_part('includes/social_icons', 'footer');
        }
        echo et_get_footer_credits();
        echo '</div>'; //.container.clearfix
        echo '</div>'; //#footer-bottom
        echo '</footer>';

        return ob_get_clean();
    }
}

ds_suit();

define("DIVI_SENSEI_SUIT_VERSION", get_plugin_data(dirname(__FILE__).'/ds-suit.php')["Version"]);
require_once dirname(__FILE__) . '/includes/plugin.php';

// Signal that SDK was initiated.
do_action('ds_suit_loaded');




