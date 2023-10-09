<?php

if ( ! class_exists( 'Redux' ) ) {
	return null;
}

$opt_name = 'truvik_options';

$theme = wp_get_theme(); 

$args = array(
	// REQUIRED!!  Change these values as you need/desire.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,

	'menu_title'                => esc_html__( 'Truvik Options', 'truvik' ),
	'page_title'                => esc_html__( 'Truvik Options', 'truvik' ),

	// Disable this in case you want to create your own Google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => true,

	// Choose an icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Choose a priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Set a different name for your global variable other than the opt_name.
	'global_variable'           => '',

	// Show the time the page took to load, etc.
	'dev_mode'                  => false,

	// Enable basic customizer support.
	'customizer'                => true,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => 9,

	// For a full list of options, visit: @link http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => get_template_directory_uri(). '/assets/img/icon.png',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel.
	'page_slug'                 => '_options',

	// On load save the defaults to DB before user clicks save or not.
	'save_defaults'             => true,

	// If true, shows the default value next to each field that is not the default value.
	'default_show'              => false,

	// What to print by the field's title if the value shown is default. Suggested: *.
	'default_mark'              => '',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,

	// CAREFUL -> These options are for advanced use only.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head.
	'output_tag'                => true,

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// Possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',

	// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
	'use_cdn'                   => true,
	'compiler'                  => true,

	// Enable or disable flyout menus when hovering over a menu with submenus.
	'flyout_submenus'           => true,

	// Mode to display fonts (auto|block|swap|fallback|optional)
	// See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display .
	'font_display'              => 'swap',

	// HINTS.
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'light',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),
);

// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
$args['admin_bar_links'][] = array(
	'id'    => 'redux-docs',
	'href'  => '//devs.redux.io/',
	'title' => esc_html__( 'Documentation', 'truvik' ),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-support',
	'href'  => '//github.com/ReduxFramework/redux-framework/issues',
	'title' => esc_html__( 'Support', 'truvik' ),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-extensions',
	'href'  => 'redux.io/extensions',
	'title' => esc_html__( 'Extensions', 'truvik' ),
);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
$args['share_icons'][] = array(
	'url'   => '//github.com/ReduxFramework/ReduxFramework',
	'title' => 'Visit us on GitHub',
	'icon'  => 'el el-github',
);
$args['share_icons'][] = array(
	'url'   => '//www.facebook.com/pages/Redux-Framework/243141545850368',
	'title' => esc_html__( 'Like us on Facebook', 'truvik' ),
	'icon'  => 'el el-facebook',
);
$args['share_icons'][] = array(
	'url'   => '//twitter.com/reduxframework',
	'title' => esc_html__( 'Follow us on Twitter', 'truvik' ),
	'icon'  => 'el el-twitter',
);
$args['share_icons'][] = array(
	'url'   => '//www.linkedin.com/company/redux-framework',
	'title' => esc_html__( 'Find us on LinkedIn', 'truvik' ),
	'icon'  => 'el el-linkedin',
);

// Panel Intro text -> before the form.
if ( false !== $args['global_variable'] ) {
	if ( ! empty( $args['global_variable'] ) ) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace( '-', '_', $args['opt_name'] );
	}

	// $args['intro_text'] = '<p>' . sprintf( __( 'Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: $s', 'truvik' ) . '</p>', '<strong>' . $v . '</strong>' );
} else {
	// $args['intro_text'] = '<p>' . esc_html__( 'This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'truvik' ) . '</p>';
}

// Add content after the form.
// $args['footer_text'] = '<p>' . esc_html__( 'This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.', 'truvik' ) . '</p>';

Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> BEGIN HELP TABS
 */

$help_tabs = array(
	array(
		'id'      => 'redux-help-tab-1',
		'title'   => esc_html__( 'Theme Information 1', 'truvik' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'truvik' ) . '</p>',
	),

	array(
		'id'      => 'redux-help-tab-2',
		'title'   => esc_html__( 'Theme Information 2', 'truvik' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'truvik' ) . '</p>',
	),
);

Redux::set_help_tab( $opt_name, $help_tabs );

// Set the help sidebar.
$content = '<p>' . esc_html__( 'This is the sidebar content, HTML is allowed.', 'truvik' ) . '</p>';
Redux::set_help_sidebar( $opt_name, $content );

/*
 * <--- END HELP TABS
 */

/*
 *
 * ---> BEGIN SECTIONS
 *
 */

/* As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for. */

/* -> START Basic Fields. */

$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
);


