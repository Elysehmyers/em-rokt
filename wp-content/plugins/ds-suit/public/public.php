<?php

namespace DiviSenseiSuit;

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.janthielemann.de
 * @since      1.0.0
 *
 * @package    DiviSenseiSuit\Toolset
 * @subpackage DiviSenseiSuit\Toolset\PluginPublic
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    DiviSenseiSuit\Toolset
 * @subpackage DiviSenseiSuit\Toolset\PluginPublic
 * @author     Jan Thielemann <contact@janthielemann.de>
 */
class PluginPublic
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/public.css', array(), $this->version, 'all');
        
        if (function_exists("et_get_option") && 'on' === et_get_option("enable_extension_permanent_vb_icons", false)) {
            wp_enqueue_style($this->plugin_name . "_permanent_vb_icons", plugin_dir_url(__FILE__) . 'css/permanent-vb-icons.css', array(), $this->version, 'all');
        }

        if (function_exists("et_get_option") && 'on' === et_get_option("enable_extension_permanent_vb_help", false)) {
            wp_enqueue_style($this->plugin_name . "_permanent_vb_help", plugin_dir_url(__FILE__) . 'css/permanent-vb-help.css', array(), $this->version, 'all');
        }
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script($this->plugin_name . "_imagesloaded", plugin_dir_url(__FILE__) . 'js/imagesloaded.pkgd.min.js', array('jquery'), "4.1.4", false);
        wp_enqueue_script($this->plugin_name . "_masonry", plugin_dir_url(__FILE__) . 'js/masonry.pkgd.min.js', array('jquery', 'imagesloaded'), "4.2.2", false);
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/public.js', array('jquery', 'masonry'), $this->version, false);

        if (function_exists("et_get_option") && 'on' === et_get_option('enable_extension_responsive_preview', 'on')) {
            wp_enqueue_script($this->plugin_name . "_responsive_preview", plugin_dir_url(__FILE__) . 'js/responsive_preview.js', array('jquery'), $this->version, false);
        }
    }

    public function dss_bucket()
    {
        // if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'dss_toolset_textfield')) {
        //     wp_send_json_error([
        //         "fuck_nonce" => $_POST['nonce'],
        //         "schisser ist" => wp_verify_nonce($_POST['nonce'], 'dss_toolset_textfield'),
        //     ]);
        // }

        $image = $_POST['image'];
        $image_size_desktop = sanitize_key($_POST['image_size_desktop']);
        $image_size_tablet = sanitize_key($_POST['image_size_tablet']);
        $image_size_phone = sanitize_key($_POST['image_size_phone']);

        $image_desktop_url = $image;
        $image_tablet_url = $image;
        $image_phone_url = $image;
        $image_alt = '';
        $image_title = '';

        $src_pathinfo = pathinfo($image);
        $is_svg = isset($src_pathinfo['extension']) ? 'svg' === $src_pathinfo['extension'] : false;

        $attachment_id = attachment_url_to_postid($image);
        if (!$is_svg && $attachment_id > 0) {
            $image_desktop_url = $this->get_attachment_image($attachment_id, $image_size_desktop, $image);
            $image_tablet_url = $this->get_attachment_image($attachment_id, $image_size_tablet, $image);
            $image_phone_url = $this->get_attachment_image($attachment_id, $image_size_phone, $image);
            $image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
            $image_title = get_the_title($attachment_id);
        }

        $result = [
            "image_url" => $image,
            "image_alt" => $image_alt,
            "image_title" => $image_title,
            "image_desktop_url" => $image_desktop_url,
            "image_tablet_url" => $image_tablet_url,
            "image_phone_url" => $image_phone_url,
            "is_svg" => $is_svg,
        ];

        wp_send_json($result);
    }

    public function get_attachment_image($attachment_id, $image_size, $fallback_url)
    {
        $attachment = wp_get_attachment_image_src($attachment_id, $image_size);
        if ($attachment) {
            return $attachment[0];
        } else {
            return $fallback_url;
        }
    }

    public function dss_footer()
    {
        // if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'dss_toolset_textfield')) {
        //     wp_send_json_error([
        //         "fuck_nonce" => $_POST['nonce'],
        //         "schisser ist" => wp_verify_nonce($_POST['nonce'], 'dss_toolset_textfield'),
        //     ]);
        // }

        $show_sidebar = sanitize_key($_POST['show_sidebar']);
        $show_nav_menu = sanitize_key($_POST['show_nav_menu']);

        $result = [
            "footer" => ds_get_footer($show_sidebar, $show_nav_menu),
        ];

        wp_send_json($result);
    }

    public function dss_get_post_title()
    {

        // if ( empty( $_POST ) || !wp_verify_nonce( $_POST['nonce'], 'dss_get_post_title' ) ) {
        //     wp_send_json_error($result);
        // }

        $post_id = sanitize_key($_POST['post_id']);

        $result = [
            'title' => get_the_title($post_id),
            'post_id' => $post_id,
            'permalink' => esc_url(get_permalink($post_id)),
            'featured_image' => get_the_post_thumbnail_url($post_id),
        ];

        wp_send_json($result);
    }

    public function dss_get_post_excerpt()
    {

        // if ( empty( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'dss_get_post_excerpt' ) ) {
        //     wp_send_json_error();
        // }

        $post_id = sanitize_key($_POST['post_id']);
        $limit = intval($_POST['limit']);
        $more = sanitize_text_field($_POST['more']);

        $excerpt = get_the_excerpt($post_id);

        if ($limit > 0) {
            $excerpt = wp_trim_words($excerpt, $limit, $more);
        }

        $result = [
            'excerpt' => esc_html($excerpt),
            'permalink' => esc_url(get_permalink($post_id)),
        ];

        wp_send_json($result);
    }

    public function dss_get_post_featured_image()
    {

        // if ( empty( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'dss_get_post_featured_image' ) ) {
        //     wp_send_json_error();
        // }

        $post_id = sanitize_key($_POST['post_id']);
        $image_size = sanitize_key($_POST['image_size']);

        $src = get_the_post_thumbnail_url($post_id, $image_size);
        $thumbnail_id = get_post_thumbnail_id($post_id);
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
        $title = get_the_title($thumbnail_id);
        $src_pathinfo = pathinfo($src);
        $is_svg = isset($src_pathinfo['extension']) ? 'svg' === $src_pathinfo['extension'] : false;
        $permalink = get_permalink($post_id);

        $result = [
            'src' => esc_url($src),
            'alt' => $alt,
            'title' => $title,
            'is_svg' => $is_svg,
            'permalink' => esc_url($permalink),
        ];

        wp_send_json($result);
    }

    public function dss_get_post_meta()
    {

        // if ( empty( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'dss_get_post_meta' ) ) {
        //     wp_send_json_error();
        // }

        $post_id = sanitize_key($_POST['post_id']);
        $meta_type = sanitize_key($_POST['meta_type']);

        $result = [];

        $result["post_id"] = $post_id;
        $result["meta_type"] = $meta_type;

        switch ($meta_type) {
            case 'author':
                $author_id = get_post_field('post_author', $post_id);
                $user_nicename = get_the_author_meta('user_nicename', $author_id);
                $display_name = get_the_author_meta('display_name', $author_id);
                $author_url = get_author_posts_url($author_id, $user_nicename);
                $result['author'] = sprintf(
                    '<a href="%1$s">%2$s</a>',
                    $author_url,
                    $display_name
                );
                break;
            case 'date':
                $format = $_POST['format'];
                $result['date'] = get_the_date($format, $post_id);
                break;
            case 'editdate':
                $format = $_POST['format'];
                $result['date'] = get_the_modified_date($format, $post_id);
                break;
            case 'taxonomy':
                $taxonomy = sanitize_text_field($_POST['taxonomy']);
                $separator = sanitize_text_field($_POST['separator']);
                if (has_term(null, $taxonomy, $post_id)) {
                    $result['taxonomy'] = get_the_term_list($post_id, $taxonomy, null, $separator, null);
                }
                break;
            case 'comments':
                $result['comments'] = dss_get_comments_link($post_id);
                break;
            case 'meta':
                $meta_field = sanitize_text_field($_POST['meta_field']);
                $result['meta_field'] = get_post_meta($post_id, $meta_field, true);
            default:
                break;
        }

        wp_send_json($result);
    }

    public function dss_masonry_gallery()
    {
        $images = [];
        foreach (explode(",", $_POST['images']) as $attachment_id) {
            $images[] = wp_get_attachment_image_src($attachment_id, "full")[0];
        }

        //TODO: Split images by , and remove whitespaces
        //Get attachment url for each image
        //Return array of images
    
        $result = [
            "images" => $images,
        ];

        wp_send_json($result);
    }

}
