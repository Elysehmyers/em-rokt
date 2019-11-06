<?php

namespace DiviSenseiSuit;

class Admin
{

    private $plugin_name;

    private $version;

    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles()
    {
        wp_enqueue_style($this->plugin_name . '_admin_css', plugin_dir_url(__FILE__) . 'css/admin.css', array(), $this->version, 'all');
        if (function_exists("et_get_option") && 'on' === et_get_option("enable_extension_permanent_themeoptions_help", false)) {
            wp_enqueue_style($this->plugin_name . "_permanent_themeoptions_help", plugin_dir_url(__FILE__) . 'css/permanent-themeoptions-help.css', array(), $this->version, 'all');
        }

    }

    public function enqueue_scripts()
    {
        wp_enqueue_script("freemius-checkout", plugin_dir_url(__FILE__) . 'js/checkout.min.js', array('jquery'), $this->version, false);
        wp_enqueue_script($this->plugin_name . '_admin_js', plugin_dir_url(__FILE__) . 'js/admin.js', array('jquery', 'freemius-checkout'), $this->version, false);
        wp_localize_script($this->plugin_name . '_admin_js', 'ds_suit_admin', [
            'version' => $this->version,
        ]);
    }

    public function admin_menu()
    {
        $slug = 'ds-suit';
        $capability = 'manage_options';

        add_menu_page(
            __('Divi Sensei Suit', 'ds-suit'),
            __('Divi Sensei Suit', 'ds-suit'),
            $capability,
            $slug,
            [$this, 'render_welcome_page'],
            'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 226.8 226.8" width="20" height="20">
            <path fill="#eee" d="M105.9,49.9c0,0,3.3-14.5-9.5-15.3c-13-0.8-13.3,7.4-30.1,6.8c-13-0.5-21.3-7-26.3-7.5c4.5,5.5,15.5,17.5,35.6,16
                c11.6-0.9,16.7-5.3,19.8-5.5C99.6,44.2,102.4,45.9,105.9,49.9"/>
            <path fill="#eee" d="M120.9,49.9c0,0-3.3-14.5,9.5-15.3c13-0.8,13.3,7.4,30.1,6.8c13-0.5,21.3-7,26.3-7.5c-4.5,5.5-15.5,17.5-35.6,16
                c-11.6-0.9-16.7-5.3-19.8-5.5C127.1,44.2,124.4,45.9,120.9,49.9"/>
            <path fill="#eee" d="M102.2,78.8c0,0-28.1-13-39.8,15.5c-15.6,37.9,5,97,8,97.7c3,0.8-11.8-64.9,3-93c5.1-9.7,16-12.4,28.8-13
                C112,85.6,102.2,78.8,102.2,78.8"/>
            <path fill="#eee" d="M124.8,78.8c0,0,28.1-13,39.8,15.5c15.6,37.9-5,97-8,97.7c-3,0.8,11.8-64.9-3-93c-5.1-9.7-16-12.4-28.8-13
                C115.1,85.6,124.8,78.8,124.8,78.8"/>
            <path fill="#eee" d="M127.6,120.6c-0.4-14.2-11.1-13.9-14.1-13.7c-0.1-0.1,7-0.1-0.1-0.1c-3-0.3-13.8-0.5-14.2,13.7c-0.5,16,12.2,91.6,14.2,92.9
                c0,0,0-0.8,0-2.2c0,1.5,0,2.3,0,2.3C115.5,212.3,128.1,136.7,127.6,120.6"/>
            </svg>')
        );

        add_submenu_page(
            $slug,
            __('Settings', 'ds-suit'),
            __('Settings', 'ds-suit'),
            $capability,
            'admin.php?page=et_divi_options#wrap-dss_settings',
            ''
        );

        add_submenu_page(
            $slug,
            __('Bundles', 'ds-suit'),
            __('Bundles', 'ds-suit'),
            $capability,
            'ds-suit-bundles',
            [$this, 'render_page']
        );
    }

