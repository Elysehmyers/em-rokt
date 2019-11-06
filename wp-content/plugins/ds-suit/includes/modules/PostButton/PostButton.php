<?php

class DSS_Post_Button extends ET_Builder_Module {

	public $slug       = 'dss_post_button';
	public $vb_support = 'on';

	

	protected $module_credits = array(
		'module_uri' => 'https://divi-sensei.com/suit',
		'author'     => 'Divi Sensei',
		'author_uri' => 'https://divi-sensei.com',
	);

	public function init() {
		$this->name = esc_html__( 'Sensei Post Button', 'ds-suit' );
		$this->main_css_element = '%%order_class%%';
		$this->custom_css_fields = array(
			'button' => array(
				'label'    => esc_html__( 'Button', 'dicm-divi-custom-modules' ),
				'selector' => 'a.dss_post_button_button',
			),
		);
	}

	public function get_fields() {
		$fields = [];

		$fields['button_text'] = [
			'label' => esc_html__( 'Button Text', 'ds-suit' ),
			'type' => 'text',
			'option_category' => 'basic_option',
			'toggle_slug' => 'text',
			'default' => esc_html__( 'Read More', 'ds-suit' ),
		];

		$fields['url_new_window'] = array(
			'label'            => esc_html__( 'Url Opens', 'ds-suit' ),
			'type'             => 'select',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'In The Same Window', 'ds-suit' ),
				'on'  => esc_html__( 'In The New Tab', 'ds-suit' ),
			),
			'toggle_slug'      => 'text',
			'description'      => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'ds-suit' ),
			'default_on_front' => 'off',
        );
        
        
        $fields['button_margin'] = array(
            'label' => esc_html__('Button Margin', 'ds-suit'),
            'type' => 'custom_margin',
            'mobile_options' => true,
            'responsive' => true,
            'option_category' => 'layout',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'button',
        );

        $fields['button_padding'] = array(
            'label' => esc_html__('Button Padding', 'ds-suit'),
            'type' => 'custom_margin',
            'mobile_options' => true,
            'responsive' => true,
            'option_category' => 'layout',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'button',
        );

		return $fields;
	}

	function get_advanced_fields_config() {
		return array(
			'borders'               => array(
				'default' => false,
			),
			'button'                => array(
				'button' => array(
					'label' => esc_html__( 'Button', 'et_builder' ),
					'css'   => array(
						'alignment'   => "%%order_class%% .et_pb_button_wrapper",
                    ),
                    'box_shadow' => [
                        'css' => [
                            'main' => "{$this->main_css_element}.et_pb_module .et_pb_button ",
                        ],
                    ],
				),
			),
			'margin_padding' => array(
				'css' => array(
					'important' => 'all',
				),
			),
			'text' => array(
				'use_text_orientation' => true,
				'use_background_layout' => false,
				'css' => array(
					'text_orientation' => "{$this->main_css_element}",
				),
				'text_orientation' => array(
					'exclude_options' => array(
						'justified'
					),
				),
			),
			'text_shadow' => array(
				'default' => false,
			),
			'fonts'                 => false,
		);

	}

	public function render( $attrs, $content = null, $render_slug ) {

        $this->ds_apply_css($render_slug);

		$button_url        = get_permalink(get_the_ID());
		$button_rel        = $this->props['button_rel'];
		$button_text       = $this->props['button_text'];
		$url_new_window    = $this->props['url_new_window'];
		$custom_icon       = $this->props['button_icon'];
		$button_custom     = $this->props['custom_button'];

		// Nothing to output if neither Button Text nor Button URL defined
		$button_url = trim( $button_url );

		if ( '' === $button_text && '' === $button_url ) {
			return '';
		}

		// Module classnames
		$this->add_classname( "et_pb_button_module_wrapper" );
		
		$button_classname = [
			"et_pb_button",
			// "et_pb_module",
		];

		// Render Button
		return $this->render_button( array(
			'button_id'        => $this->module_id( false ),
			'button_classname' => $button_classname,
			'button_custom'    => $button_custom,
			'button_rel'       => $button_rel,
			'button_text'      => $button_text,
			'button_url'       => $button_url,
			'custom_icon'      => $custom_icon,
			'has_wrapper'      => false,
			'url_new_window'   => $url_new_window,
		) );

    }
    
    
    public function ds_apply_css($render_slug)
    {
        $this->apply_custom_margin_padding(
            $render_slug,
            'button_margin',
            'margin',
            "{$this->main_css_element}.et_pb_module .et_pb_button"
        );

        $this->apply_custom_margin_padding(
            $render_slug,
            'button_padding',
            'padding',
            "{$this->main_css_element}.et_pb_module .et_pb_button"
        );
    }

    public function apply_custom_margin_padding($function_name, $slug, $type, $class, $important = true)
    {
        $slug_value = $this->props[$slug];
        $slug_value_tablet = $this->props[$slug . '_tablet'];
        $slug_value_phone = $this->props[$slug . '_phone'];
        $slug_value_last_edited = $this->props[$slug . '_last_edited'];
        $slug_value_responsive_active = et_pb_get_responsive_status($slug_value_last_edited);

        if (isset($slug_value) && !empty($slug_value)) {
            ET_Builder_Element::set_style($function_name, array(
                'selector' => $class,
                'declaration' => et_builder_get_element_style_css($slug_value, $type, $important),
            ));
        }

        if (isset($slug_value_tablet) && !empty($slug_value_tablet) && $slug_value_responsive_active) {
            ET_Builder_Element::set_style($function_name, array(
                'selector' => $class,
                'declaration' => et_builder_get_element_style_css($slug_value_tablet, $type, $important),
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));
        }

        if (isset($slug_value_phone) && !empty($slug_value_phone) && $slug_value_responsive_active) {
            ET_Builder_Element::set_style($function_name, array(
                'selector' => $class,
                'declaration' => et_builder_get_element_style_css($slug_value_phone, $type, $important),
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));
        }
    }
}

new DSS_Post_Button;
