<?php

namespace DiviSenseiSuit;

class Plugin
{

    protected $plugin_name;

    protected $version;

    public static $instance = null;

    private $plugin_admin;

    public function __construct()
    {
        if (defined('DIVI_SENSEI_SUIT_VERSION')) {
            $this->version = DIVI_SENSEI_SUIT_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'ds-suit';

        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();
        $this->define_global_hooks();
        $this->define_divi_hooks();
    }

    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function set_style($render_slug, $props, $property, $css_selector, $css_property, $important = false)
    {

        $responsive_active = !empty($props[$property . "_last_edited"]) && et_pb_get_responsive_status($props[$property . "_last_edited"]);

        $declaration_desktop = "";
        $declaration_tablet = "";
        $declaration_phone = "";

        switch ($css_property) {
            case "margin":
            case "padding":
                if (!empty($props[$property])) {
                    $values = explode("|", $props[$property]);
                    $declaration_desktop = "{$css_property}-top: {$values[0]};
                                           {$css_property}-right: {$values[1]};
                                           {$css_property}-bottom: {$values[2]};
                                           {$css_property}-left: {$values[3]};";
                }

                if ($responsive_active && !empty($props[$property . "_tablet"])) {
                    $values = explode("|", $props[$property . "_tablet"]);
                    $declaration_tablet = "{$css_property}-top: {$values[0]};
                                          {$css_property}-right: {$values[1]};
                                          {$css_property}-bottom: {$values[2]};
                                          {$css_property}-left: {$values[3]};";
                }

                if ($responsive_active && !empty($props[$property . "_phone"])) {
                    $values = explode("|", $props[$property . "_phone"]);
                    $declaration_phone = "{$css_property}-top: {$values[0]};
                                         {$css_property}-right: {$values[1]};
                                         {$css_property}-bottom: {$values[2]};
                                         {$css_property}-left: {$values[3]};";
                }
                break;
            default: //Default is applied for values like height, color etc.
                if (!empty($props[$property])) {
                    $declaration_desktop = "{$css_property}: {$props[$property]};";
                }
                if ($responsive_active && !empty($props[$property . "_tablet"])) {
                    $declaration_tablet = "{$css_property}: {$props[$property . "_tablet"]};";
                }
                if ($responsive_active && !empty($props[$property . "_phone"])) {
                    $declaration_phone = "{$css_property}: {$props[$property . "_phone"]};";
                }
        }

        \ET_Builder_Element::set_style($render_slug, [
            'selector' => $css_selector,
            'declaration' => $declaration_desktop,
        ]);

        if (!empty($props[$property . "_tablet"]) && $responsive_active) {
            \ET_Builder_Element::set_style($render_slug, [
                'selector' => $css_selector,
                'declaration' => $declaration_tablet,
                'media_query' => \ET_Builder_Element::get_media_query('max_width_980'),
            ]);
        }

        if (!empty($props[$property . "_phone"]) && $responsive_active) {
            \ET_Builder_Element::set_style($render_slug, [
                'selector' => $css_selector,
                'declaration' => $declaration_phone,
                'media_query' => \ET_Builder_Element::get_media_query('max_width_767'),
            ]);
        }

    }

    private function load_dependencies()
    {

        /*
         * Library to handle permanent dismissal of admin notices
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/persist-admin-notices-dismissal/persist-admin-notices-dismissal.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/admin.php';

        /**
         * The class responsible for defining all public facing hooks and functions of the plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/public.php';

        /**
         * The class responsible for defining the blurb widget
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/widgets/Blurb.php';

    }

    private function define_global_hooks()
    {

    }

    private function define_admin_hooks()
    {

        $plugin_admin = new Admin($this->get_plugin_name(), $this->get_version());
        $this->plugin_admin = $plugin_admin;

        add_action('admin_enqueue_scripts', [$plugin_admin, 'enqueue_styles']);
        add_action('admin_enqueue_scripts', [$plugin_admin, 'enqueue_scripts']);
        add_action('admin_menu', [$plugin_admin, 'admin_menu']);

        add_filter('ds_suit/settings/extensions', [$plugin_admin, 'get_extensions']);
        add_filter('ds_suit/settings/widgets', [$plugin_admin, 'get_widgets']);

        add_filter('et_epanel_tab_names', [$plugin_admin, 'add_epanel_tab']);
        add_filter('et_epanel_layout_data', [$plugin_admin, 'add_epanel_tab_content']);

        add_filter('et_pb_all_fields_unprocessed_et_pb_blurb', [$plugin_admin, 'add_fields_to_et_pb_blurb']);
        add_filter('et_builder_module_et_pb_blurb_outer_wrapper_attrs', [$plugin_admin, 'add_attrs_to_et_pb_blurb'], 10, 2);
        add_filter('et_module_shortcode_output', [$plugin_admin, 'et_module_shortcode_output'], 10, 3);
    }
    
    private function define_public_hooks()
    {
        $plugin_public = new PluginPublic($this->get_plugin_name(), $this->get_version());
    
        add_action('wp_enqueue_scripts', [$plugin_public, 'enqueue_styles']);
        add_action('wp_enqueue_scripts', [$plugin_public, 'enqueue_scripts']);
    
        add_action('wp_ajax_dss_bucket', [$plugin_public, 'dss_bucket']);
        add_action('wp_ajax_dss_footer', [$plugin_public, 'dss_footer']);
        add_action('wp_ajax_dss_get_post_title', [$plugin_public, 'dss_get_post_title']);
        add_action('wp_ajax_dss_get_post_excerpt', [$plugin_public, 'dss_get_post_excerpt']);
        add_action('wp_ajax_dss_get_post_featured_image', [$plugin_public, 'dss_get_post_featured_image']);
        add_action('wp_ajax_dss_get_post_meta', [$plugin_public, 'dss_get_post_meta']);
        add_action('wp_ajax_dss_masonry_gallery', [$plugin_public, 'dss_masonry_gallery']);

        add_filter('dss_another_post', 'wptexturize');
        add_filter('dss_another_post', 'convert_smilies');
        add_filter('dss_another_post', 'convert_chars');
        add_filter('dss_another_post', 'wpautop');
        add_filter('dss_another_post', 'shortcode_unautop');
        add_filter('dss_another_post', 'do_shortcode');
    }

    private function define_divi_hooks()
    {
        add_action('divi_extensions_init', [$this, 'divi_extensions_init']);      
        add_action( 'after_setup_theme', [$this, 'after_setup_theme'], 11 );
    }

    public function divi_extensions_init()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/DsSuit.php';           
    }

    public function after_setup_theme() {

        if(!function_exists("et_get_option")) {
            add_action( 'admin_notices', function() {
                ?>
                <div class="notice notice-error is-dismissible">
                    <p><?php _e( 'Battle Suit for Divi is currently inactive because the Divi Builder is either missing or because the Divi version is incompatible with this version of the plugin.', 'ds-suit-material' ); ?></p>
                </div>
                <?php
            } );
        }

        //Load Blurb Widget if enabled in ePanel
        if (function_exists("et_get_option") && 'on' === et_get_option("enable_widget_blurb", 'on')) {
            add_action('widgets_init', function () {
                register_widget(new DSS_Blurb_Widget());
            });
        }

        if (function_exists("et_get_option") && 'on' === et_get_option('enable_extension_edit_in_vb', 'on')) {
            add_filter('post_row_actions',[$this->plugin_admin, 'row_actions_edit_in_vb'], 10, 2);
            add_filter('page_row_actions',[$this->plugin_admin, 'row_actions_edit_in_vb'], 10, 2);
        }
    }

    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    public function get_version()
    {
        return $this->version;
    }

}

new Plugin();
