<?php

class DSS_Post_Meta_Parent extends ET_Builder_Module {

	public $slug       = 'dss_post_meta_parent';
	public $vb_support = 'on';
	public $child_slug = 'dss_post_meta_child';

	protected $module_credits = array(
		'module_uri' => 'https://divi-sensei.com/suit',
		'author'     => 'Divi Sensei',
		'author_uri' => 'https://divi-sensei.com',
	);

	public function init() {
		
		$this->name = esc_html__( 'Sensei Post Meta', 'ds-suit' );

		$this->settings_modal_toggles = [
			'general'  => [
				'toggles' => [
					'meta' => esc_html__( 'Meta', 'ds-suit' ),
				],
			],
			'advanced' => [
				'toggles' => [
					'meta' => esc_html__( 'Meta', 'ds-suit' ),
					'text' => [
						'title' => esc_html__('Text', 'ds-suit'),
						'priority' => 49,
						'tabbed_subtoggles' => true,
						'sub_toggles' => [
							'text' => [
								'name' => 'Text',
								'icon' => 'text-left',
							],
							'link' => [
								'name' => 'Link',
								'icon' => 'text-link',
							],
						],
					],
				],
			],
		];

		$this->custom_css_fields = array(
			'meta_icon' => array(
				'label'    => esc_html__( 'Icon', 'ds-suit' ),
				'selector' => '%%order_class%% .dss_post_meta_item .icon',
			),
			'meta_text' => array(
				'label'    => esc_html__( 'Text (Author, Date, etc.)', 'ds-suit' ),
				'selector' => '%%order_class%% .dss_post_meta_item .text',
			),
			'meta_link' => array(
				'label'    => esc_html__( 'Links (e. g. Author, Terms or Comments)', 'ds-suit' ),
				'selector' => '%%order_class%% .dss_post_meta_item .link',
			),
			'meta_author' => array(
				'label'    => esc_html__( 'Author', 'ds-suit' ),
				'selector' => '%%order_class%% .dss_post_meta_item .author',
			),
			'meta_date' => array(
				'label'    => esc_html__( 'Date', 'ds-suit' ),
				'selector' => '%%order_class%% .dss_post_meta_item .date',
			),
			'meta_categories' => array(
				'label'    => esc_html__( 'Categories', 'ds-suit' ),
				'selector' => '%%order_class%% .dss_post_meta_item .categories',
			),
			'meta_comments' => array(
				'label'    => esc_html__( 'Comments', 'ds-suit' ),
				'selector' => '%%order_class%% .dss_post_meta_item .comments',
			),
		);

	}

	public function get_fields() {
		$fields = [];

		$fields['direction'] = array(
			'label' 			=> esc_html__( 'Direction', 'ds-suit'),
			'type' 				=> 'select',
			'option_category' 	=> 'basic_option',
			'options' 			=> array(
				'horizontal' 	=> 'Horizontal',
				'vertical' 		=> 'Vertical',
			),
			'default' 			=> 'horizontal',
			'toggle_slug' 		=> 'meta',
			'description' 		=> esc_html__( 'Whether or not to show the label for this field.', 'ds-suit'),
		);

		$fields['prefix_separator'] = array(
			'label' 		=> esc_html__( 'Pefix Separator', 'ds-suit'),
			'type' 			=> 'text',
			'description' 	=> esc_html__( 'Enter a custom text to be displayed before the first item.', 'ds-suit'),
			'toggle_slug' 	=> 'meta',
			'show_if' 		=> [
				'direction' => [ 'horizontal' ],
			],
		);

		$fields['separator'] = array(
			'label' 		=> esc_html__( 'Separator', 'ds-suit'),
			'type' 			=> 'text',
			'description'	=> esc_html__( 'Enter a custom separator, e. g. " | " or " - ".', 'ds-suit'),
			'toggle_slug' 	=> 'meta',
			'show_if' 		=> [
				'direction' => [ 'horizontal' ],
			],
		);

		$fields['suffix_separator'] = array(
			'label' 		=> esc_html__( 'Suffix Separator', 'ds-suit'),
			'type' 			=> 'text',
			'description' 	=> esc_html__( 'Enter a custom text to be displayed after the last item.', 'ds-suit'),
			'toggle_slug' 	=> 'meta',
			'show_if' 		=> [
				'direction' => [ 'horizontal' ],
			],
		);

		$fields['align'] = array(
			'label' 			=> esc_html__('Alignment', 'ds-suit'),
			'type' 				=> 'text_align',
			'option_category' 	=> 'layout',
			'options' 			=> et_builder_get_text_orientation_options(array('justified')),
			'tab_slug' 			=> 'advanced',
			'toggle_slug' 		=> 'meta',
			'description' 		=> esc_html__('Here you can choose the item alignment.', 'ds-suit'),
			'options_icon' 		=> 'module_align',
		);
		
		return $fields;
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts' => array(
				'link' => array(
					'label' => esc_html__('Links', 'ds-suit'),
					'toggle_slug' => 'text',
					'sub_toggle' => 'link',
					'css' => array(
						'main' => "%%order_class%% .dss_post_meta_item span.text a",
						'important' => 'all',
					),
					'line_height' => array(
						'default' => '1em',
						'range_settings' => array(
							'min' => '0.1',
							'max' => '10',
							'step' => '0.1',
						),
					),
					'font_size' => array(
						'default' => '1em',
						'range_settings' => array(
							'min' => '0.1',
							'max' => '10',
							'step' => '0.1',
						),
					),
				),
				'text' => array(
					'label' => esc_html__('Text', 'ds-suit'),
					'toggle_slug' => 'text',
					'sub_toggle' => 'text',
					'css' => array(
						'main' => "%%order_class%% .dss_post_meta_item,
								%%order_class%% .dss_post_meta_item span,
								%%order_class%% .dss_post_meta_item span a",
						'important' => 'all',
					),
					'line_height' => array(
						'default' => '1em',
						'range_settings' => array(
							'min' => '0.1',
							'max' => '10',
							'step' => '0.1',
						),
					),
					'font_size' => array(
						'default' => '1em',
						'range_settings' => array(
							'min' => '0.1',
							'max' => '10',
							'step' => '0.1',
						),
					),
				),
			),
            'margin_padding' => [
                'css' => [
                    'important' => 'all',
                ],
            ],
		);

	}

    public function before_render() {
        global $meta_items;
        $meta_items = array();
    }

	public function render( $attrs, $content = null, $render_slug ) {

		$direction = $this->props['direction'];
		$direction_class = "dss_post_meta_direction_{$direction}";
		$content = '';
		global $meta_items;

		if ('horizontal' === $direction) {
			$content .= $this->props['prefix_separator'];
			$content .= implode($this->props['separator'], $meta_items);
			$content .= $this->props['suffix_separator'];
		} else {
			$content = implode('', $meta_items);
		}

		$align = $this->props['align'];
		if ('' !== $align) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector' => '%%order_class%%',
				'declaration' => sprintf(
					'text-align: %1$s;',
					esc_html($align)
				),
			));
		}

		return '<div class="post-meta ' . $direction_class . '">' . $content . '</div>';
	}
}

new DSS_Post_Meta_Parent;
