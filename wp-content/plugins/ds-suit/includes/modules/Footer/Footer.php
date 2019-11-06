<?php

class DSS_Footer extends ET_Builder_Module
{

    public $slug = 'dss_footer';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://divi-sensei.com/suit',
        'author' => 'Divi Sensei',
        'author_uri' => 'https://divi-sensei.com',
    );

    public function init()
    {
        $this->name = esc_html__('Sensei Footer', 'ds-suit');

        $this->main_css_element = "%%order_class%%";

        $this->settings_modal_toggles = [
            'general' => [
                'toggles' => [
                    'general' => esc_html__('General', 'ds-suit-toolset'),
                ],
            ],
            'advanced' => [
                'toggles' => [
                    'sidebar' => [
                        'title' => esc_html__('Widgets Text', 'ds-suit-toolset'),
                        'priority' => 47,
                        'tabbed_subtoggles' => true,
                        'sub_toggles' => [
                            'p' => array(
                                'name' => 'P',
                                'icon' => 'text-left',
                            ),
                            'a' => array(
                                'name' => 'A',
                                'icon' => 'text-link',
                            ),
                            'ul' => array(
                                'name' => 'UL',
                                'icon' => 'list',
                            ),
                            'ol' => array(
                                'name' => 'OL',
                                'icon' => 'numbered-list',
                            ),
                            'quote' => array(
                                'name' => 'QUOTE',
                                'icon' => 'text-quote',
                            ),
                        ],
                    ],
                    'nav_menu' => [
                        'title' => esc_html__('Menu Text', 'ds-suit-toolset'),
                        'priority' => 48,
                        'tabbed_subtoggles' => true,
                        'sub_toggles' => [
                            'a' => array(
                                'name' => 'Link',
                            ),
                            'ah' => array(
                                'name' => 'Link Hover',
                            ),
                            'aa' => array(
                                'name' => 'Link Active',
                            ),
                        ],
                    ],
                    'bottom_bar' => [
                        'title' => esc_html__('Bottom Bar Text', 'ds-suit-toolset'),
                        'priority' => 49,
                        'tabbed_subtoggles' => true,
                        'sub_toggles' => [
                            'p' => array(
                                'name' => 'Text',
                            ),
                            'a' => array(
                                'name' => 'A',
                            ),
                            'ah' => array(
                                'name' => 'A Hover',
                            ),
                            'icon' => array(
                                'name' => 'Icons',
                            ),
                        ],
                    ],
                    'background' => [
                        'title' => esc_html__('Background', 'ds-suit-toolset'),
                    ],
                ],
            ],
        ];
    }

    public function get_fields()
    {
        $fields = [];

        $fields['show_sidebar'] = [
            'label' => esc_html__('Show Widgets', 'ds-suit'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'toggle_slug' => 'general',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'ds-suit'),
                'on' => esc_html__('On', 'ds-suit'),
            ),
        ];

        $fields['show_nav_menu'] = [
            'label' => esc_html__('Show Footer Menu', 'ds-suit'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'toggle_slug' => 'general',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'ds-suit'),
                'on' => esc_html__('On', 'ds-suit'),
            ),
        ];

        $fields['footer_bg_color'] = [
            'label' => esc_html__('Footer Background Color', 'ds-suit'),
            'type' => 'color-alpha',
            'custom_color' => true,
            'option_category' => 'basic_option',
            'toggle_slug' => 'background',
            'tab_slug' => 'advanced',
        ];
        $fields['nav_menu_bg_color'] = [
            'label' => esc_html__('Footer Menu Background Color', 'ds-suit'),
            'type' => 'color-alpha',
            'custom_color' => true,
            'option_category' => 'basic_option',
            'toggle_slug' => 'background',
            'tab_slug' => 'advanced',
        ];
        $fields['sidebar_bg_color'] = [
            'label' => esc_html__('Widget Background Color', 'ds-suit'),
            'type' => 'color-alpha',
            'custom_color' => true,
            'option_category' => 'basic_option',
            'toggle_slug' => 'background',
            'tab_slug' => 'advanced',
        ];
        $fields['bottom_bar_bg_color'] = [
            'label' => esc_html__('Bottom Bar Background', 'ds-suit'),
            'type' => 'color-alpha',
            'custom_color' => true,
            'option_category' => 'basic_option',
            'toggle_slug' => 'background',
            'tab_slug' => 'advanced',
        ];

        return $fields;
    }

    public function get_advanced_fields_config()
    {
        $advanced_fields = [];

        $advanced_fields['fonts']['sidebar_text'] = [
            'label' => esc_html__('Text', 'et_builder'),
            'css' => array(
                'main' => "{$this->main_css_element} #footer-widgets p",
            ),
            'line_height' => array(
                'default' => floatval(et_get_option('body_font_height', '1.7')) . 'em',
            ),
            'font_size' => array(
                'default' => absint(et_get_option('body_font_size', '14')) . 'px',
            ),
            'toggle_slug' => 'sidebar',
            'sub_toggle' => 'p',
            'hide_text_align' => true,
        ];

        $advanced_fields['fonts']['sidebar_link'] = [
            'label' => esc_html__('Link', 'et_builder'),
            'css' => array(
                'main' => "{$this->main_css_element} #footer-widgets a",
            ),
            'line_height' => array(
                'default' => '1em',
            ),
            'font_size' => array(
                'default' => absint(et_get_option('body_font_size', '14')) . 'px',
            ),
            'toggle_slug' => 'sidebar',
            'sub_toggle' => 'a',
        ];

        $advanced_fields['fonts']['sidebar_link_hover'] = [
            'label' => esc_html__('Link Hover', 'et_builder'),
            'css' => array(
                'main' => "{$this->main_css_element} #footer-widgets a:hover",
            ),
            'line_height' => array(
                'default' => '1em',
            ),
            'font_size' => array(
                'default' => absint(et_get_option('body_font_size', '14')) . 'px',
            ),
            'toggle_slug' => 'sidebar',
            'sub_toggle' => 'a',
        ];

        $advanced_fields['fonts']['sidebar_ul'] = [
            'label' => esc_html__('Unordered List', 'et_builder'),
            'css' => array(
                'main' => "{$this->main_css_element} #footer-widgets ul",
                'line_height' => "{$this->main_css_element} #footer-widgets ul li",
            ),
            'line_height' => array(
                'default' => '1em',
            ),
            'font_size' => array(
                'default' => '14px',
            ),
            'toggle_slug' => 'sidebar',
            'sub_toggle' => 'ul',
        ];

        $advanced_fields['fonts']['sidebar_ol'] = [
            'label' => esc_html__('Ordered List', 'et_builder'),
            'css' => array(
                'main' => "{$this->main_css_element} #footer-widgets ol",
                'line_height' => "{$this->main_css_element} #footer-widgets ol li",
            ),
            'line_height' => array(
                'default' => '1em',
            ),
            'font_size' => array(
                'default' => '14px',
            ),
            'toggle_slug' => 'sidebar',
            'sub_toggle' => 'ol',
        ];

        $advanced_fields['fonts']['sidebar_quote'] = [
            'label' => esc_html__('Blockquote', 'et_builder'),
            'css' => array(
                'main' => "{$this->main_css_element} #footer-widgets blockquote",
            ),
            'line_height' => array(
                'default' => '1em',
            ),
            'font_size' => array(
                'default' => '14px',
            ),
            'toggle_slug' => 'sidebar',
            'sub_toggle' => 'quote',
        ];

        $advanced_fields['fonts']['nav_menu_link'] = [
            'label' => esc_html__('Link', 'et_builder'),
            'css' => array(
                'main' => "{$this->main_css_element} #et-footer-nav a",
            ),
            'toggle_slug' => 'nav_menu',
            'sub_toggle' => 'a',
        ];
        $advanced_fields['fonts']['nav_menu_link_hover'] = [
            'label' => esc_html__('Link Hover', 'et_builder'),
            'css' => array(
                'main' => "{$this->main_css_element} #et-footer-nav a:hover",
            ),
            'toggle_slug' => 'nav_menu',
            'sub_toggle' => 'ah',
        ];
        $advanced_fields['fonts']['nav_menu_link_active'] = [
            'label' => esc_html__('Link Active', 'et_builder'),
            'css' => array(
                'main' => "{$this->main_css_element} #et-footer-nav .current-menu-item a",
            ),
            'toggle_slug' => 'nav_menu',
            'sub_toggle' => 'aa',
        ];

        $advanced_fields['fonts']['bottom_bar_text'] = [
            'label' => esc_html__('Text', 'et_builder'),
            'css' => array(
                'main' => "{$this->main_css_element} #footer-bottom p",
            ),
            'toggle_slug' => 'bottom_bar',
            'sub_toggle' => 'p',
        ];

        $advanced_fields['fonts']['bottom_bar_link'] = [
            'label' => esc_html__('Link', 'et_builder'),
            'css' => array(
                'main' => "{$this->main_css_element} #footer-bottom a",
            ),
            'toggle_slug' => 'bottom_bar',
            'sub_toggle' => 'a',
        ];

        $advanced_fields['fonts']['bottom_bar_link_hover'] = [
            'label' => esc_html__('Link Hover', 'et_builder'),
            'css' => array(
                'main' => "{$this->main_css_element} #footer-bottom a:hover",
            ),
            'toggle_slug' => 'bottom_bar',
            'sub_toggle' => 'ah',
        ];

        $advanced_fields['fonts']['bottom_bar_icons'] = [
            'label' => esc_html__('Link Hover', 'et_builder'),
            'css' => array(
                'main' => "{$this->main_css_element} #footer-bottom .et-social-icons .icon",
            ),
            'toggle_slug' => 'bottom_bar',
            'sub_toggle' => 'icon',
        ];

        $advanced_fields['margin_padding'] = [
            'css' => [
                'important' => 'all',
            ],
        ];

        // $advanced_fields['fonts']['sidebar_quote'] = [];
        return $advanced_fields;
    }

    public function render($attrs, $content = null, $render_slug)
    {
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% footer#main-footer ',
            'declaration' => sprintf('background-color: %1$s;', $this->props['footer_bg_color']),
        ));
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% footer#main-footer #footer-widgets',
            'declaration' => sprintf('background-color: %1$s;', $this->props['sidebar_bg_color']),
        ));
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% footer#main-footer #et-footer-nav',
            'declaration' => sprintf('background-color: %1$s;', $this->props['nav_menu_bg_color']),
        ));
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% footer#main-footer #footer-bottom',
            'declaration' => sprintf('background-color: %1$s;', $this->props['bottom_bar_bg_color']),
        ));

        return ds_get_footer($this->props['show_sidebar'], $this->props['show_nav_menu']);
    }
}

new DSS_Footer;
