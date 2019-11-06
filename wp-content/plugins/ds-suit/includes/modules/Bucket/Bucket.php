<?php

class DSS_Bucket extends ET_Builder_Module
{

    public $slug = 'dss_bucket';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://divi-sensei.com/suit',
        'author' => 'Divi Sensei',
        'author_uri' => 'https://divi-sensei.com',
    );

    public function init()
    {
        $this->name = esc_html__('Sensei Bucket', 'ds-suit');

        $this->custom_css_fields = array(
            'bucket_image' => array(
                'label' => esc_html__('Image', 'ds-suit'),
                'selector' => '.dss_bucket_image',
            ),
            'bucket_image_container' => array(
                'label' => esc_html__('Image Container', 'ds-suit'),
                'selector' => '.dss_bucket_image',
            ),
            'bucket_text_container' => array(
                'label' => esc_html__('Text Container', 'ds-suit'),
                'selector' => '.dss_bucket_text_container',
            ),
            'bucke_title' => array(
                'label' => esc_html__('Title', 'ds-suit'),
                'selector' => '.dss_bucket_title',
            ),
            'bucket_content' => array(
                'label' => esc_html__('Content', 'ds-suit'),
                'selector' => '.dss_bucket_content',
            ),
        );

        $this->settings_modal_toggles = [
            'general' => [
                'toggles' => [
                    // 'title' => esc_html__('Title', 'ds-suit'),
                    // 'content' => esc_html__('Content', 'ds-suit'),
                    'text' => esc_html__('Text', 'ds-suit'),
                    'link' => esc_html__('Link', 'ds-suit'),
                    'image' => esc_html__('Image', 'ds-suit'),
                ],
            ],
            'advanced' => [
                'toggles' => [
                    'text' => [
                        'title' => esc_html__('Text', 'ds-suit'),
                        'priority' => 49,
                        'tabbed_subtoggles' => true,
                        'sub_toggles' => [
                            'header' => array(
                                'name' => esc_html__('Header', 'ds-suit'),
                            ),
                            'body' => array(
                                'name' => esc_html__('Body', 'ds-suit'),
                            ),
                        ],
                    ],
                    'image' => esc_html__( 'Image', 'ds-suit' ),
                    // 'size' => esc_html__( 'Size', 'ds-suit' ),
                ],
            ],
        ];
    }

    public function get_fields()
    {

        $fields = [
            'title' => array(
                'label' => esc_html__('Title', 'ds-suit'),
                'type' => 'text',
                'default' => '',
                'option_category' => 'basic_option',
                'description' => esc_html__('The title will appear in the center of the bucket.', 'ds-suit'),
                'toggle_slug' => 'text',
            ),
            'content' => array(
                'label' => esc_html__('Content', 'ds-suit'),
                'type' => 'tiny_mce',
                'default' => '',
                'option_category' => 'basic_option',
                'description' => esc_html__('Input the main text content for your module here.', 'ds-suit'),
                'toggle_slug' => 'text',
            ),

            'image' => array(
                'label' => esc_html__('Image', 'ds-suit'),
                'type' => 'upload',
                'default' => '',
                'option_category' => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'ds-suit'),
                'choose_text' => esc_attr__('Choose an Image', 'ds-suit'),
                'update_text' => esc_attr__('Set As Image', 'ds-suit'),
                'description' => esc_html__('Upload an image to display as the backgorund of the module.', 'ds-suit'),
                'toggle_slug' => 'image',
            ),
            'image_size_desktop' => [
                'label' => esc_html__('Image Size (Desktop)', 'ds-suit'),
                'type' => 'select',
                'option_category' => 'basic_option',
                'default' => 'full',
                'options' => $this->dss_get_image_sizes(),
                'toggle_slug' => 'image',
                'description' => 'Here you can choose the image size to use. If you are using very large images, consider using a thumbnail size to speed up page loading time.',
            ],
            'image_size_tablet' => array(
                'label' => esc_html__('Image Size (Tablet)', 'ds-suit'),
                'type' => 'select',
                'option_category' => 'basic_option',
                'default' => 'full',
                'options' => $this->dss_get_image_sizes(),
                'toggle_slug' => 'image',
                'description' => 'Here you can choose the image size to use. If you are using very large images, consider using a thumbnail size to speed up page loading time.',
            ),
            'image_size_phone' => array(
                'label' => esc_html__('Image Size (Phone)', 'ds-suit'),
                'type' => 'select',
                'option_category' => 'basic_option',
                'default' => 'full',
                'options' => $this->dss_get_image_sizes(),
                'toggle_slug' => 'image',
                'description' => 'Here you can choose the image size to use. If you are using very large images, consider using a thumbnail size to speed up page loading time.',
            ),

            'url' => array(
                'label' => esc_html__('Url', 'ds-suit'),
                'type' => 'text',
                'default' => '',
                'option_category' => 'basic_option',
                'description' => esc_html__('If you would like to make your bucket a link, input your destination URL here.', 'ds-suit'),
                'toggle_slug' => 'link',
            ),
            'url_new_window' => array(
                'label' => esc_html__('Url Opens', 'ds-suit'),
                'type' => 'select',
                'default' => 'off',
                'option_category' => 'configuration',
                'options' => array(
                    'off' => esc_html__('In The Same Window', 'ds-suit'),
                    'on' => esc_html__('In The New Tab', 'ds-suit'),
                ),
                'toggle_slug' => 'link',
                'description' => esc_html__('Here you can choose whether or not your link opens in a new window', 'ds-suit'),
            ),

            'height' => array(
                'label' => esc_html__('Bucket Height', 'ds-suit'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'width',
                'mobile_options' => true,
                'responsive' => true,
                'validate_unit' => true,
                'default' => '300px',
                'range_settings' => array(
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                ),
            ),

            'background_hover_animation' => [
                'label' => esc_html__('Background Hover Animation', 'ds-suit'),
                'type' => 'select',
                'option_category' => 'layout',
                'options' => [
                    'none' => esc_html__('None', 'ds-suit'),
                    'zoom_in' => esc_html__('Zoom In', 'ds-suit'),
                    'zoom_out' => esc_html__('Zoom Out', 'ds-suit'),
                ],
                'toggle_slug' => 'animation',
                'tab_slug' => 'advanced',
            ],

            'background_hover_blur' => [
                'label' => esc_html__('Blur Background on Hover', 'ds-suit'),
                'type' => 'yes_no_button',
                'option_category' => 'layout',
                'options' => array(
                    'off' => esc_html__('Off', 'ds-suit'),
                    'on' => esc_html__('On', 'ds-suit'),
                ),
                'default' => 'off',
                'toggle_slug' => 'animation',
                'tab_slug' => 'advanced',
            ],

            'background_hover_blur_radius' => array(
                'label' => esc_html__('Blur Radius', 'ds-suit'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'animation',
                'validate_unit' => true,
                'default' => '10px',
                'range_settings' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'show_if' => [
                    'background_hover_blur' => 'on',
                ],
            ),

        ];

        return $fields;

    }

    public function get_advanced_fields_config()
    {

        $fields = [
            'text' => false,
            'text_shadow' => false,
            'fonts' => array(
                'header' => array(
                    'label' => esc_html__('Header', 'ds-suit'),
                    'toggle_slug' => 'text',
                    'sub_toggle' => 'header',
                    'css' => array(
                        'main' => "{$this->main_css_element} .dss_bucket_title",
                    ),
                    'header_level' => ['default' => 'h2'],
                ),
                'body' => array(
                    'label' => esc_html__('Body', 'ds-suit'),
                    'toggle_slug' => 'text',
                    'sub_toggle' => 'body',
                    'css' => array(
                        'main' => "{$this->main_css_element} .dss_bucket_content",
                    ),
                ),
            ),
            'margin_padding' => [
                'css' => [
                    'important' => 'all',
                ],
            ],
            //TODO: Somehow make this work with hover on moduel to apply to image
            'filters'               => array(
				'css' => array(
					'main' => '%%order_class%%',
				),
				'child_filters_target' => array(
					'tab_slug' => 'advanced',
                    'toggle_slug' => 'image',
				),
            ),
            'image'                 => array(
				'css' => array(
					'main' => '%%order_class%% .dss_bucket_image_container',
				),
			),
        ];

        return $fields;

    }

    public function render($attrs, $content = null, $render_slug)
    {
        $this->dss_apply_css($render_slug);

        $link_start = '';
        $link_end = '';

        if (!empty($this->props['url'])) {
            $link_start = sprintf(
                '<a class="dss_bucket_link" href="%1$s" target="%2$s">',
                esc_url($this->props['url']),
                ($this->props['url_new_window'] === 'on' ? "_blank" : "_self")
            );
            $link_end = sprintf('</a>');
        }

        return sprintf(
            '%1$s
                <div class="dss_bucket_wrapper">
                    %3$s
                    <div class="dss_bucket_text_container">
                        %4$s
                        %5$s
                    </div>
                </div>
            %2$s',
            $link_start,
            $link_end,
            $this->dss_render_image(),
            $this->dss_render_title(),
            $this->dss_render_content()
        );

    }

    public function dss_apply_css($render_slug)
    {
        //FIXME: Currently not usable since selector has no effect due to hover being captured by text wrapper instead image/module
        // Images: Add CSS Filters and Mix Blend Mode rules (if set)
        if (array_key_exists('image', $this->advanced_fields) && array_key_exists('css', $this->advanced_fields['image'])) {
            $this->add_classname($this->generate_css_filters(
                $render_slug,
                'child_',
                self::$data_utils->array_get($this->advanced_fields['image']['css'], 'main', '%%order_class%%')
            ));
        }


        $filters = array(
            'hue_rotate', 'saturate', 'brightness', 'contrast', 'invert', 'sepia', 'opacity', 'blur'
        );
        
        foreach ( $filters as $filter ) {
            // Don't apply hover filter if it is not enabled
            if ( ! et_pb_hover_options()->is_enabled( "child_filter_{$filter}", $this->props ) ) {
                continue;
            }
        
            $hover_suffix = et_pb_hover_options()->get_suffix();
        
            $value = self::$data_utils->array_get( $this->props, "child_filter_${filter}${hover_suffix}", '');
        
            $css_value = '';
        
            $value = et_sanitize_input_unit( $value, false, 'deg' );
            $label_css_format = str_replace( '_', '-', $filter );
        
            // Construct string of all CSS Filter values
            $css_value .= esc_html( " ${label_css_format}(${value})" );
        
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%%:hover .dss_bucket_image_container',
                'declaration' => sprintf(
                    'filter: %1$s;',
                    $css_value
                ),
            ) );
        }

        $height = $this->props['height'];
        $height_tablet = $this->props['height_tablet'];
        $height_phone = $this->props['height_phone'];
        $height_last_edited = $this->props['height_last_edited'];
        $height_responsive_active = et_pb_get_responsive_status($height_last_edited);

        if ($height) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%% .dss_bucket_wrapper',
                'declaration' => "height: {$height};",
            ));
        }

        if ($height_tablet && $height_responsive_active) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%% .dss_bucket_wrapper',
                'declaration' => "height: {$height_tablet};",
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));
        }

        if ($height_phone && $height_responsive_active) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%% .dss_bucket_wrapper',
                'declaration' => "height: {$height_phone};",
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));
        }

        ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% .dss_bucket_image.tablet, %%order_class%% .dss_bucket_image.phone',
            'declaration' => "display: none;",
        ));

        ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% .dss_bucket_image.desktop, %%order_class%% .dss_bucket_image.phone',
            'declaration' => "display: none;",
            'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
        ));

        ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% .dss_bucket_image.tablet',
            'declaration' => "display: unset;",
            'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
        ));

        ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% .dss_bucket_image.desktop, %%order_class%% .dss_bucket_image.tablet',
            'declaration' => "display: none;",
            'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
        ));

        ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% .dss_bucket_image.phone',
            'declaration' => "display: unset;",
            'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
        ));

        if ($this->props['background_hover_animation'] === 'zoom_out') {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%%:hover .dss_bucket_image',
                'declaration' => "transform: scale(1.0) !important;",
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%% .dss_bucket_image',
                'declaration' => "transform: scale(1.1) !important;",
            ));
        }

        if ($this->props['background_hover_animation'] === 'zoom_in') {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%%:hover .dss_bucket_image',
                'declaration' => "transform: scale(1.1) !important;",
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%% .dss_bucket_image',
                'declaration' => "transform: scale(1.0) !important;",
            ));
        }

        if ('on' === $this->props['background_hover_blur']) {
            $radius = $this->props['background_hover_blur_radius'];
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%%:hover .dss_bucket_image',
                'declaration' => "filter: blur({$radius});",
            ));
        }

    }

    public function dss_render_image()
    {
        // print_r($this->props);
        $image = $this->props['image'];
        $image_desktop_url = $image;
        $image_tablet_url = $image;
        $image_phone_url = $image;
        $image_alt = '';
        $image_title = '';

        $src_pathinfo = pathinfo($image);
        $is_svg = isset($src_pathinfo['extension']) ? 'svg' === $src_pathinfo['extension'] : false;

        $attachment_id = attachment_url_to_postid($image);
        if (!$is_svg && $attachment_id > 0) {
            $image_desktop_url = $this->get_attachment_image($attachment_id, $this->props['image_size_desktop'], $image);
            $image_tablet_url = $this->get_attachment_image($attachment_id, $this->props['image_size_tablet'], $image);
            $image_phone_url = $this->get_attachment_image($attachment_id, $this->props['image_size_phone'], $image);
            $image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
            $image_title = get_the_title($attachment_id);
        }

        if ($is_svg) {
            return sprintf(
                ' <div class="dss_bucket_image_container" style="display: block;">
                    <img class="dss_bucket_image" src="%3$s" alt="%1$s" title="%2$s"  />
                </div>',
                $image_alt,
                $image_title,
                $image
            );
        } else {
            return sprintf(
                '<div class="dss_bucket_image_container">
                    <img class="dss_bucket_image"
                        alt="%1$s"
                        title="%2$s"
                        src="%3$s"
                        srcset="%5$s 768w, %4$s 980w, %3$s 1024w"
                        sizes="(max-width: 768px) 768px, (max-width: 980px) 980px, 1024px"
                    />
                </div>',
                $image_alt,
                $image_title,
                $image_desktop_url,
                $image_tablet_url,
                $image_phone_url
            );

            // <img src={result.image_url}
            //             alt={result.image_alt}
            //             title={result.image_title}
            //             srcSet={`${result.image_phone_url} 768w, ${result.image_tablet_url} 980w, ${result.image_desktop_url} 1024w`}
            //             sizes="(max-width: 768px) 768px, (max-width: 980px) 980px, 1024px" />

        }
    }

    public function dss_render_title()
    {
        return sprintf(
            '<div class="dss_bucket_title_wrapper">
                <%1$s class="dss_bucket_title">%2$s</%1$s>
            </div>',
            $this->props['header_level'],
            $this->props['title']
        );
    }

    public function dss_render_content()
    {
        return sprintf(
            '<div class="dss_bucket_content_wrapper">
                <div class="dss_bucket_content">%1$s</div>
            </div>',
            $this->content
        );
    }

    public function dss_get_image_sizes()
    {
        global $_wp_additional_image_sizes;
        $sizes = array();
        $get_intermediate_image_sizes = get_intermediate_image_sizes();
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

        $image_sizes = array(
            'full' => esc_html__('Full Size', 'ds-suit'),
        );
        foreach ($sizes as $sizeKey => $sizeValue) {
            $image_sizes[$sizeKey] = sprintf(
                '%1$s (%2$s x %3$s,%4$s cropped)',
                $sizeKey,
                $sizeValue["width"],
                $sizeValue["height"],
                ($sizeValue["crop"] == false ? ' not' : '')

            );
        }

        return $image_sizes;
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
}

new DSS_Bucket;