    public function get_extensions($extensions)
    {
        $extensions['responsive_preview'] = [
            'label' => 'Responsive Preview',
            'note' => esc_html__('This extension adds S, M and L buttons to the tablet and phone preview in the Visual Builder to test your layout for different screen sizes.', 'ds-suit'),
        ];

        $extensions['permanent_themeoptions_help'] = [
            'label' => 'Permanent Theme Options Help',
            'std' => false,
            'note' => esc_html__('When this extension is enabled, the help text in the Divi Theme Options will be displayed permanently.', 'ds-suit'),
        ];

        $extensions['permanent_vb_icons'] = [
            'label' => 'Permanent VB Icons',
            'std' => false,
            'note' => esc_html__('When this extension is enabled, the help, hover and responsive buttons in the Visual Builder are permanently shown next to the settings label.', 'ds-suit'),
        ];

        $extensions['permanent_vb_help'] = [
            'label' => 'Permanent VB Help',
            'std' => false,
            'note' => esc_html__('When this extension is enabled, the help text for each setting in the Visual Builder is permanently shown.', 'ds-suit'),
        ];

        $extensions['edit_in_vb'] = [
            'label' => '"Edit in Visual Builder" Link',
            'note' => esc_html__('When this extension is enabled, a new Link "Edit in Visual Builder" is added to the post overview list rows.', 'ds-suit'),
        ];

        return $extensions;
    }

    public function get_widgets($widgets)
    {
        $widgets['blurb'] = [
            'label' => 'Blurb',
            'note' => esc_html__('A blurb like widget with an image, a title and a body. Also a URL can be added to make the whole blurb clickable.', 'ds-suit'),
        ];

        return $widgets;
    }

    public function add_epanel_tab($tabs)
    {
        $tabs["dss_settings"] = "Battle Suit";
        return $tabs;
    }
    public function add_epanel_tab_content($layout_data)
    {
        $dss_layout_data = [];
        $dss_layout_data[] = [
            "name" => "wrap-dss_settings",
            "type" => "contenttab-wrapstart",
        ];

        $dss_layout_data[] = ["type" => "subnavtab-start"];

        $dss_layout_data[] = [
            "name" => "dss_settings-extensions",
            "type" => "subnav-tab",
            "desc" => esc_html__("Extensions", 'ds-suit'),
        ];

        $dss_layout_data[] = [
            "name" => "dss_settings-widgets",
            "type" => "subnav-tab",
            "desc" => esc_html__("Widgets", 'ds-suit'),
        ];

        $add_on_tabs = apply_filters('ds_suit/epanel/tabs', []);
        foreach ($add_on_tabs as $tab) {
            $dss_layout_data[] = [
                "name" => "dss_settings-" . $tab["name"],
                "type" => "subnav-tab",
                "desc" => $tab["desc"],
            ];
        }

        $dss_layout_data[] = ["type" => "subnavtab-end"];

        $dss_layout_data[] = [
            "name" => "dss_settings-extensions",
            "type" => "subcontent-start",
        ];

        $extensions = [];
        $extensions = apply_filters('ds_suit/settings/extensions', $extensions);

        asort($extensions);

        $fields = [];
        foreach ($extensions as $extension_id => $extension) {
            $dss_layout_data[] = [
                "name" => $extension['label'],
                "id" => 'enable_extension_' . $extension_id,
                "type" => "checkbox",
                "std" => isset($extension['std']) ? $extension['std'] : "on",
                "desc" => $extension['note'],
            ];
        }

        $dss_layout_data[] = [
            "name" => "dss_settings-extensions",
            "type" => "subcontent-end",
        ];

        $dss_layout_data[] = [
            "name" => "dss_settings-widgets",
            "type" => "subcontent-start",
        ];

        $widgets = [];
        $widgets = apply_filters('ds_suit/settings/widgets', $widgets);

        asort($widgets);

        $fields = [];
        foreach ($widgets as $widget_id => $widget) {
            $dss_layout_data[] = [
                "name" => $widget['label'],
                "id" => 'enable_widget_' . $widget_id,
                "type" => "checkbox",
                "std" => "on",
                "desc" => $widget['note'],
            ];
        }

        $dss_layout_data[] = [
            "name" => "dss_settings-widgets",
            "type" => "subcontent-end",
        ];

        foreach ($add_on_tabs as $tab) {
            $dss_layout_data[] = [
                "name" => "dss_settings-" . $tab["name"],
                "type" => "subcontent-start",
            ];

            $settings = apply_filters('ds_suit/epanel/settings', [], $tab["name"]);
            foreach ($settings as $setting) {
                $dss_layout_data[] = $setting;
            }

            $dss_layout_data[] = [
                "name" => "dss_settings-" . $tab["name"],
                "type" => "subcontent-end",
            ];
        }

        $dss_layout_data[] = [
            "name" => "wrap-dss_settings",
            "type" => "contenttab-wrapend",
        ];

        $layout_data = array_merge($layout_data, $dss_layout_data);
        return $layout_data;

    }

