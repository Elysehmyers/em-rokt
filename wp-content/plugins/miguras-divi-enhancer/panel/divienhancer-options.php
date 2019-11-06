<?php

Kirki::add_config( 'divienhancer-configuration', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'option',
) );

Kirki::add_panel( 'divienhancer-panel', array(
		'priority'    => 10,
		'title'       => esc_html__( 'DIVI Enhancer', 'divienhancer' ),
		'description' => esc_html__( 'DIVI Enhancer Settings', 'divienhancer' ),
) );

Kirki::add_section( 'divienhancer-scripts-section', array(
		'title'          => esc_html__( 'Enable/Disable Functions', 'divienhancer' ),
		'description'    => esc_html__( '', 'divienhancer' ),
		'panel'          => 'divienhancer-panel',
		'priority'       => 160,
) );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'custom',
	'settings'    => 'divienhancer-modules-title',
	'label'       => esc_html__( '', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => '<h2 style="">' . esc_html__( 'MODULES', 'divienhancer' ) . '</h2>',
	'priority'    => 10,
] );

Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-animatedlinks',
	'label'       => esc_html__( 'Animated Links', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-bingmap',
	'label'       => esc_html__( 'Bing Map', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-box',
	'label'       => esc_html__( 'Box', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-carousel',
	'label'       => esc_html__( 'Carousel', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-shop',
	'label'       => esc_html__( 'Products Carousel', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-flipbox',
	'label'       => esc_html__( 'Flip Box', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-foodmenu',
	'label'       => esc_html__( 'Food Menu', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-ihover',
	'label'       => esc_html__( 'iHover', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-imagecomparison',
	'label'       => esc_html__( 'Image Comparison', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-infiniteproducts',
	'label'       => esc_html__( 'Infinite Products', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-pricebox',
	'label'       => esc_html__( 'Price Box', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-tagcloud',
	'label'       => esc_html__( 'Tag Cloud', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-tagproducts',
	'label'       => esc_html__( 'Tag Products', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-teammember',
	'label'       => esc_html__( 'Team Member', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-timeline',
	'label'       => esc_html__( 'Timeline', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );

Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'custom',
	'settings'    => 'divienhancer-options-title',
	'label'       => esc_html__( '', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => '<h2 style="">' . esc_html__( 'CUSTOM OPTIONS', 'divienhancer' ) . '</h2>',
	'priority'    => 10,
] );

Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-caption',
	'label'       => esc_html__( 'Caption', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-hovereffects',
	'label'       => esc_html__( 'Hover Effects', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-sticky',
	'label'       => esc_html__( 'Sticky Modules', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-modal',
	'label'       => esc_html__( 'Modal Pop Up', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-moduleasmenu',
	'label'       => esc_html__( 'Module As Menu', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );


Kirki::add_field( 'divienhancer-configuration', [
	'type'        => 'select',
	'settings'    => 'divienhancer-enable-interactivebg',
	'label'       => esc_html__( 'Interactive Background Image', 'divienhancer' ),
	'section'     => 'divienhancer-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divienhancer' ),
		'yes' => esc_html__( 'Enable', 'divienhancer' ),
	],
] );



Kirki::add_panel( 'divienhancer-shop-panel', array(
		'priority'    => 10,
		'title'       => esc_html__( 'Other Page', 'divienhancer' ),
		'description' => esc_html__( '', 'divienhancer' ),
		'panel'          => 'divienhancer-panel',
) );




function divienhancer_required_files(){

	$requires = array('divienhancer-shop-breadcrumb'

	);

	foreach($requires as $require){
		if (file_exists(plugin_dir_path( __FILE__ ) . $require.'.php')){
			require_once(plugin_dir_path( __FILE__ ) .  $require.'.php');
		}
	}
}

divienhancer_required_files();

?>
