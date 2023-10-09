<?php


defined('ABSPATH') OR exit('No direct script access allowed');

Redux::set_section(
	$opt_name,
	[
		'title'      => esc_html__( 'CSS Editor', 'truvik' ),
		'id'         => 'truvik-editor-ace',
		'subsection' => true,
		'desc'       => esc_html__( 'Write CSS code for change your website style','truvik' ),
		'fields'     => [
            [
                'id'       => 'truvik-editor-ace-css',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'CSS Code', 'truvik' ),
				'subtitle' => esc_html__( 'Paste your CSS code here.', 'truvik' ),
				'mode'     => 'css',
				'theme'    => 'monokai',
                'default'  => '.demo{text-align:left}',
            ]
        ]
    ]
);

Redux::set_section(
	$opt_name,
	[
		'title'      => esc_html__( 'JS Editor', 'truvik' ),
		'id'         => 'truvik-editor-ace2',
		'subsection' => true,
		'desc'       => esc_html__( 'Write JS code for change your website Enent','truvik' ),
		'fields'     => [
            [
                'id'       => 'truvik-editor-ace-js',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'JS Code', 'truvik' ),
				'subtitle' => esc_html__( 'Paste your CSS code here.', 'truvik' ),
				'mode'     => 'javascript',
				'theme'    => 'monokai',
                'default'  => 'jQuery(document).ready(function(){\n\n});',
            ]
        ]
    ]
);

Redux::set_section(
	$opt_name,
	[
		'title'      => esc_html__( 'PHP Editor', 'truvik' ),
		'id'         => 'truvik-editor-ace3',
		'subsection' => true,
		'desc'       => esc_html__( 'Write php code for change something of your website','truvik' ),
		'fields'     => [
            [
                'id'       => 'truvik-editor-ace-php',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'PHP Code', 'truvik' ),
				'subtitle' => esc_html__( 'Paste your php code here.', 'truvik' ),
				'mode'     => 'php',
				'theme'    => 'monokai',
                'default'  => '<?php echo "hello world";',
            ]
        ]
    ]
);
