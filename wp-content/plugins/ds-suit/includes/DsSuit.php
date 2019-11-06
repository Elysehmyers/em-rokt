<?php

class DSS_DsSuit extends DiviExtension {

	/**
	 * The gettext domain for the extension's translations.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $gettext_domain = 'ds-suit';

	/**
	 * The extension's WP Plugin name.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $name = 'ds-suit';

	/**
	 * The extension's version
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * DSS_DsSuit constructor.
	 *
	 * @param string $name
	 * @param array  $args
	 */
	public function __construct( $name = 'ds-suit', $args = array() ) {
		$this->plugin_dir     = plugin_dir_path( __FILE__ );
		$this->plugin_dir_url = plugin_dir_url( $this->plugin_dir );
		$this->_builder_js_data = array(
            'misc' => array(
                'site_url' => get_site_url(),
            ),
			'nonces' => array(
				'dss_bucket' => wp_create_nonce( 'dss_bucket' ),
				'dss_footer' => wp_create_nonce( 'dss_footer' ),
				'dss_get_post_meta' => wp_create_nonce( 'dss_get_post_meta' ),
				'dss_get_post_title' => wp_create_nonce( 'dss_get_post_title' ),
				'dss_get_post_excerpt' => wp_create_nonce( 'dss_get_post_excerpt' ),
				'dss_get_post_featured_image' => wp_create_nonce( 'dss_get_post_featured_image' ),
				'dss_masonry_gallery' => wp_create_nonce( 'dss_masonry_gallery' ),
			),
			'l10n' => array(
                'another_post'    => esc_html__( "Content from other posts cannot be rendered in the Visual Builder due to the risk of rendering cycles.", 'ds-suit' ),
                'selected_post'    => esc_html__( "The currently selected post is", 'ds-suit' ),
                'click_to_edit'    => esc_html__( "Click here to edit", 'ds-suit' ),
                'no_post_selected'    => esc_html__( "No Post selected", 'ds-suit' ),
				'dss_post_excerpt' => array(
					'read more'    => esc_html__( 'Read More', 'ds-suit' ),
				),
            ),
            'defaults' => [
                'image' => "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTA4MCIgaGVpZ2h0PSI1NDAiIHZpZXdCb3g9IjAgMCAxMDgwIDU0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZmlsbD0iI0VCRUJFQiIgZD0iTTAgMGgxMDgwdjU0MEgweiIvPgogICAgICAgIDxwYXRoIGQ9Ik00NDUuNjQ5IDU0MGgtOTguOTk1TDE0NC42NDkgMzM3Ljk5NSAwIDQ4Mi42NDR2LTk4Ljk5NWwxMTYuMzY1LTExNi4zNjVjMTUuNjItMTUuNjIgNDAuOTQ3LTE1LjYyIDU2LjU2OCAwTDQ0NS42NSA1NDB6IiBmaWxsLW9wYWNpdHk9Ii4xIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgICAgICA8Y2lyY2xlIGZpbGwtb3BhY2l0eT0iLjA1IiBmaWxsPSIjMDAwIiBjeD0iMzMxIiBjeT0iMTQ4IiByPSI3MCIvPgogICAgICAgIDxwYXRoIGQ9Ik0xMDgwIDM3OXYxMTMuMTM3TDcyOC4xNjIgMTQwLjMgMzI4LjQ2MiA1NDBIMjE1LjMyNEw2OTkuODc4IDU1LjQ0NmMxNS42Mi0xNS42MiA0MC45NDgtMTUuNjIgNTYuNTY4IDBMMTA4MCAzNzl6IiBmaWxsLW9wYWNpdHk9Ii4yIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgIDwvZz4KPC9zdmc+Cg==",
                'title' => esc_html__('Lorem Ipsum', 'ds-suit-material'),
                'content' => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.', 'ds-suit-material'),
            ],
		);

		parent::__construct( $name, $args );
	}
}

new DSS_DsSuit;