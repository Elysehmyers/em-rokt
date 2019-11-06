<?php

class DSS_Library_Layout extends ET_Builder_Module {

	public $slug       = 'dss_library_layout';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divi-sensei.com/suit',
		'author'     => 'Divi Sensei',
		'author_uri' => 'https://divi-sensei.com',
	);

	public function init() {
		$this->name = esc_html__( 'Sensei Library Layout', 'ds-suit' );
	}

	public function get_fields() {


		$library_layouts = [
			'0' => esc_html__( '--Select Layout--', 'ds-suit' ),
		];

        $query = new WP_Query([
            'post_type' => ET_BUILDER_LAYOUT_POST_TYPE,
            'posts_per_page' => '-1',
            'orderby' => 'title',
            'order' => 'ASC',
		]);
		
        $posts = $query->get_posts();
		
		
		foreach ($posts as $post) {
			$library_layouts[$post->ID] = $post->post_title;
        }
		
		wp_reset_postdata();

		return [
			'post_id' => [
				'label' => 'Library Layout',
				'type' 	=> 'select',
				'option_category' => 'basic_option',
				'options' => $library_layouts,
				'toggle_slug' => 'main_content',
				'description' => esc_html__( 'Select a layout from the Divi library. Make sure to account for possible margins when loading whole page, section or row layouts. You can do this by making the row in which this module is added fullwidth and set the custom width to 100%. Also make sure to not put a Library Layout inside its own Library Layout. It will cause a infinite loop and could creash your server.', 'ds-suit' ),
			],
		];
	}

	public function get_advanced_fields_config() {
        $advanced_fields = [];
        
        $advanced_fields['margin_padding'] = [
            'css' => [
                'important' => 'all',
            ],
        ];

        return $advanced_fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$post_id = $this->props['post_id'];
		if( '0' === $post_id ) return;
		if($post_id === get_the_ID()) return;
		return do_shortcode("[et_pb_section global_module=\"{$post_id}\"][/et_pb_section]");
	}
	
}

new DSS_Library_Layout;
