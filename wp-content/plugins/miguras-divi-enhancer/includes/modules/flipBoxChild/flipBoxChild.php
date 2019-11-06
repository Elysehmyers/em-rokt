<?php

class DIVIENHANCER_flipboxchild extends ET_Builder_Module {
	// Module slug (also used as shortcode tag)
	public $slug                     = 'divienhancer_flipBoxChild';

	// Module item has to use `child` as its type property
	public $type                     = 'child';

	// Module item's attribute that will be used for module item label on modal
	public $child_title_var          = 'identifier';

	// Full Visual Builder support
	public $vb_support = 'on';

	/**
	 * Module properties initialization
	 *
	 * @since 1.0.0
	 *
	 * @todo Remove $this->advanced_options['background'] once https://github.com/elegantthemes/Divi/issues/6913 has been addressed
	 */
	function init() {


		// Toggle settings
		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Content', 'divienhancer' ),
				),
			),
		);
	}

	public function get_fields() {
		return array(
			'identifier' => array(
				'label'           => esc_html__( 'Identifier', 'divienhancer' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'This lets you identify each item at modal', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
			'content' => array(
				'label'           => esc_html__( 'Box Content', 'divienhancer' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'divienhancer' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	function render( $attrs, $content = null, $render_slug ) {
		return sprintf('
			<div class="divienhancer_flipbox_box">
				%1$s
			</div>',
			et_sanitized_previously( $this->content )
		);
	}
}

new DIVIENHANCER_flipboxchild;
