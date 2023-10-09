<?php


defined('ABSPATH') OR exit('No direct script access allowed');

Redux::set_section( $opt_name, array(
    'title'  => esc_html__( 'Typograpy', 'truvik' ),
	'id'     => 'truvik-typograpy',
	'desc'   => esc_html__( 'You may change the website typograpy from here.', 'truvik' ),
	'icon'   => 'el el-font',
	'fields' => [
		[
			'id'                => 'truvik-body-font',
			'type'              => 'typography',
			'title'             => esc_html__( 'Body Font', 'truvik' ),
			'subtitle'          => esc_html__( 'Specify the body font properties.', 'truvik' ),
			'google'            => false,
			'font_family_clear' => false,
			'default'           => array(
				'color'       => '#7a8a9c',
				'font-size'   => '15px',
				'font-family' => 'Poppins, sans-serif',
				'font-weight' => '400',
				'line-height' => '20px',
				'text-align' => 'left',
			),
			'output'            => array( 'body' ),
		],
		[
			'id'          => 'truvik-base-bodyfont-color',
			'type'        => 'color',
			'title'       => esc_html__( 'Base Body Font Color', 'truvik' ),
			'subtitle'    => esc_html__( 'Change The base body font color.', 'truvik' ),
			'default'     => '#7a8a9e',
			'transparent' => false,
			'validate'    => 'color',
		],
		[
			'id'          => 'truvik-base-dark-color',
			'type'        => 'color',
			'title'       => esc_html__( 'Base Dark Color', 'truvik' ),
			'subtitle'    => esc_html__( 'Change The base dark color.', 'truvik' ),
			'default'     => '#003a66',
			'transparent' => false,
			'validate'    => 'color',
		],
		[
			'id'          => 'truvik-base-gray-color',
			'type'        => 'color',
			'title'       => esc_html__( 'Base Gray Color', 'truvik' ),
			'subtitle'    => esc_html__( 'Change The base Gray color.', 'truvik' ),
			'default'     => '#F0F5FB',
			'transparent' => false,
			'validate'    => 'color',
		],
		[
			'id'          => 'truvik-base-skin-color',
			'type'        => 'color',
			'title'       => esc_html__( 'Change The Theme Color', 'truvik' ),
			'subtitle'    => esc_html__( 'Specify the theme color from here.', 'truvik' ),
			'default'     => '#e02454',
			'transparent' => false,
			'validate'    => 'color',
		],
		[
			'id'          => 'truvik-base-white-color',
			'type'        => 'color',
			'title'       => esc_html__( 'Base White Color', 'truvik' ),
			'subtitle'    => esc_html__( 'Change The base white color.', 'truvik' ),
			'default'     => '#ffff',
			'transparent' => false,
			'validate'    => 'color',
		],
	],
) );