// Home page content 
Redux::set_section( $opt_name, array(
	'title'  => esc_html__( 'Homepage', 'truvik' ),
	'id'     => 'truvik-homepage',
	'desc'   => esc_html__( 'Change the Home page content from here.', 'truvik' ),
	'icon'   => 'el el-home',
) );

/**
 * change the homepage content 
 * @return mixed
 */
require_once dirname(__FILE__) .'/extension/extension-homepage-content.php';


/**
 * Header section 
 * @return header
 */
Redux::set_section( $opt_name, array(
    'title'  => esc_html__( 'Header', 'truvik' ),
	'id'     => 'truvik-header-area',
	'desc'   => esc_html__( 'You may modify/change the content of header area', 'truvik' ),
	'icon'   => 'el el-th-list',
) );


/**
 * header top area section
 * @return Header top
 */
require_once dirname(__FILE__) .'/extension/extension-header-top.php';

/**
 * header top area section
 * @return Header bottom
 */
require_once dirname(__FILE__) .'/extension/extension-header-bottom.php';

/**
 * include header meta tag
 * @return meta tag
 */
require_once dirname(__FILE__) .'/extension/extension-header-meta-tag.php';


/**
 * typography section
 * @return mixed
 */
require_once dirname(__FILE__) .'/extension/extension-typograpy.php';

/**
 * Editor section
 * @return mixed
 */
Redux::set_section( $opt_name, array(
    'title'  => esc_html__( 'Editor', 'truvik' ),
	'id'     => 'truvik-editor',
	'desc'   => esc_html__( 'You may add some scripts if you need ( js/css/php )', 'truvik' ),
	'icon'   => 'el el-edit',
) );

require_once dirname(__FILE__) .'/extension/extension-editor.php';


/**
 * set scropp to top section
 */

Redux::set_section( $opt_name, array(
	'title'  => esc_html__( 'Scroll To Top', 'truvik' ),
	'id'     => 'truvik-scroll-to-top',
	'desc'   => esc_html__( 'Enable or desable the button from here', 'truvik' ),
	'icon'   => 'el el-chevron-up',
	'fields' => [
		[
			'id'       => 'truvik-enable-scrolltop',
			'type'     => 'switch',
			'title'    => esc_html__( 'Switch On', 'truvik' ),
			'subtitle' => esc_html__( 'Look, it\'s on!', 'truvik' ),
			'default'  => true,
			'on'       => 'Enabled',
			'off'      => 'Disabled',
		]
	]
) );


/**
 * footer section modification
 */

Redux::set_section( $opt_name, array(
	'title'  => esc_html__( 'Footer', 'truvik' ),
	'id'     => 'truvik-footer-area',
	'desc'   => esc_html__( 'Modify of the footer from here if you want.', 'truvik' ),
	'icon'   => 'el el-magic',
	'fields' => [
		[
			'id'       => 'truvik-enable-footer-widget',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Widget', 'truvik' ),
			'subtitle' => esc_html__( 'Enable / Disable Widget from here', 'truvik' ),
			'default'  => true,
			'on'       => 'Enabled',
			'off'      => 'Disabled',
		],
		[
			'id' => 'footer_deviders',
			'type' => 'divide',
		],
		[
			'id'       => 'truvik-enable-footer-privacy',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Privacy Link', 'truvik' ),
			'subtitle' => esc_html__( 'Enable / Disable Privacy from here', 'truvik' ),
			'default'  => true,
			'on'       => 'Enabled',
			'off'      => 'Disabled',
		],
		[
			'id'       => 'truvik-enable-footer-privacy-link',
			'type'     => 'repeater',
			'title'    => esc_html__( 'Add Link', 'truvik' ),
			'required' => [ 'truvik-enable-footer-privacy', '=', true ],
			'fields'=>[
				[
					'id'      => 'truvik-privacy-text',
					'type'    => 'text',
					'title'   => esc_html__( 'Add Text', 'truvik' ),
					'default' => __( 'Privacy Policy', 'truvik' )
				],
				[
					'id'      => 'truvik-privacy-link',
					'type'    => 'text',
					'title'   => esc_html__( 'Add link', 'truvik' ),
					'default' => '#'
				]
			]
		],
		[
			'id' => 'footer_devider',
			'type' => 'divide',
		],
		[
			'id'       => 'truvik-enable-footer-copyright',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Copyright', 'truvik' ),
			'subtitle' => esc_html__( 'Enable / Disable Copyright Text from here', 'truvik' ),
			'default'  => true,
			'on'       => 'Enabled',
			'off'      => 'Disabled',
		],
		[
			'id'       => 'truvik-footer-copyright-text',
			'type'     => 'editor',
			'title'    => esc_html__( 'Copyright Text', 'truvik' ),
			'subtitle' => esc_html__( 'Write Copyright text', 'truvik' ),
			'default'  => 'Copyright © 2022 Truvik Template by Rubel All rights reserved.',
			'required' => [ 'truvik-enable-footer-copyright', '=', true ]
		],
	]
) );