    public function add_fields_to_et_pb_blurb($fields)
    {
        return array_merge($fields, [
            'dss_open_in_lightbox' => [
                'label' => esc_html__("Open in Lightbox", 'ds-suit'),
                'type' => 'yes_no_button',
                'option_category' => 'configuration',
                'toggle_slug' => 'image',
                'tab_slug' => 'general',
                'options' => array(
                    'off' => esc_html__('Off', 'ds-suit-material'),
                    'on' => esc_html__('On', 'ds-suit-material'),
                ),
                'show_if' => [
                    'use_icon' => 'off',
                ],
            ],
        ]);
    }

    public function add_attrs_to_et_pb_blurb($inner_wrapper_attrs, $module)
    {
        if ('on' === $module->props["dss_open_in_lightbox"]) {
            $inner_wrapper_attrs["data-dss-open-in-lightbox"] = true;
        } else {
            $inner_wrapper_attrs["data-dss-open-in-lightbox"] = false;

        }
        return $inner_wrapper_attrs;
    }

    public function et_module_shortcode_output($output, $render_slug, $module)
    {
        if ('et_pb_blurb' !== $render_slug) {
            return $output;
        }

        if ('on' !== $module->props["dss_open_in_lightbox"]) {
            return $output;
        }

        if(et_core_is_fb_enabled()) {
            return $output;
        } 

        $module_class = \ET_Builder_Element::add_module_order_class( "et_pb_blurb", $render_slug );
        return $output . "<script>window.DSSuit.dss_lightbox_on_blurb('.{$module_class}');</script>";
    }

    public function render_welcome_page()
    {
        ?>
        <div class="wrap">
            <div id="icon-options-general" class="icon32"></div>
            <h1>Battle Suit for Divi</h1>
            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-2">
                    <div class="postbox">
                        <h2 class="activity-block"><?php echo __('Thank you for choosing Divi Sensei', 'ds-suit'); ?></h2>
                        <div class="inside">
                            <p><?php echo __('Thank you for your trust in our product. We hope you will not regret your decission. We are still a rather young company and we want to provide you with the very best tools you can get. If you experience any issues, please don\'t hesitate to', 'ds-suit') ?> <a href="mailto:sensei@divi-sensei.com"><?php echo __('contact our support', 'ds-suit') ?></a>.</p>
                        </div>
                    </div>
                    <h2><?php echo __('FAQ', 'ds-suit'); ?></h2>
                    <div class="postbox">
                        <h2 class="activity-block"><?php echo __('How does the Battle Suit work?', 'ds-suit'); ?></h2>
                        <div class="inside">
                            <p><?php
echo sprintf(
            __('The Battle Suit for Divi is a collection of useful Divi Builder modules, Divi extensions and WordPress widgets. The completely free base plugin already comes with tons of cool features and useful modules, which you can start using right away. Check out the %s.', 'ds-suit'),
            sprintf('<a href="admin.php?page=et_divi_options#wrap-dss_settings">%s</a>', __("settings page"))
        );
        ?></p>
                            <p><?php
echo sprintf(
            __('We also offer premium modules which, due to the large development and maintenance effort, come with a price tag. However, the pricing model is absolutely transparent, fair and they are worth every cent. Check out the %s for more information.', 'ds-suit'),
            sprintf('<a href="admin.php?page=ds-suit-addons">%s</a>', __("add-ons page"))
        );
        ?></p>
                            <p><?php
echo sprintf(
            __('To make it even more affordable for you to use our premium add-ons, we came up with a bundle plan, which will grant you access to all current and future add-ons. You can find the pricing information and more details on the %s.', 'ds-suit'),
            sprintf('<a href="admin.php?page=ds-suit-bundles">%s</a>', __("bundles page"))
        );
        ?></p>
                        </div>
                    </div>
                    <div class="postbox">
                        <h2 class="activity-block"><?php echo __('Where to go from here?', 'ds-suit'); ?></h2>
                        <div class="inside">
                            <p><?php
echo sprintf(
            __('We suggest you just dive into our modules. Fire up the builder and start using them. They are eally simple to use and many of the settings have detailed explanations which you can find by clicking the help button next to the label of the setting. Or head over to %s and read through the documentation. You can also visit our %s for more documentation and other interesting tutorials.', 'ds-suit'),
            sprintf('<a href="https://divi-sensei.com/suit">%s</a>', __("Divi Sensei")),
            sprintf('<a href="https://www.youtube.com/channel/UCEeqqgQVrFxQthXY5sB0yjA">%s</a>', __("YouTube channel"))
        );
        ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
}

