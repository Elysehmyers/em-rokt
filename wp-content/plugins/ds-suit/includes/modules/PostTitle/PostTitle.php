<?php

class DSS_Post_Title extends ET_Builder_Module {

	public $slug       = 'dss_post_title';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divi-sensei.com/suit',
		'author'     => 'Divi Sensei',
		'author_uri' => 'https://divi-sensei.com',
	);

	public function init() {
		$this->name = esc_html__( 'Sensei Post Title', 'ds-suit' );

		$this->custom_css_fields = array(
			'title' => array(
				'label'    => esc_html__( 'Title', 'dicm-divi-custom-modules' ),
				'selector' => '.dss_post_title_title',
			),
        );
        
        $this->settings_modal_toggles = [
			'general'  => [
				'toggles' => [
					'content' => esc_html__( 'Content', 'ds-suit' ),
				],
            ],
        ];
	}

	public function get_fields() {
		return [
			'title_link' => [
				'label' => 'Link Title to Post',
				'type' 	=> 'yes_no_button',
                'option_category' => 'configuration',
                'default' => 'off',
				'options' => array(
					'off' 	=> esc_html__('Off', 'ds-suit'),
					'on' 	=> esc_html__('On', 'ds-suit'),
				),
				'toggle_slug' => 'content',
				'description' => esc_html__( 'Whether or not to link the title to the post.', 'ds-suit' ),
            ],
            'featured_image_background' => [
				'label' => 'Use Featured Image as Background',
				'type' 	=> 'yes_no_button',
                'option_category' => 'configuration',
                'default' => 'off',
				'options' => array(
					'off' 	=> esc_html__('Off', 'ds-suit'),
					'on' 	=> esc_html__('On', 'ds-suit'),
				),
				'toggle_slug' => 'content',
				'description' => esc_html__( 'Whether or not to use the featured image of the post as background for the title.', 'ds-suit' ),
            ],
            'title_background_position' => [
				'label' => 'Background Position',
				'type' 	=> 'select',
                'option_category' => 'configuration',
                'default' => 'center',
				'options' => array(
					'center'    => esc_html__('Center', 'ds-suit'),
					'top' 	    => esc_html__('Top', 'ds-suit'),
					'right' 	=> esc_html__('Right', 'ds-suit'),
					'bottom' 	=> esc_html__('Bottom', 'ds-suit'),
					'left' 	    => esc_html__('Left', 'ds-suit'),
				),
                'toggle_slug' => 'content',
                'show_if' => [
                    'featured_image_background' => 'on',
                ],
            ],
            'title_background_size' => [
				'label' => 'Background Size',
				'type' 	=> 'select',
                'option_category' => 'configuration',
                'default' => 'cover',
				'options' => array(
					'cover'     => esc_html__('Cover', 'ds-suit'),
					'contain'   => esc_html__('Contain', 'ds-suit'),
					'auto' 	    => esc_html__('Auto', 'ds-suit'),
				),
                'toggle_slug' => 'content',
                'show_if' => [
                    'featured_image_background' => 'on',
                ],
            ],
            'title_display' => [
				'label' => 'Display Title as',
				'type' 	=> 'select',
                'option_category' => 'configuration',
                'default' => 'block',
				'options' => array(
					'block' 	=> esc_html__('Block', 'ds-suit'),
					'inline-block' 	=> esc_html__('Inline-Block', 'ds-suit'),
				),
                'toggle_slug' => 'title',
                'tab_slug' => 'advanced',
				'description' => esc_html__( '.', 'ds-suit' ),
            ],
            'title_margin' => [
                'label' => esc_html__('Title Margin', 'ds-suit'),
                'type' => 'custom_margin',
                'mobile_options' => true,
                'responsive' => true,
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'title',
            ],            
            'title_padding' => [
                'label' => esc_html__('Title Padding', 'ds-suit'),
                'type' => 'custom_margin',
                'mobile_options' => true,
                'responsive' => true,
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'title',
            ],            
		];
	}

	function get_advanced_fields_config() {
        $advanced_fields = [];
        
		$advanced_fields['text_shadow'] = false;
		$advanced_fields['text'] = false;

		$advanced_fields['fonts']['title'] = [
			'label' => esc_html__('Title', 'ds-suit'),
			'css' => array(
				'main' => "%%order_class%% .dss_post_title_title",
                // 'important' => 'all',
                'text_align' => "%%order_class%% .dss_post_title_title, %%order_class%% > div",
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
			'header_level' => array(
				'default' => 'h1',
			),
		];

		return $advanced_fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {
        $the_title = get_the_title($this->get_the_ID());
        
        $this->apply_css($render_slug);
		
		if ('on' === $this->props['title_link']) {
			$the_title = sprintf(
				'<a href="%1$s">%2$s</a>',
                get_permalink(get_the_ID()),
				$the_title
			);
		}

		return sprintf(
			'<%1$s class="dss_post_title_title">%2$s</%1$s>',
			$this->props['title_level'],
			$the_title
		);

    }
    
    function apply_css($render_slug){

        if('on' === $this->props["featured_image_background"]) {
            $url = get_the_post_thumbnail_url(get_the_ID());
            ET_Builder_Element::set_style($render_slug, [
                'selector' => '%%order_class%%',
                'declaration' => "background-position: {$this->props['title_background_position']}; 
                                  background-size: {$this->props['title_background_size']};
                                  background-image: url({$url});",
            ]);
        }

        ET_Builder_Element::set_style($render_slug, [
            'selector' => '%%order_class%% .dss_post_title_title',
            'declaration' => "display: {$this->props['title_display']};",
        ]);

        \DiviSenseiSuit\Plugin::set_style($render_slug, $this->props, "title_margin", "%%order_class%% .dss_post_title_title", "margin");
        \DiviSenseiSuit\Plugin::set_style($render_slug, $this->props, "title_padding", "%%order_class%% .dss_post_title_title", "padding");
    }

	static function dss_get_post_title(){
		$post_id = $_POST['post_id']; 
		$result = [
			'title' => get_the_title( $post_id ) 
		];
		echo json_encode( $result );
		wp_die();
	}	
	
}

new DSS_Post_Title;