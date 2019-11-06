<?php

class DSS_Post_Excerpt extends ET_Builder_Module {

	public $slug       = 'dss_post_excerpt';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divi-sensei.com/suit',
		'author'     => 'Divi Sensei',
		'author_uri' => 'https://divi-sensei.com',
	);

	public function init() {
		$this->name = esc_html__( 'Sensei Post Excerpt', 'ds-suit' );

		$this->custom_css_fields = array(
			'excerpt' => array(
				'label'    => esc_html__( 'Excerpt', 'ds-suit' ),
				'selector' => '%%order_class%% .dss_post_excerpt_text',
			),
			'read_more' => array(
				'label'    => esc_html__( 'Read More', 'ds-suit' ),
				'selector' => '%%order_class%% .dss_post_excerpt_read_more',
			),
			'wrapper' => array(
				'label'    => esc_html__( 'Wrapper', 'ds-suit' ),
				'selector' => '%%order_class%% .dss_post_excerpt_wrapper',
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
                    'excerpt' => [
                        'title' => esc_html__('Excerpt Text', 'ds-suit'),
                        'priority' => 59,
                        'tabbed_subtoggles' => true,
                        'sub_toggles' => [
                            'excerpt' => array(
                                'name' => esc_html__('Excerpt', 'ds-suit'),
                            ),
                            'read_more' => array(
                                'name' => esc_html__('Read More', 'ds-suit'),
                            ),
                        ],
                    ],
                    // 'image' => esc_html__( 'Image', 'ds-suit' ),
                    // 'size' => esc_html__( 'Size', 'ds-suit' ),
                ],
            ],
        ];
	}

	public function get_fields() {
		$fields = [];

		$fields['limit'] = [
			'label' => esc_html__( 'Limit Words', 'ds-suit' ),
			'type' => 'text',
			'option_category' => 'basic_option',
			'toggle_slug' => 'text',
			'description' => esc_html__( 'Limit the number of words to show. Leave empty to show the full excerpt.', 'ds-suit' ),
		];

		$fields['more'] = [
			'label' => esc_html__( 'More', 'ds-suit' ),
			'type' => 'text',
			'option_category' => 'basic_option',
			'toggle_slug' => 'text',
			'description' => esc_html__( 'Text with which truncated text get replaced (e. g. "...").', 'ds-suit' ),
		];

		$fields['read_more'] = [
			'label' => esc_html__( 'Read More', 'ds-suit' ),
			'type' => 'yes_no_button',
			'option_category' => 'configuration',
			'options' => array(
				'off' 	=> esc_html__('Off', 'ds-suit' ),
				'on' 	=> esc_html__('On', 'ds-suit' ),
			),
			'option_category' => 'basic_option',
			'toggle_slug' => 'text',
			'description' => esc_html__( 'Whether to show a read more link.', 'ds-suit' ),
        ];

		$fields['read_more_text'] = [
			'label' => esc_html__( 'Read More Text', 'ds-suit' ),
			'type' => 'text',
			'option_category' => 'basic_option',
			'toggle_slug' => 'text',
			'default' => esc_html__( 'Read More', 'ds-suit' ),
			'description' => esc_html__( 'Text to display as the read more link.', 'ds-suit' ),
			'show_if' => [
				'read_more' => [ 'on' ],
			],
		];

		return $fields;
    }
    
    public function get_advanced_fields_config()
    {

        $fields = [
            // 'text' => false,
            'text_shadow' => false,
            'fonts' => array(
                'excerpt' => array(
                    'label' => esc_html__('Excerpt', 'ds-suit'),
                    'toggle_slug' => 'excerpt',
                    'sub_toggle' => 'excerpt',
                    'css' => array(
                        'main' => "{$this->main_css_element} .dss_post_excerpt_text",
                    ),
                ),
                'read_more' => array(
                    'label' => esc_html__('Read More', 'ds-suit'),
                    'toggle_slug' => 'excerpt',
                    'sub_toggle' => 'read_more',
                    'css' => array(
                        'main' => "{$this->main_css_element} .dss_post_excerpt_read_more",
                    ),
                ),
            ),
            'margin_padding' => [
                'css' => [
                    'important' => 'all',
                ],
            ],
        ];

        return $fields;
    }

	public function render( $attrs, $content = null, $render_slug ) {
		global $post;
		$save_post = $post;
		$post = get_post(get_the_ID());
		setup_postdata($post);
		$the_excerpt = get_the_excerpt($post);
		$the_permalink = get_permalink($post); 
		wp_reset_postdata();
		$post = $save_post;

		$limit = isset($this->props['limit']) ? $this->props['limit'] : '';
		$excerpt = '';
		if ('' !== $limit) {
			$more = isset($this->props['more']) ? $this->props['more'] : null;
			$excerpt = wp_trim_words($the_excerpt, $limit, $more);
		} else {
			$excerpt = $the_excerpt;
		}

		$read_more = '';
		if ( 'on' === $this->props['read_more'] ) {
			$read_more = sprintf(
				'<a href="%2$s" class="dss_post_excerpt_read_more">%1$s</a>',
				$this->props['read_more_text'],
				$the_permalink
			);
        } 
      
        return sprintf(
            '<div class="dss_post_excerpt_wrapper">
                <div class="dss_post_excerpt_text">%1$s</div>
                %2$s
            </div>',
			$excerpt,
			$read_more
		);
	}
}

new DSS_Post_Excerpt;