/**
 * login page modification
 */
Redux::set_section( 
	$opt_name,
	[
		'title'  => esc_html__( 'Login Page', 'truvik' ),
		'id'     => 'truvik-admin-login-page-area',
		'desc'   => esc_html__( 'Change or modify the login page from here if you want.', 'truvik' ),
		'icon'   => 'el el-puzzle',
		'fields' => [
			[
				'id'          => 'truvik-login-page-logo',
				'title'       => 'Login Icon',
				'subtitle'    => 'Change the Logo',
				'description' => 'Change the logo icon from here if you want',
				'type'        => 'media',
				'url'         => false,
				'default'     => [ 'url' => get_template_directory_uri(). '/assets/img/favicon.png' ]
			],
			[
				'id'          => 'truvik-login-page-background',
				'title'       => 'background Image',
				'subtitle'    => 'Change the background image',
				'description' => 'You may change the background image from here.',
				'type'        => 'media',
				'url'         => false,
				'default'     => [ 'url' => get_template_directory_uri(). '/assets/img/login-bg.jpg' ]
			],
			[
				'id'          => 'truvik-login-page-background-overlay',
				'title'       => 'background Image Overlay',
				'subtitle'    => 'Change the background image Overlay Color',
				'description' => 'You may change the background image ovrlay color from here.',
				'type'        => 'color',
				'default'     => '#000000'
			],
			[
				'id'          => 'truvik-login-page-background-overlay-opacity',
				'title'       => 'background Image Overlay',
				'subtitle'    => 'Change the background image Overlay Color',
				'description' => 'You may hange the opacity of overlay color',
				'type'        => 'slider',
				'default'     => '3',
				'min'         => '0',
				'step'        => '1',
				'max'         => '10',
			],
		]
	]
);

/**
 * Assessment form modificaltion
 */
Redux::set_section( 
	$opt_name,
	[
		'title'  => esc_html__( 'Assessment Form', 'truvik' ),
		'id'     => 'truvik-assessment-forms',
		'desc'   => esc_html__( 'change or modify assessment content from here.', 'truvik' ),
		'icon'   => 'el el-website',
		'fields' => [
			[
				'id'          => 'truvik-email-template-logo-url',
				'title'       => 'Logo',
				'subtitle'    => 'Change the Logo',
				'description' => 'You may change the logo which you want to show in the email template',
				'type'        => 'media',
				'url'         => false,
				'default'     => ['url' => get_template_directory_uri(). '/assets/img/logo.png'],
			],
			[
				'id'          => 'truvik-candidate-subject',
				'title'       => 'Candidate Subject',
				'subtitle'    => 'Change the subject for candidate',
				'description' => 'You may change the candidate subject from here if you need',
				'type'        => 'text',
				'validate'    => 'not_empty',
				'default'     => 'Thank you for submitting the assessment form on CILCA platform'
			],
			[
				'id'          => 'truvik-assessment-form-devide1',
				'type'        => 'divide',
			],
			[
				'id'          => 'truvik-admin-name-set',
				'title'       => 'Admin Name',
				'subtitle'    => 'Set the admin name inside the email',
				'description' => 'You may change the admin name inside the email template.',
				'type'        => 'text',
				'validate'    => 'not_empty',
				'default'     => 'Jone Doe'
			],
			[
				'id'          => 'truvik-admin-subject',
				'title'       => 'Admin Subject',
				'subtitle'    => 'Change the Subject for admin',
				'description' => 'You may change the admin subject from here if you need',
				'type'        => 'text',
				'validate'    => 'not_empty',
				'default'     => 'New assessment form submitted on CILCA'
			],
			[
				'id'          => 'truvik-admin-email',
				'title'       => 'Admin Email',
				'subtitle'    => 'Change the Admin Email',
				'description' => 'Enter the perfect emaill address where You want to get the mail which is submited by user.',
				'type'        => 'text',
				'default'     => 'admin@example.com',
				'validate'    => 'email'
			],
			[
				'id'          => 'truvik-assessment-form-devide',
				'type'        => 'divide',
			],
			[
				'id'          => 'truvik-assessment-form-redirect',
				'title'       => 'Redirect To',
				'subtitle'    => 'Enter the Redirected Url',
				'description' => 'Enter the url where you want to redirect after submitting the form.',
				'type'        => 'text',
				'default'     => home_url('/thank-you'),
				'validate'    => 'url'
			],
			
		]
	]
);
