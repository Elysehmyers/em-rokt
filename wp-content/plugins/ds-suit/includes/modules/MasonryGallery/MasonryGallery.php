<?php

/**
 * TODO:
 * -Pagination
 * -Setting to allow sorting images by title (a-z, z-a, random)
 * -Setting to apply box shadow to images
 */

class DSS_Masonry_Layout extends ET_Builder_Module
{

    public $slug = 'dss_masonry_gallery';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://divi-sensei.com/suit',
        'author' => 'Divi Sensei',
        'author_uri' => 'https://divi-sensei.com',
    );

    public function init()
    {
        $this->name = esc_html__('Sensei Masonry Gallery', 'ds-suit');
        $this->settings_modal_toggles = [
            'general' => [
                'toggles' => [
                    'images' => esc_html__('Images', 'ds-suit'),
                ],
            ],
            'advanced' => [
                'toggles' => [
                    'grid' => esc_html__('Grid', 'ds-suit'),
                    'grid_items' => esc_html__('Grid Items', 'ds-suit'),
                    'overlay' => esc_html__('Overlay', 'ds-suit'),
                ],
            ],
        ];
    }

    public function get_fields()
    {
        $fields = [];

        $fields["images"] = [
            'label' => esc_html__('Gallery Images', 'ds-suit'),
            'type' => 'upload-gallery',
            'option_category' => 'basic_option',
            'toggle_slug' => 'images',
            'computed_affects'   => array(
                '__gallery',
            ),
        ];

        $fields['gallery_orderby'] = array(
            'label'   => esc_html__( 'Order By', 'ds-suit' ),
            'type'    => $this->is_loading_bb_data() ? 'hidden' : 'select',
            'options' => array(
                ''     => esc_html__( 'Default', 'ds-suit' ),
                'rand' => esc_html__( 'Random', 'ds-suit' ),
            ),
            'default' => 'off',
            'class'   => array( 'et-pb-gallery-ids-field' ),
            'computed_affects' => array(
                '__gallery',
            ),
            'toggle_slug' => 'images',
        );

        $fields["title_in_lightbox"] = [
            'label' => esc_html__('Show Image Title in Lightbox', 'ds-suit'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'ds-suit'),
                'on' => esc_html__('On', 'ds-suit'),
            ),
            'toggle_slug' => 'images',
            'description' => esc_html__('Whether or not to show the image title in the lightbox. The title is automatically loaded from the media library.', 'ds-suit'),
            'computed_affects'   => array(
                '__gallery',
            ),
        ];
       
        $fields["caption_in_lightbox"] = [
            'label' => esc_html__('Show Image Caption in Lightbox', 'ds-suit'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'ds-suit'),
                'on' => esc_html__('On', 'ds-suit'),
            ),
            'toggle_slug' => 'images',
            'description' => esc_html__('Whether or not to show the image caption in the lightbox. The caption is automatically loaded from the media library.', 'ds-suit'),
            'computed_affects'   => array(
                '__gallery',
            ),
        ];

        $fields["columns"] = [
            'label' => esc_html__('Columns', 'ds-suit'),
            'type' => 'range',
            'option_category' => 'basic_option',
            'toggle_slug' => 'grid',
            'tab_slug' => 'advanced',
            'default' => '4',
            'range_settings' => array(
                'min' => '1',
                'max' => '10',
                'step' => '1',
            ),
            'mobile_options' => true,
            'responsive' => true,
            'unitless' => true,
            'computed_affects'   => array(
                '__gallery',
            ),
        ];

        $fields["gutter"] = [
            'label' => esc_html__('Gutter', 'ds-suit'),
            'type' => 'range',
            'option_category' => 'layout',
            'toggle_slug' => 'grid',
            'tab_slug' => 'advanced',
            'default' => '10',
            'range_settings' => array(
                'min' => '0',
                'max' => '100',
                'step' => '1',
            ),
            'mobile_options' => true,
            'responsive' => true,
            'unitless' => true,
            'computed_affects'   => array(
                '__gallery',
            ),
        ];

        $fields["show_overflow"] = [
            'label' => esc_html__('Show Overflow', 'ds-suit'),
            'description' => esc_html__('Hide or show the overflow of the module. Useful if you want to use box shadows on the images but be aware that too much gutter can cause weird effects on mobiles due to the extra margin of the module. In this case, you should set the overflow of the row or section to hidden.', 'ds-suit'),
            'type' => 'yes_no_button',
            'option_category' => 'layout',
            'toggle_slug' => 'grid',
            'tab_slug' => 'advanced',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'ds-suit'),
                'on' => esc_html__('On', 'ds-suit'),
            ),
        ];





        $fields["use_overlay"] = [
            'label' => esc_html__('Use Overlay', 'ds-suit-material'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'overlay',
            'options' => array(
                'off' => esc_html__('Off', 'ds-suit-material'),
                'on' => esc_html__('On', 'ds-suit-material'),
            ),
            'computed_affects'   => array(
                '__gallery',
            ),
        ];

        $fields["overlay_color"] = [
            'label' => esc_html__('Overlay Color', 'ds-suit-material'),
            'type' => 'color-alpha',
            'default' => et_builder_accent_color(),
            'tab_slug' => 'advanced',
            'toggle_slug' => 'overlay',
            'show_if' => [
                'use_overlay' => 'on',
            ],
        ];

        $fields['overlay_icon_color'] = array(
            'label' => esc_html__(' Overlay Icon Color', 'et_builder'),
            'type' => 'color-alpha',
            'custom_color' => true,
            'tab_slug' => 'advanced',
            'default' => '',
            'show_if' => [
                'use_overlay' => 'on',
            ],
            'toggle_slug' => 'overlay',
            'description' => esc_html__('Color of the overlay icon. The overlay icon is centered horizontally and vertically over the image.', 'et_builder'),
        );

        $fields['hover_icon'] = array(
            'label' => esc_html__('Overlay Icon', 'et_builder'),
            'type'                => 'select_icon',
            'option_category'     => 'configuration',
            'class'               => array( 'et-pb-font-icon' ),
            'option_category' => 'configuration',
            'default' => '',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'overlay',
            'show_if' => [
                'use_overlay' => 'on',
            ],
            'computed_affects'   => array(
                '__gallery',
            ),
        );

        $fields["__gallery"] = [
            'type' => 'computed',
            'computed_callback' => array('DSS_Masonry_Layout', 'render_images'),
            'computed_depends_on' => array(
                'images',
                'title_in_lightbox',
                'caption_in_lightbox',
                'gallery_orderby',
                'hover_icon',
                'use_overlay',
            ),
            'computed_minimum' => array(
                'images',
            ),
        ];


        $fields['use_thumbnails'] = [
            'label' => esc_html__('Use Responsive Thumbnails', 'ds-suit-material'),
            'description' => esc_html__('Whether or not to use custom sized thumbnails on different devices. If this option is disabled, the full size image will be used as thumbnail.', 'ds-suit'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'toggle_slug' => 'images',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'ds-suit-material'),
                'on' => esc_html__('On', 'ds-suit-material'),
            ),
        ];

        $fields['image_size_desktop'] = [
            'label' => esc_html__('Image Size (Desktop)', 'ds-suit'),
            'type' => 'select',
            'option_category' => 'basic_option',
            'default' => 'full',
            'options' => $this->dss_get_image_sizes(),
            'toggle_slug' => 'images',
            'description' => 'Here you can choose the image size to use. If you are using very large images, consider using a thumbnail size to speed up page loading time.',
            'show_if' => [
                'use_thumbnails' => 'on',
            ],
        ];

        $fields['image_size_tablet'] = [
            'label' => esc_html__('Image Size (Tablet)', 'ds-suit'),
            'type' => 'select',
            'option_category' => 'basic_option',
            'default' => 'full',
            'options' => $this->dss_get_image_sizes(),
            'toggle_slug' => 'images',
            'description' => 'Here you can choose the image size to use. If you are using very large images, consider using a thumbnail size to speed up page loading time.',
            'show_if' => [
                'use_thumbnails' => 'on',
            ],
        ];

        $fields['image_size_phone'] = [
            'label' => esc_html__('Image Size (Phone)', 'ds-suit'),
            'type' => 'select',
            'option_category' => 'basic_option',
            'default' => 'full',
            'options' => $this->dss_get_image_sizes(),
            'toggle_slug' => 'images',
            'description' => 'Here you can choose the image size to use. If you are using very large images, consider using a thumbnail size to speed up page loading time.',
            'show_if' => [
                'use_thumbnails' => 'on',
            ],
        ];

        return $fields;
    }

    public function get_advanced_fields_config()
    {

        $advanced_fields = [];

        $advanced_fields["text"] = false;
        $advanced_fields["text_shadow"] = false;
        $advanced_fields["fonts"] = false;

        $advanced_fields["borders"]["default"] = [
            'css' => [
                'main' => [
                    'border_radii' => "%%order_class%%",
                    'border_styles' => "%%order_class%%",
                ],
            ],
        ];

        $advanced_fields["borders"]["grid_item"] = [
            'label_prefix' => esc_html__('Grid Item', 'ds-suit'),
            'toggle_slug' => 'grid_items',
            'tab_slug' => 'advanced',
            'css' => [
                'main' => [
                    'border_radii' => "%%order_class%% .grid .grid-item.et_pb_gallery_image",
                    'border_styles' => "%%order_class%% .grid .grid-item.et_pb_gallery_image",
                ],
            ],
        ];

        $advanced_fields["box_shadow"]["images"] = [
            'label' => esc_html__('Grid Item Box Shadow', 'ds-suit'),
            'toggle_slug' => 'grid_items',
            'tab_slug' => 'advanced',
            'css' => [
                'main' => "%%order_class%% .grid .grid-item.et_pb_gallery_image",
            ],
        ];

        $advanced_fields['margin_padding'] = [
            'css' => [
                'important' => 'all',
            ],
        ];

        return $advanced_fields;
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

    private static function get_attachment_image($attachment_id, $image_size, $fallback_url)
    {
        $attachment = wp_get_attachment_image_src($attachment_id, $image_size);
        if ($attachment) {
            return $attachment[0];
        } else {
            return $fallback_url;
        }
    }

    static function render_images($args = array(), $conditional_tags = array(), $current_page = array())
    {
        $defaults = [
            'images' => '',
            'gallery_orderby' => '',
            'title_in_lightbox' => 'off',
            'caption_in_lightbox' => 'off',
            'use_overlay' => 'off',
            'hover_icon' => '',
            'image_size_desktop' => 'full',
            'image_size_tablet' => 'full',
            'image_size_phone' => 'full',
        ];

        $args = wp_parse_args($args, $defaults);

        $items = [
            '<div class="grid-sizer"></div>',
            '<div class="gutter-sizer"></div>',
        ];


        $attachment_ids = explode(",", $args["images"]);

        if('rand' === $args['gallery_orderby']) {
            // echo "every day I'm shuffling";
            shuffle($attachment_ids);
        } else {
            // echo "no shuffle today";
        }





        $overlay_output = '';
		$hover_icon = '';

		if ( 'on' === $args['use_overlay'] ) {
			$data_icon = '' !== $args['hover_icon']
				? sprintf(
					' data-icon="%1$s"',
                    esc_attr( et_pb_process_font_icon( $args['hover_icon'] ) ),
                    esc_attr($args['hover_icon'])
				)
				: 'data-no-icon';

			$overlay_output = sprintf(
				'<span class="et_overlay%1$s"%2$s></span>',
				( '' !== $args['hover_icon'] ? ' et_pb_inline_icon' : '' ),
				$data_icon
			);
        }
        

        //Check which image sizes to use
        
        foreach ($attachment_ids as $attachment_id) {
            $image = wp_get_attachment_image_src($attachment_id, "full")[0];
            $image_desktop_url = DSS_Masonry_Layout::get_attachment_image($attachment_id, $args['image_size_desktop'], $image);
            $image_tablet_url = DSS_Masonry_Layout::get_attachment_image($attachment_id, $args['image_size_tablet'], $image);
            $image_phone_url = DSS_Masonry_Layout::get_attachment_image($attachment_id, $args['image_size_phone'], $image);

            $image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
            $image_title = get_the_title($attachment_id);

            $items[] = sprintf(
                '<div class="grid-item et_pb_gallery_image">
                    <a href="%1$s"%4$s%5$s>
                        <img src="%1$s" 
                             alt="%2$s" 
                             title="%3$s" 
                             srcset="%9$s 768w, %8$s 980w, %7$s 1024w"
                             sizes="(max-width: 768px) 768px, (max-width: 980px) 980px, 1024px" />
                        %6$s
                    </a>
                </div>',
                $image,
                $image_alt,
                $image_title,
                'on' === $args["title_in_lightbox"] ?  " data-title='$image_title'" : '',
                'on' === $args["caption_in_lightbox"] ?  " data-caption='" . wp_get_attachment_caption($attachment_id) . "'" : '',
                'on' === $args['use_overlay'] ? et_core_esc_previously($overlay_output) : "",
                $image_desktop_url,
                $image_tablet_url,
                $image_phone_url                
            );
        }
        return implode("", $items);
    }

    public function render($attrs, $content = null, $render_slug)
    {
        $this->dss_apply_css($render_slug);

        $items = DSS_Masonry_Layout::render_images($this->props);

        return sprintf(
            '<div class="grid">
                %1$s
             </div>',
            $items
        );
    }

    public function dss_apply_css($render_slug)
    {

        $columns = $this->props["columns"];
        $columns_responsive_active = isset($this->props["columns_last_edited"]) && et_pb_get_responsive_status($this->props["columns_last_edited"]);
        $columns_tablet = $columns_responsive_active && $this->props["columns_tablet"] ? $this->props["columns_tablet"] : $columns;
        $columns_phone = $columns_responsive_active && $this->props["columns_phone"] ? $this->props["columns_phone"] : $columns_tablet;

        $gutter = $this->props["gutter"];
        $gutter_responsive_active = isset($this->props["gutter_last_edited"]) && et_pb_get_responsive_status($this->props["gutter_last_edited"]);
        $gutter_tablet = $gutter_responsive_active && $this->props["gutter_tablet"] ? $this->props["gutter_tablet"] : $gutter;
        $gutter_phone = $gutter_responsive_active && $this->props["gutter_phone"] ? $this->props["gutter_phone"] : $gutter_tablet;

        //Width of grid items
        \ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid-sizer, %%order_class%% .grid-item',
            'declaration' => "width: calc((100% - ({$columns} - 1) * {$gutter}px) / {$columns});",
        ]);

        \ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid-sizer, %%order_class%% .grid-item',
            'declaration' => "width: calc((100% - ({$columns_tablet} - 1) * {$gutter_tablet}px) / {$columns_tablet});",
            'media_query' => \ET_Builder_Element::get_media_query('max_width_980'),
        ]);

        \ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid-sizer, %%order_class%% .grid-item',
            'declaration' => "width: calc((100% - ({$columns_phone} - 1) * {$gutter_phone}px) / {$columns_phone});",
            'media_query' => \ET_Builder_Element::get_media_query('max_width_767'),
        ]);

        //Gutter of grid items
        \ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid-item',
            'declaration' => "margin-bottom: {$gutter}px;",
        ]);

        \ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid-item',
            'declaration' => "margin-bottom: {$gutter_tablet}px;",
            'media_query' => \ET_Builder_Element::get_media_query('max_width_980'),
        ]);

        \ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid-item',
            'declaration' => "margin-bottom: {$gutter_phone}px;",
            'media_query' => \ET_Builder_Element::get_media_query('max_width_767'),
        ]);

        \ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .gutter-sizer',
            'declaration' => "width: {$gutter}px;",
        ]);

        \ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .gutter-sizer',
            'declaration' => "width: {$gutter_tablet}px;",
            'media_query' => \ET_Builder_Element::get_media_query('max_width_980'),
        ]);

        \ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .gutter-sizer',
            'declaration' => "width: {$gutter_phone}px;",
            'media_query' => \ET_Builder_Element::get_media_query('max_width_767'),
        ]);

        //Remove gutter from outer grid
        \ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid',
            'declaration' => "margin-bottom: -{$gutter}px;",
        ]);

        \ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid',
            'declaration' => "margin-bottom: -{$gutter_tablet}px;",
            'media_query' => \ET_Builder_Element::get_media_query('max_width_980'),
        ]);

        \ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .grid',
            'declaration' => "margin-bottom: -{$gutter_phone}px;",
            'media_query' => \ET_Builder_Element::get_media_query('max_width_767'),
        ]);

        if('on' === $this->props["show_overflow"]){
            \ET_Builder_Element::set_style($render_slug, [
                'selector' => '%%order_class%%.dss_masonry_gallery, %%order_class%%.dss_masonry_gallery .grid-item',
                'declaration' => "overflow: visible !important;",
            ]); 
        }
        if('on' === $this->props["use_overlay"]){
            \ET_Builder_Element::set_style($render_slug, [
                'selector' => '%%order_class%%.dss_masonry_gallery .grid .grid-item .et_overlay',
                'declaration' => "background: {$this->props['overlay_color']};",
            ]); 
            
            \ET_Builder_Element::set_style($render_slug, [
                'selector' => '%%order_class%%.dss_masonry_gallery .grid .grid-item .et_overlay:before',
                'declaration' => "color: {$this->props['overlay_icon_color']};",
            ]); 
        }
    }

}

new DSS_Masonry_Layout;
