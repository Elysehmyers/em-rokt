<?php

class DSS_Post_Featured_Image extends ET_Builder_Module
{

    public $slug = 'dss_post_featured_image';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://divi-sensei.com/suit',
        'author' => 'Divi Sensei',
        'author_uri' => 'https://divi-sensei.com',
    );

    public function init()
    {
        $this->name = esc_html__('Sensei Post Featured Image', 'ds-suit');

        $this->custom_css_fields = array(
            'title' => array(
                'label' => esc_html__('Image', 'ds-suit'),
                'selector' => '.dss_post_featured_image_image',
            ),
        );

        $this->settings_modal_toggles = [
            'general' => [
                'toggles' => [
                    'image' => esc_html__('Image', 'ds-suit'),
                ],
            ],
            'advanced' => [
                'toggles' => [

                ],
            ],
        ];
    }

    public function get_fields()
    {

        $fields = [];

        $fields['image_size'] = [
            'label' => esc_html__('Image Size', 'ds-suit'),
            'type' => 'select',
            'option_category' => 'basic_option',
            'options' => $this->dss_image_size_options(),
            'toggle_slug' => 'image',
            'description' => 'Here you can choose the image size to use. If you are using very large images, consider using a thumbnail size to speed up page loading time.',
        ];

        $fields['image_link'] = [
            'label' => 'Click on Image',
            'type' => 'select',
            'option_category' => 'basic_option',
            'options' => array(
                '' => 'Nothing',
                'lightbox' => 'Open in lightbox',
                'post' => 'Open post',
                'custom' => 'Open custom link',
            ),
            'toggle_slug' => 'link',
            'description' => 'What to do when clicking the image.',
        ];

        $fields['url'] = [
            'label' => esc_html__('Link URL', 'ds-suit'),
            'type' => 'text',
            'option_category' => 'basic_option',
            'show_if' => [
                'image_link' => ['custom'],
            ],
            'description' => esc_html__('If you would like your image to be a link, input your destination URL here. No link will be created if this field is left blank.', 'ds-suit'),
            'toggle_slug' => 'link',
        ];

        $fields['url_new_window'] = [
            'label' => esc_html__('Url Opens', 'ds-suit'),
            'type' => 'select',
            'option_category' => 'configuration',
            'options' => array(
                'off' => esc_html__('In The Same Window', 'ds-suit'),
                'on' => esc_html__('In The New Tab', 'ds-suit'),
            ),
            'show_if' => [
                'image_link' => ['custom'],
            ],
            'toggle_slug' => 'link',
            'description' => esc_html__('Here you can choose whether or not your link opens in a new window', 'ds-suit'),
        ];

        $fields['use_overlay'] = [
            'label' => esc_html__('Image Overlay', 'ds-suit'),
            'type' => 'yes_no_button',
            'option_category' => 'layout',
            'options' => array(
                'off' => esc_html__('Off', 'ds-suit'),
                'on' => esc_html__('On', 'ds-suit'),
            ),
            'tab_slug' => 'advanced',
            'toggle_slug' => 'overlay',
            'description' => esc_html__('If enabled, an overlay color and icon will be displayed when a visitors hovers over the image', 'ds-suit'),
        ];

        $fields['overlay_icon_color'] = [
            'label' => esc_html__('Overlay Icon Color', 'ds-suit'),
            'type' => 'color-alpha',
            'custom_color' => true,
            'show_if' => [
                'use_overlay' => ['on'],
            ],
            'tab_slug' => 'advanced',
            'toggle_slug' => 'overlay',
            'description' => esc_html__('Here you can define a custom color for the overlay icon', 'ds-suit'),
        ];

        $fields['hover_overlay_color'] = [
            'label' => esc_html__('Hover Overlay Color', 'ds-suit'),
            'type' => 'color-alpha',
            'custom_color' => true,
            'show_if' => [
                'use_overlay' => ['on'],
            ],
            'tab_slug' => 'advanced',
            'toggle_slug' => 'overlay',
            'description' => esc_html__('Here you can define a custom color for the overlay', 'ds-suit'),
        ];

        $fields['hover_icon'] = [
            'label' => esc_html__('Hover Icon Picker', 'ds-suit'),
            'option_category' => 'configuration',
            'class' => array('et-pb-font-icon'),
            'type' => 'select_icon',
            'show_if' => [
                'use_overlay' => ['on'],
            ],
            'tab_slug' => 'advanced',
            'toggle_slug' => 'overlay',
            'description' => esc_html__('Here you can define a custom icon for the overlay', 'ds-suit'),
        ];

        $fields['align'] = [
            'label' => esc_html__('Image Alignment', 'ds-suit'),
            'type' => 'text_align',
            'option_category' => 'layout',
            'options' => et_builder_get_text_orientation_options(array('justified')),
            'tab_slug' => 'advanced',
            'toggle_slug' => 'alignment',
            'description' => esc_html__('Here you can choose the image alignment.', 'ds-suit'),
            'options_icon' => 'module_align',
        ];

        $fields['force_fullwidth'] = [
            'label' => esc_html__('Force Fullwidth', 'ds-suit'),
            'type' => 'yes_no_button',
            'option_category' => 'layout',
            'options' => array(
                'off' => esc_html__("No", 'ds-suit'),
                'on' => esc_html__('Yes', 'ds-suit'),
            ),
            'tab_slug' => 'advanced',
            'toggle_slug' => 'width',
        ];

        $fields['always_center_on_mobile'] = [
            'label' => esc_html__('Always Center Image On Mobile', 'ds-suit'),
            'type' => 'yes_no_button',
            'option_category' => 'layout',
            'options' => array(
                'on' => esc_html__('Yes', 'ds-suit'),
                'off' => esc_html__("No", 'ds-suit'),
            ),
            'tab_slug' => 'advanced',
            'toggle_slug' => 'alignment',
        ];

        return $fields;

    }

    public function get_advanced_fields_config()
    {

        $fields = [
            'text' => false,
            'fonts' => false,
            'margin_padding' => [
                'css' => [
                    'important' => 'all',
                ],
            ],
        ];

        return $fields;

    }

    public function render($attrs, $content = null, $render_slug)
    {
        $url = $this->props['url'];
        $url_new_window = $this->props['url_new_window'];
        $image_link = $this->props['image_link'];
        $align = $this->props['align'];
        $force_fullwidth = $this->props['force_fullwidth'];
        $always_center_on_mobile = $this->props['always_center_on_mobile'];
        $overlay_icon_color = $this->props['overlay_icon_color'];
        $hover_overlay_color = $this->props['hover_overlay_color'];
        $hover_icon = $this->props['hover_icon'];
        $use_overlay = $this->props['use_overlay'];
        $image_size = $this->props['image_size'];
        $src = get_the_post_thumbnail_url(null, $image_size);
        $thumbnail_id = get_post_thumbnail_id();
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
        $title_text = get_the_title($thumbnail_id);

        // Handle svg image behaviour
        $src_pathinfo = pathinfo($src);
        $is_src_svg = isset($src_pathinfo['extension']) ? 'svg' === $src_pathinfo['extension'] : false;

        if ('on' === $force_fullwidth) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%%',
                'declaration' => 'max-width: 100% !important;',
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%% .et_pb_image_wrap, %%order_class%% img',
                'declaration' => 'width: 100%;',
            ));
        }

        if ('' !== $align) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%%',
                'declaration' => sprintf(
                    'text-align: %1$s;',
                    esc_html($align)
                ),
            ));
        }

        if ('center' !== $align) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%%',
                'declaration' => sprintf(
                    'margin-%1$s: 0;',
                    esc_html($align)
                ),
            ));
        }

        if ('on' === $use_overlay) {
            if ('' !== $overlay_icon_color) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => '%%order_class%% .et_overlay:before',
                    'declaration' => sprintf(
                        'color: %1$s !important;',
                        esc_html($overlay_icon_color)
                    ),
                ));
            }

            if ('' !== $hover_overlay_color) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => '%%order_class%% .et_overlay',
                    'declaration' => sprintf(
                        'background-color: %1$s;',
                        esc_html($hover_overlay_color)
                    ),
                ));
            }

            $data_icon = '' !== $hover_icon
            ? sprintf(
                ' data-icon="%1$s"',
                esc_attr(et_pb_process_font_icon($hover_icon))
            )
            : '';

            $overlay_output = sprintf(
                '<span class="et_overlay%1$s"%2$s></span>',
                ('' !== $hover_icon ? ' et_pb_inline_icon' : ''),
                $data_icon
            );
        }

        // Set display block for svg image to avoid disappearing svg image
        if ($is_src_svg) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%% .et_pb_image_wrap',
                'declaration' => 'display: block;',
            ));
        }

        $output = sprintf(
            '<span class="et_pb_image_wrap">
				<img class="dss_post_featured_image_image" src="%1$s" alt="%2$s"%3$s />
				%4$s
			</span>',
            esc_url($src),
            esc_attr($alt),
            ('' !== $title_text ? sprintf(' title="%1$s"', esc_attr($title_text)) : ''),
            'on' === $use_overlay ? $overlay_output : ''
        );

        if ('post' === $image_link) {
            $output = sprintf(
                '<a href="%1$s">%2$s</a>',
                get_permalink(get_the_ID()),
                $output
            );
        } else if ('lightbox' === $image_link) {
            $output = sprintf(
                '<a href="%1$s" class="et_pb_lightbox_image" title="%3$s">%2$s</a>',
                get_the_post_thumbnail_url(null, 'full'), //esc_url($src),
                $output,
                esc_attr($title_text)
            );
        } else if ('custom' === $image_link) {
            $output = sprintf(
                '<a href="%1$s"%3$s>%2$s</a>',
                esc_url($url),
                $output,
                ('on' === $url_new_window ? ' target="_blank"' : '')
            );
        }

        $has_overlay = 'on' === $use_overlay ? ' et_pb_has_overlay' : '';
        $always_center = 'on' === $always_center_on_mobile ? ' et_always_center_on_mobile' : '';

        return sprintf(
            '<div class="et_pb_module et_pb_image %1$s%2$s">
				%3$s
			</div>',
            $has_overlay,
            $always_center,
            $output
        );

    }

    public function dss_image_size_options()
    {
        $sizes = array('' => 'Full Size');
        foreach ($this->dss_get_image_sizes() as $sizeKey => $sizeValue) {
            $sizes[$sizeKey] = sprintf(
                '%1$s (%2$s x %3$s,%4$s cropped)',
                $sizeKey,
                $sizeValue["width"],
                $sizeValue["height"],
                ($sizeValue["crop"] == false ? ' not' : '')
            );
        }
        return $sizes;
    }

    public function dss_get_image_sizes($size = '')
    {
        global $_wp_additional_image_sizes;

        $sizes = array();
        $get_intermediate_image_sizes = get_intermediate_image_sizes();

        // Create the full array with sizes and crop info
        foreach ($get_intermediate_image_sizes as $_size) {
            if (in_array($_size, array('thumbnail', 'medium', 'large'))) {
                $sizes[$_size]['width'] = get_option($_size . '_size_w');
                $sizes[$_size]['height'] = get_option($_size . '_size_h');
                $sizes[$_size]['crop'] = (bool) get_option($_size . '_crop');
            } elseif (isset($_wp_additional_image_sizes[$_size])) {
                $sizes[$_size] = array(
                    'width' => $_wp_additional_image_sizes[$_size]['width'],
                    'height' => $_wp_additional_image_sizes[$_size]['height'],
                    'crop' => $_wp_additional_image_sizes[$_size]['crop'],
                );
            }
        }

        // Get only 1 size if found
        if ($size) {
            if (isset($sizes[$size])) {
                return $sizes[$size];
            } else {
                return false;
            }
        }
        return $sizes;
    }

}

new DSS_Post_Featured_Image;
