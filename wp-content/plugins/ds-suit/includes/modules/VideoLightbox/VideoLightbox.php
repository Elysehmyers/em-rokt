<?php

class MFE_VideoLightbox extends ET_Builder_Module
{

    public $slug = 'dss_video_lightbox';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://divi-sensei.com/suit',
        'author' => 'Divi Sensei',
        'author_uri' => 'https://divi-sensei.com',
    );

    public function init()
    {
        $this->name = esc_html__('Sensei Video Ligthbox', 'ds-suit');

        $this->settings_modal_toggles = [
            'general' => [
                'toggles' => [
                    'video' => esc_html__('Video', 'ds-suit'),
                ],
            ],
            'advanced' => [
                'toggles' => [
                    'colors' => esc_html__('Colors', 'ds-suit'),
                ],
            ],
        ];

        $this->custom_css_fields = array(
			'wrapper' => array(
				'label'    => esc_html__( 'Wrapper', 'ds-suit' ),
				'selector' => '%%order_class%% .wrapper',
			),
			'image' => array(
				'label'    => esc_html__( 'Image (Element)', 'ds-suit' ),
				'selector' => '%%order_class%% .wrapper img',
			),
			'play_button' => array(
				'label'    => esc_html__( 'Play Button', 'ds-suit' ),
				'selector' => '%%order_class%% .wrapper .play-button',
			),
			'play_button_icon' => array(
				'label'    => esc_html__( 'Play Button Icon', 'ds-suit' ),
				'selector' => '%%order_class%% .wrapper .play-button:after',
			),
		);

    }

    public function get_fields()
    {
        $fields = [];

        $fields['video'] = [
            'label' => esc_html__('Video', 'ds-suit'),
            'type' => 'upload',
            'data_type' => 'video',
            'upload_button_text' => esc_html__('Upload Video', 'ds-suit'),
            'choose_text' => esc_html__('Choose Video', 'ds-suit'),
            'update_text' => esc_html__('Update Video', 'ds-suit'),
            'toggle_slug' => 'video',
            'option_category' => 'basic_option',
            'description' => esc_html__('Upload a video or insert a YouTube or Vimeo URL. If using YouTube links, make sure to use the actual video link (e. g. "youtube.com/watch?v=abcdefg") and not the shortened version (e. g. "youtu.be/abcdefg") to avoid conflicts.', 'ds-suit'),
        ];

        $fields['thumbnail'] = [
            'label' => esc_html__('Thumbnail', 'ds-suit'),
            'type' => 'upload',
            'data_type' => 'image',
            'upload_button_text' => esc_html__('Upload Image', 'ds-suit'),
            'choose_text' => esc_html__('Choose Image', 'ds-suit'),
            'update_text' => esc_html__('Update Image', 'ds-suit'),
            'toggle_slug' => 'video',
            'option_category' => 'basic_option',
        ];

        $fields['image_as_element'] = [
            'label' => esc_html__('Thumbnail as HTML Element', 'ds-suit'),
            'type' => 'yes_no_button',
            'option_category' => 'layout',
            'default' => 'off',
            'options' => array(
                'off' => esc_html__('Off', 'ds-suit'),
                'on' => esc_html__('On', 'ds-suit'),
            ),
            'toggle_slug' => 'video',
            'description' => esc_html__('Whether to use the thumbnail as background image (off) or as HTML element (on).', 'ds-suit'),
        ];

        $fields['lightbox_on_mobile'] = [
            'label' => esc_html__('Open Lightbox on Mobile', 'ds-suit'),
            'type' => 'yes_no_button',
            'option_category' => 'layout',
            'default' => 'on',
            'options' => array(
                'off' => esc_html__('Off', 'ds-suit'),
                'on' => esc_html__('On', 'ds-suit'),
            ),
            'toggle_slug' => 'video',
            'description' => esc_html__('Whether to open the lightbox on mobile (on) or to link to the url (off).', 'ds-suit'),
        ];

        $fields['open_new_tab'] = [
            'label' => esc_html__('Open Video in New Tab', 'ds-suit'),
            'type' => 'yes_no_button',
            'option_category' => 'layout',
            'default' => 'on',
            'options' => array(
                'off' => esc_html__('Off', 'ds-suit'),
                'on' => esc_html__('On', 'ds-suit'),
            ),
            'toggle_slug' => 'video',
            'show_if' => [
                'lightbox_on_mobile' => 'off',
            ],
        ];

        $fields['play_button_icon_color'] = [
            'label' => esc_html__('Icon Color', 'ds-suit'),
            'type' => 'color',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'colors',
            'default' => '#ffffff',
        ];

        $fields['play_button_background_color'] = [
            'label' => esc_html__('Background Color', 'ds-suit'),
            'type' => 'color',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'colors',
            'default' => et_builder_accent_color(),
        ];

        $fields['play_button_icon_color_hover'] = [
            'label' => esc_html__('Icon Hover Color', 'ds-suit'),
            'type' => 'color',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'colors',
        ];

        $fields['play_button_background_color_hover'] = [
            'label' => esc_html__('Background Hover Color', 'ds-suit'),
            'type' => 'color',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'colors',
        ];

        $fields['height'] = [
            'label' => esc_html__('Height', 'ds-suit'),
            'type' => 'range',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'width',
            'default' => '420px',
            'validate_unit' => true,
            'range_settings' => [
                'step' => 1,
                'min' => 50,
                'max' => 1000,
            ],
            'mobile_options' => true,
            'responsive' => true,
            'show_if' => [
                'image_as_element' => 'off',
            ],
        ];

        return $fields;
    }

    public function get_advanced_fields_config()
    {
        $advanced_fields = [];

        $advanced_fields['text'] = false;
        $advanced_fields['text_shadow'] = false;
        $advanced_fields['fonts'] = false;
        $advanced_fields['margin_padding'] = [
            'css' => [
                'important' => 'all',
            ],
        ];

        return $advanced_fields;
    }

    public function render($attrs, $content = null, $render_slug)
    {

        if('off' === $this->props["image_as_element"]) {
            ET_Builder_Element::set_style($render_slug, [
                'selector' => "%%order_class%% .wrapper",
                'declaration' => "background-image: url({$this->props['thumbnail']}); cursor: pointer;",
            ]);

            $height = $this->props['height'];
            $height_tablet = $this->props['height_tablet'];
            $height_phone = $this->props['height_phone'];
            $height_responsive = et_pb_get_responsive_status($this->props['height_last_edited']);

            $height_values = [
                'desktop' => $height,
                'tablet' => $height_tablet,
                'phone' => $height_phone,
            ];

            et_pb_generate_responsive_css($height_values, '%%order_class%% .wrapper', 'height', $render_slug);
        } else {
            ET_Builder_Element::set_style($render_slug, [
                'selector' => "%%order_class%% .wrapper img",
                'declaration' => "width: 100%;",
            ]);
        }

        ET_Builder_Element::set_style($render_slug, [
            'selector' => "%%order_class%% .wrapper .play-button:after",
            'declaration' => "border-left-color: {$this->props['play_button_icon_color']}",
        ]);

        ET_Builder_Element::set_style($render_slug, [
            'selector' => "%%order_class%% .wrapper:hover .play-button:after",
            'declaration' => "border-left-color: {$this->props['play_button_icon_color_hover']}",
        ]);

        ET_Builder_Element::set_style($render_slug, [
            'selector' => "%%order_class%% .wrapper .play-button",
            'declaration' => "background: {$this->props['play_button_background_color']}",
        ]);

        ET_Builder_Element::set_style($render_slug, [
            'selector' => "%%order_class%% .wrapper:hover .play-button",
            'declaration' => "background: {$this->props['play_button_background_color_hover']}",
        ]);

        

        $this->add_classname("preload");

        $image = "";
        if('on' === $this->props["image_as_element"]) {
            $image_alt = "";
            $image_title = "";
            $attachment_id = attachment_url_to_postid($image);
            if ($attachment_id > 0) {
                $image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
                $image_title = get_the_title($attachment_id);
            }

            $image = sprintf(
                '<img src="%1$s" alt="%2$s" title="%3$s">', 
                $this->props['thumbnail'],
                $image_alt,
                $image_title
            );
        }

        return sprintf(
            '<div class="wrapper">
                %2$s
                <a class="video" href=%1$s %3$s data-lightbox_on_mobile="%4$s"></a>
                <div class="play-button"></div>
            </div>',
            $this->ds_sanitize_video_url($this->props['video']),
            $image,
            'on' === $this->props['open_new_tab'] ? 'target="_blank"' : "",
            $this->props['lightbox_on_mobile']
        );
    }

    private function ds_sanitize_video_url($url) {
        return str_replace("youtu.be/", "youtube.com/watch?v=", $url);
    }
}

new MFE_VideoLightbox;
