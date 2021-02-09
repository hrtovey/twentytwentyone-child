<?php

/*
 * Child theme scripts
 */
function twenty_twenty_one_child_scripts() {
	wp_enqueue_style(
		'child-style',
		get_stylesheet_uri(),
		array( 'twenty-twenty-one-style' ),
		wp_get_theme()->get( 'Version' ) // this only works if you have Version in the style header
	);

	//remove default Block Editor styles
	// wp_dequeue_style( 'wp-block-library' );
}

add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_child_scripts', 20 );

/*
 * Child Theme default setup
 */
function twenty_twenty_one_child_setup() {
	// Add support for Editor Styles in the Block Editor
	add_theme_support( 'editor-styles' );

	add_editor_style( 'editor.css' ); // the path to your editor.css file

	// remove theme support for the wide and full  alignment options in the Block Editor
	// remove_theme_support( 'align-wide' );

	// Editor Color Palette
	add_theme_support(
		'editor-color-palette',
		[
			[
				'name'  => __( 'Colour One', 'twenty-twenty-one-child' ),
				'slug'  => 'colour',
				'color' => '#59BACC',
			],
			[
				'name'  => __( 'Colour Two', 'twenty-twenty-one-child' ),
				'slug'  => 'colour-two',
				'color' => '#58AD69',
			],
			[
				'name'  => __( 'Colour Three', 'twenty-twenty-one-child' ),
				'slug'  => 'colour-three',
				'color' => '#FFBC49',
			],
			[
				'name'  => __( 'Colour Four', 'twenty-twenty-one-child' ),
				'slug'  => 'colour-four',
				'color' => '#E2574C',
			],
		]
	);

	// Disable pesky custom font sizes
	add_theme_support( 'disable-custom-font-sizes' );

	// Disable pesky custom colours on the fly
	add_theme_support( 'disable-custom-colors' );

	// Disable pesky custom gradients (cool but not for us)
	add_theme_support( 'disable-custom-gradients' );

}

add_action( 'after_setup_theme', 'twenty_twenty_one_child_setup', 12 );


/**
 * Disable Drop Cap settings by hooking into the Block Editor settings
 *
 * @param array $settings Block Editor settings array
 * @return array $settings
 */
function disable_drop_cap_in_block_editor( $settings ) {
	$settings['__experimentalFeatures']['global']['typography']['dropCap'] = false;
	return $settings;
}

add_filter( 'block_editor_settings', 'disable_drop_cap_in_block_editor' );