    public function render_page()
    {
        ?>
        <div class="bundle-page-wrapper">
            <div class="description">
                <h1>Battle Suit for Divi - Bundles</h1>
                <p>Battle Suit for Divi is intentionally build in a way so you can explicitly choose only those components you really need - without paying for modules, extensions and widgets you are not interested in. With our add-on based structure you can really save a lot of money.</p>
                <p>However, we know that there are users out there who want to use every single add-on we have developed. That's where our bundle plans enter the game. If you are a pro-user, a freelancer or a webdesign agency, grab yourself one of our bundles today, save even more money and get the best deal we ever had.</p>
            </div>
            <div class="price-list-wrapper" style="display:none;">
                <form>
                    <p>Select your licensing model:</p>
                    <fieldset>
                        <label for="single"><input type="radio" id="single" name="price-model" value="1"> Single Site</label>
                        <label for="freelancer"><input type="radio" id="freelancer" name="price-model" value="5"> Freelancer</label>
                        <label for="agency"><input type="radio" id="agency" name="price-model" value="unlimited"> Agency</label>
                    </fieldset>
                </form>
                <div class="price-lists-all">
                    <div id="price-lists-single" class="price-lists">
                        <div class="price-list">
                            <h2 class="title">Builder Bundle</h2>
                            <div class="price">
                                <div class="only">Only</div>
                                <div class="price-component">
                                    <span class="price-currency">$</span>
                                    <span class="price-super">9</span>
                                    <span class="price-sub">99</span>
                                </div>
                                <div>per Year</div>
                            </div>
                            <div class="spacer"></div>
                            <div class="feature">Usage on 1 Site</div>
                            <div class="spacer"></div>
                            <div class="feature">All Standard Add-Ons</div>
                            <div class="spacer"></div>
                            <div class="feature">All Upcoming Add-Ons</div>
                            <div class="spacer"></div>
                            <div class="feature negative">Including Toolset Add-On</div>
                            <button class="purchase" data-plan_id="4080">Buy Now</button>
                        </div>
                        <div class="price-list">
                            <h2 class="title">Complete Bundle</h2>
                            <div class="price">
                                <div class="only">Only</div>
                                <div class="price-component">
                                    <span class="price-currency">$</span>
                                    <span class="price-super">24</span>
                                    <span class="price-sub">99</span>
                                </div>
                                <div>per Year</div>
                            </div>
                            <div class="spacer"></div>
                            <div class="feature">Usage on 1 Site</div>
                            <div class="spacer"></div>
                            <div class="feature">All Standard Add-Ons</div>
                            <div class="spacer"></div>
                            <div class="feature">All Upcoming Add-Ons</div>
                            <div class="spacer"></div>
                            <div class="feature">Including Toolset Add-On</div>
                            <button class="purchase" data-plan_id="2981">Buy Now</button>
                        </div>
                    </div>
                    <div id="price-lists-freelancer" class="price-lists">
                        <div class="price-list">
                            <h2 class="title">Builder Bundle</h2>
                            <div class="price">
                                <div class="only">Only</div>
                                <div class="price-component">
                                    <span class="price-currency">$</span>
                                    <span class="price-super">19</span>
                                    <span class="price-sub">99</span>
                                </div>
                                <div>per Year</div>
                            </div>
                            <div class="spacer"></div>
                            <div class="feature">Usage on 5 Sites</div>
                            <div class="spacer"></div>
                            <div class="feature">All Standard Add-Ons</div>
                            <div class="spacer"></div>
                            <div class="feature">All Upcoming Add-Ons</div>
                            <div class="spacer"></div>
                            <div class="feature negative">Including Toolset Add-On</div>
                            <button class="purchase" data-plan_id="4080">Buy Now</button>
                        </div>
                        <div class="price-list">
                            <h2 class="title">Complete Bundle</h2>
                            <div class="price">
                                <div class="only">Only</div>
                                <div class="price-component">
                                    <span class="price-currency">$</span>
                                    <span class="price-super">59</span>
                                    <span class="price-sub">99</span>
                                </div>
                                <div>per Year</div>
                            </div>
                            <div class="spacer"></div>
                            <div class="feature">Usage on 5 Sites</div>
                            <div class="spacer"></div>
                            <div class="feature">All Standard Add-Ons</div>
                            <div class="spacer"></div>
                            <div class="feature">All Upcoming Add-Ons</div>
                            <div class="spacer"></div>
                            <div class="feature">Including Toolset Add-On</div>
                            <button class="purchase" data-plan_id="2981">Buy Now</button>
                        </div>
                    </div>
                    <div id="price-lists-agency" class="price-lists">
                        <div class="price-list">
                            <h2 class="title">Builder Bundle</h2>
                            <div class="price">
                                <div class="only">Only</div>
                                <div class="price-component">
                                    <span class="price-currency">$</span>
                                    <span class="price-super">29</span>
                                    <span class="price-sub">99</span>
                                </div>
                                <div>per Year</div>
                            </div>
                            <div class="spacer"></div>
                            <div class="feature">Usage on Unlimited Sites</div>
                            <div class="spacer"></div>
                            <div class="feature">All Standard Add-Ons</div>
                            <div class="spacer"></div>
                            <div class="feature">All Upcoming Add-Ons</div>
                            <div class="spacer"></div>
                            <div class="feature negative">Including Toolset Add-On</div>
                            <button class="purchase" data-plan_id="4080">Buy Now</button>
                        </div>
                        <div class="price-list">
                            <h2 class="title">Complete Bundle</h2>
                            <div class="price">
                                <div class="only">Only</div>
                                <div class="price-component">
                                    <span class="price-currency">$</span>
                                    <span class="price-super">99</span>
                                    <span class="price-sub">99</span>
                                </div>
                                <div>per Year</div>
                            </div>
                            <div class="spacer"></div>
                            <div class="feature">Usage on Unlimited Sites</div>
                            <div class="spacer"></div>
                            <div class="feature">All Standard Add-Ons</div>
                            <div class="spacer"></div>
                            <div class="feature">All Upcoming Add-Ons</div>
                            <div class="spacer"></div>
                            <div class="feature">Including Toolset Add-On</div>
                            <button class="purchase" data-plan_id="2981">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
}

    public function row_actions_edit_in_vb($actions, $post)
    {

        if (function_exists('et_pb_is_pagebuilder_used') && et_pb_is_pagebuilder_used($post->ID)) {
            if ($post->post_status == 'publish') {
                $actions['edit_in_visual_builder'] = '<a href="' . get_permalink($post->ID) . '?et_fb=1">Edit in Visual Builder</a>';
            } elseif ($post->post_status == 'draft') {
                $actions['edit_in_visual_builder'] = '<a href="' . get_permalink($post->ID) . '&et_fb=1">Edit in Visual Builder</a>';
            }
        }

        return $actions;
    }
}
