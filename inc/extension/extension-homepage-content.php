<?php

defined('ABSPATH') OR exit('No direct script access allowed');

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Content', 'truvik' ),
		'id'         => 'required',
		'desc'       => esc_html__( 'You may change the content of homepage from here', 'truvik' ),
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'accordion-section-1',
				'type'     => 'accordion',
				'title'    => esc_html__( 'Home Slider', 'truvik' ),
				'subtitle' => esc_html__( '', 'truvik' ),
				'position' => 'start',
			),
			array(
				'id'       => 'truvik-enable-home-slider',
				'type'     => 'switch',
				'title'    => esc_html__( 'Slider', 'truvik' ),
				'subtitle' => esc_html__( 'Enable/Desable Home Slider', 'truvik' ),
				'default'  => true,
			),
			array(
				'id'       => 'tehs-image-1',
				'type'     => 'media',
				'title'    => esc_html__( 'image-1', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the first slider image', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-slider', '=', true ),
				'default'  => ['url' => get_template_directory_uri() . '/assets/img/slides/slider-bg-1.jpg' ],
				'url'      => false
			),
			array(
				'id'       => 'tehs-title-1',
				'type'     => 'text',
				'title'    => esc_html__( 'Title-1', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the first heading title', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-slider', '=', true ),
				'default'  => 'Study In Abroad',
				'validate' => 'html'
			),
			array(
				'id'       => 'tehs-title-1_2',
				'type'     => 'text',
				'title'    => esc_html__( 'Break Title-1', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the first heading break title', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-slider', '=', true ),
				'default'  => 'Universities',
				'validate' => 'html'
			),
			array(
				'id'       => 'tehs-subtitle-1',
				'type'     => 'text',
				'title'    => esc_html__( 'Subtitle-1', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the first subtitle', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-slider', '=', true ),
				'default'  => 'Grab the Golden Opportunity',
				'validate' => 'html'
			),
			array(
				'id'       => 'tehs-button-text-1',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Text-1', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the first button text', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-slider', '=', true ),
				'default'  => 'Pay Fee After Visa',
				'validate' => 'html'
			),
			array(
				'id'       => 'tehs-button-url-1',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Link-1', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the first button link', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-slider', '=', true ),
				'default'  => home_url('/'),
				'validate' => 'url'
			),
			array(
				'id'       => 'tehs-image-2',
				'type'     => 'media',
				'title'    => esc_html__( 'image-2', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the second slider image', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-slider', '=', true ),
				'default'  => ['url' => get_template_directory_uri() . '/assets/img/slides/slider-bg-2.jpg' ],
				'url'      => false
			),
			array(
				'id'       => 'tehs-title-2',
				'type'     => 'text',
				'title'    => esc_html__( 'Title-2', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the second heading title', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-slider', '=', true ),
				'default'  => 'Start Planing',
				'validate' => 'html'
			),
			array(
				'id'       => 'tehs-title-2_2',
				'type'     => 'text',
				'title'    => esc_html__( 'Break Title-2', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the second break title', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-slider', '=', true ),
				'default'  => 'Your Next Trip',
				'validate' => 'html'
			),
			array(
				'id'       => 'tehs-subtitle-2',
				'type'     => 'text',
				'title'    => esc_html__( 'Subtitle-2', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the second subtitle', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-slider', '=', true ),
				'default'  => 'Simple Step To Your Dream Destination',
				'validate' => 'html'
			),
			array(
				'id'       => 'tehs-button-text-2',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Text-2', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the second button text', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-slider', '=', true ),
				'default'  => 'Apply Visa Today',
				'validate' => 'html'
			),
			array(
				'id'       => 'tehs-button-url-2',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Link-2', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the second button link', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-slider', '=', true ),
				'default'  => home_url('/'),
				'validate' => 'url'
			),
			array(
				'id'       => 'tehs-contact-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Contact info', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Write contact info text', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-slider', '=', true ),
				'default'  => 'Call Us',
				'validate' => 'html'
			),
			array(
				'id'       => 'tehs-contact-number',
				'type'     => 'text',
				'title'    => esc_html__( 'Contact Number', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Write contact number', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-slider', '=', true ),
				'default'  => '+000 723 123 21',
				'validate' => 'mumeric'
			),
			array(
				'id'       => 'accordion-section-1-end',
				'type'     => 'accordion',
				'position' => 'end',
			),
			array(
				'id'       => 'accordion-section-2',
				'type'     => 'accordion',
				'title'    => esc_html__( 'About Section', 'truvik' ),
				'subtitle' => esc_html__( '', 'truvik' ),
				'position' => 'start',
			),
			array(
				'id'       => 'truvik-enable-home-about',
				'type'     => 'switch',
				'title'    => esc_html__( 'About', 'truvik' ),
				'subtitle' => esc_html__( 'Enable/Desable About Section', 'truvik' ),
				'default'  => true,
			),
			array(
				'id'       => 'truvik-about-image1',
				'type'     => 'media',
				'title'    => esc_html__( 'Upload Image', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the background image', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-about', '=', true ),
				'default'  => [ 'url' => get_template_directory_uri(). '/assets/img/about/image-1.png'],
				'url'      => false
			),
			array(
				'id'       => 'truvik-about-image2',
				'type'     => 'media',
				'title'    => esc_html__( 'Upload Image', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the forground image', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-about', '=', true ),
				'default'  => [ 'url' => get_template_directory_uri(). '/assets/img/about/image-2.png'],
				'url'      => false
			),
			array(
				'id'       => 'truvik-about-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Title', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the about section title', 'truvik' ) ),
				'default' => '<h2 class="title">Welcome to immigration <br><span>Advisory </span> services</h2>',
				'validate' => 'html',
				'required' => array( 'truvik-enable-home-about', '=', true ),
			),
			array(
				'id'       => 'truvik-about-subtitle',
				'type'     => 'text',
				'title'    => esc_html__( 'Subtitle', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the about section subtitle', 'truvik' ) ),
				'validate' => 'no_html',
				'default' => 'WELCOME TO TRUVIK',
				'required' => array( 'truvik-enable-home-about', '=', true ),
			),
			array(
				'id'       => 'truvik-about-content',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Content', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the about section content', 'truvik' ) ),
				'default'  => 'Truvik immigration advisory foundation was established with a small idea that was incepted in the minds of its promoters in the year 1994! We skilfully guide applicants for immigration process to any country they aspire to settle down.',
				'validate' => 'no_html',
				'required' => array( 'truvik-enable-home-about', '=', true ),
			),
			array(
				'id'       => 'truvik-about-items',
				'type'     => 'multi_text',
				'title'    => esc_html__( 'Add Item', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the option items', 'truvik' ) ),
				'default'  => ['The desire to blur the global boundaries fulfil'],
				'validate' => 'no_html',
				'required' => array( 'truvik-enable-home-about', '=', true ),
			),
			array(
				'id'       => 'truvik-about-youtube-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Title', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the Youtube title', 'truvik' ) ),
				'default'  => 'Watch',
				'validate' => 'no_html',
				'required' => array( 'truvik-enable-home-about', '=', true ),
			),
			array(
				'id'       => 'truvik-about-youtube-url',
				'type'     => 'text',
				'title'    => esc_html__( 'Url', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the youtube url', 'truvik' ) ),
				'validate' => 'url',
				'default'  => 'https://youtu.be/7e90gBu4pas',
				'required' => array( 'truvik-enable-home-about', '=', true ),
			),
			array(
				'id'       => 'accordion-section-2-end',
				'type'     => 'accordion',
				'position' => 'end',
			),
			array(
				'id'       => 'accordion-section-3',
				'type'     => 'accordion',
				'title'    => esc_html__( 'Service Section', 'truvik' ),
				'subtitle' => esc_html__( '', 'truvik' ),
				'position' => 'start',
			),
			array(
				'id'       => 'truvik-enable-home-services',
				'type'     => 'switch',
				'title'    => esc_html__( 'Service', 'truvik' ),
				'subtitle' => esc_html__( 'Enable/Desable Home Services', 'truvik' ),
				'default'  => true,
			),
			array(
				'id'       => 'truvik-service-title',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Title', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the Service section title', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-services', '=', true ),
				'default'  => '<h2 class="title">We provide experts great <br>visa <span>Categories</span></h2>',
				'validate' => 'html',
			),
			array(
				'id'       => 'truvik-service-subtitle',
				'type'     => 'text',
				'title'    => esc_html__( 'Subtitle', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the Service section subtitle', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-services', '=', true ),
				'default'  => 'OUR VISA CATEGORIES',
				'validate' => 'no_html'
			),
			array(
				'id'       => 'truvik-service-enable-specefic-items',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Enable Specefic Post', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set Specefic post by their Id', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-services', '=', true ),
				'default'  => true
			),
			array(
				'id'       => 'truvik-service-enable-specefic-item1',
				'type'     => 'text',
				'title'    => esc_html__( 'item 1', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the id for items 1', 'truvik' ) ),
				'required' => array( 'truvik-service-enable-specefic-items', '=', true ),
				'validate' => 'numeric',
				'default'  => '115'
			),
			array(
				'id'       => 'truvik-service-enable-specefic-item2',
				'type'     => 'text',
				'title'    => esc_html__( 'item 2', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the id for items 2', 'truvik' ) ),
				'required' => array( 'truvik-service-enable-specefic-items', '=', true ),
				'validate' => 'numeric',
				'default'  => '113'
			),
			array(
				'id'       => 'truvik-service-enable-specefic-item3',
				'type'     => 'text',
				'title'    => esc_html__( 'item 3', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the id for items 3', 'truvik' ) ),
				'required' => array( 'truvik-service-enable-specefic-items', '=', true ),
				'validate' => 'numeric',
				'default'  => '115'
			),
			array(
				'id'       => 'accordion-section-3-end',
				'type'     => 'accordion',
				'position' => 'end',
			),
			array(
				'id'       => 'accordion-section-4',
				'type'     => 'accordion',
				'title'    => esc_html__( 'Broken Section', 'truvik' ),
				'subtitle' => esc_html__( '', 'truvik' ),
				'position' => 'start',
			),
			array(
				'id'       => 'truvik-enable-home-broken',
				'type'     => 'switch',
				'title'    => esc_html__( 'Broken', 'truvik' ),
				'subtitle' => esc_html__( 'Enable/Desable Home Broken', 'truvik' ),
				'default'  => true,
			),
			array(
				'id'       => 'truvik-broken-image',
				'type'     => 'media',
				'title'    => esc_html__( 'Upload Image', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the background of broken section', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-broken', '=', true ),
				'default'  =>['url' => get_template_directory_uri() . '/assets/img/bg/image-1.png'],
				'url'      => false
			),
			array(
				'id'       => 'truvik-broken-title',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Title', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the Broken section title', 'truvik' ) ),
				'default'  => '<h2 class="title">Immigration services <br>from <span> Experienced</span> agents</h2>',
				'validate' => 'html',
				'required' => array( 'truvik-enable-home-broken', '=', true ),
			),
			array(
				'id'       => 'truvik-broken-subtitle',
				'type'     => 'text',
				'title'    => esc_html__( 'Subtitle', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the Broken section subtitle', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-broken', '=', true ),
				'default'  => 'What we do',
				'validate' => 'no_html'
			),
			array(
				'id'       => 'truvik-broken-content-title-1',
				'type'     => 'text',
				'title'    => esc_html__( 'Content Title 1', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the content title', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-broken', '=', true ),
				'default'  => 'Study and work visa consultant',
				'validate' => 'no_html'
			),
			array(
				'id'       => 'truvik-broken-content-description-1',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Content Description 1', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the content description', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-broken', '=', true ),
				'default'  => 'Skilled professionals are always ready to provide reliable services to our clients!. We guide the applicants for their immigration.',
				'validate' => 'no_html'
			),
			array(
				'id'       => 'truvik-broken-content-title-2',
				'type'     => 'text',
				'title'    => esc_html__( 'Content Title 2', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the content title', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-broken', '=', true ),
				'default'  => 'Online visa services and guidance',
				'validate' => 'no_html'
			),
			array(
				'id'       => 'truvik-broken-content-description-2',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Content Description 2', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the content description', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-broken', '=', true ),
				'default'  => 'You can directly contact us through filling up the form. Our team will get back to you with your visa enquiry and help you for visa services.',
				'validate' => 'no_html'
			),
			array(
				'id'          => 'truvik-broken-count-text-1',
				'type'        => 'text',
				'title'       => esc_html__( 'Counter Text 1', 'truvik' ),
				'subtitle'    => esc_html__( 'Enter the counter text', 'truvik' ),
				'collapsible' => false,
				'required'    => array( 'truvik-enable-home-broken', '=', true ),
				'default'     => 'Project are completed',
				'validate'    => 'no_html',
			),
			array(
				'id'          => 'truvik-broken-count-number-1',
				'type'        => 'text',
				'title'       => esc_html__( 'Counter number 1', 'truvik' ),
				'subtitle'    => esc_html__( 'Enter the counter number', 'truvik' ),
				'collapsible' => false,
				'required'    => array( 'truvik-enable-home-broken', '=', true ),
				'default'     => '852',
				'validate'    => 'numeric',
			),
			array(
				'id'          => 'truvik-broken-count-text-2',
				'type'        => 'text',
				'title'       => esc_html__( 'Counter Text 2', 'truvik' ),
				// 'full_width'  => true,
				'subtitle'    => esc_html__( 'Enter the counter text', 'truvik' ),
				'collapsible' => false,
				'required'    => array( 'truvik-enable-home-broken', '=', true ),
				'default'     => 'Gave sigange advice',
				'validate'    => 'no_html',
			),
			array(
				'id'          => 'truvik-broken-count-number-2',
				'type'        => 'text',
				'title'       => esc_html__( 'Counter number 2', 'truvik' ),
				'subtitle'    => esc_html__( 'Enter the counter number', 'truvik' ),
				'collapsible' => false,
				'required'    => array( 'truvik-enable-home-broken', '=', true ),
				'default'     => '900',
				'validate'    => 'numeric',
			),
			array(
				'id'          => 'truvik-broken-count-text-3',
				'type'        => 'text',
				'title'       => esc_html__( 'Counter Text 3', 'truvik' ),
				'subtitle'    => esc_html__( 'Enter the counter text', 'truvik' ),
				'collapsible' => false,
				'required'    => array( 'truvik-enable-home-broken', '=', true ),
				'default'     => 'Clients are satisfied',
				'validate'    => 'no_html',
			),
			array(
				'id'          => 'truvik-broken-count-number-3',
				'type'        => 'text',
				'title'       => esc_html__( 'Counter number 3', 'truvik' ),
				'subtitle'    => esc_html__( 'Enter the counter number', 'truvik' ),
				'collapsible' => false,
				'required'    => array( 'truvik-enable-home-broken', '=', true ),
				'default'     => '630',
				'validate'    => 'numeric',
			),
			array(
				'id'       => 'accordion-section-4-end',
				'type'     => 'accordion',
				'position' => 'end',
			),
			array(
				'id'       => 'accordion-section-5',
				'type'     => 'accordion',
				'title'    => esc_html__( 'Immigraton Area', 'truvik' ),
				'subtitle' => esc_html__( '', 'truvik' ),
				'position' => 'start',
			),
			array(
				'id'       => 'truvik-enable-home-immigration',
				'type'     => 'switch',
				'title'    => esc_html__( 'Immigraton', 'truvik' ),
				'subtitle' => esc_html__( 'Enable/Desable Immigration area', 'truvik' ),
				'default'  => true,
			),
			array(
				'id'       => 'truvik-immigration-title',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Add Title', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the title of immigration section', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-immigration', '=', true ),
				'default'  => '<h2 class="title">Immigration &amp; visa services <br>following <span> Countries</span></h2>',
				'validate' => 'html'
			),
			array(
				'id'       => 'truvik-immigration-sub-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Add Subtitle', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the subtitle of immigration section', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-immigration', '=', true ),
				'default'  => 'COUNTRIES WE OFFER',
				'validate' => 'no_html'
			),
			array(
				'id'       => 'accordion-section-5-end',
				'type'     => 'accordion',
				'position' => 'end',
			),
			array(
				'id'       => 'accordion-section-6',
				'type'     => 'accordion',
				'title'    => esc_html__( 'Testimonial Area', 'truvik' ),
				'subtitle' => esc_html__( '', 'truvik' ),
				'position' => 'start',
			),
			array(
				'id'       => 'truvik-enable-home-testimonial',
				'type'     => 'switch',
				'title'    => esc_html__( 'Testimonial', 'truvik' ),
				'subtitle' => esc_html__( 'Enable/Desable Testimonial area', 'truvik' ),
				'default'  => true,
			),
			array(
				'id'       => 'truvik-testimonial-title',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Add Title', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the title of testimonial section', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-testimonial', '=', true ),
				'default'  => '<h2 class="title">Feedback from our <span class="text-base-skin"> Clients</span></h2>',
				'validate' => 'html'
			),
			array(
				'id'       => 'truvik-testimonial-sub-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Add Subtitle', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the subtitle of testimonial section', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-testimonial', '=', true ),
				'default'  => 'TESTIMONIALS',
				'validate' => 'no_html'
			),
			array(
				'id'       => 'truvik-testimonial-image',
				'type'     => 'media',
				'title'    => esc_html__( 'Add Image', 'truvik' ),
				'subtitle' => wp_kses_post( esc_html( 'Set the background image of testimonial section', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-testimonial', '=', true ),
				'default'  => [ 'url' => get_template_directory_uri(). '/assets/img/testimonial.png' ],
				'url'      => false
			),
			array(
				'id'       => 'accordion-section-6-end',
				'type'     => 'accordion',
				'position' => 'end',
			),
			array(
				'id'       => 'accordion-section-7',
				'type'     => 'accordion',
				'title'    => esc_html__( 'Fid Section', 'truvik' ),
				'subtitle' => esc_html__( '', 'truvik' ),
				'position' => 'start',
			),
			array(
				'id'       => 'truvik-enable-home-fid',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fid', 'truvik' ),
				'subtitle' => esc_html__( 'Enable/Desable Fid area', 'truvik' ),
				'default'  => true,
			),
			array(
				'id'       => 'truvik-home-fid-repeater',
				'title'    => esc_html__( 'Add Fields', 'truvik' ),
				'type'     => 'repeater',
				'subtitle' => wp_kses_post( esc_html( 'Set the items', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-fid', '=', true ),
				'fields'   => array(
					array(
						'id'          => 'truvik-fid-repeater-title',
						'type'        => 'text',
						'title'       => esc_html__( 'Title', 'truvik' ),
						'placeholder' => esc_html__( 'Title', 'truvik' ),
						'default'     => 'Team Members',
						'validate'    => 'no_html'
					),
					array(
						'id'          => 'truvik-fid-repeater-description',
						'type'        => 'textarea',
						'default'     => 'default text',
						'title'       => esc_html__( 'Description', 'truvik' ),
						'default'     => 'Teachings of the great explorer the truth master-builder of human.',
						'validate'    => 'no_html'
					),
					array(
						'id'          => 'truvik-fid-repeater-count',
						'type'        => 'text',
						'title'       => esc_html__( 'Count', 'truvik' ),
						'placeholder' => esc_html__( '785', 'truvik' ),
						'default'     => '789',
						'validate'    => 'numeric'
					),
				)
				
			),
			array(
				'id'       => 'accordion-section-7-end',
				'type'     => 'accordion',
				'position' => 'end',
			),
			array(
				'id'       => 'accordion-section-8',
				'type'     => 'accordion',
				'title'    => esc_html__( 'Latest Blog', 'truvik' ),
				'subtitle' => esc_html__( '', 'truvik' ),
				'position' => 'start',
			),
			array(
				'id'       => 'truvik-enable-home-blog',
				'type'     => 'switch',
				'title'    => esc_html__( 'Latest blog area', 'truvik' ),
				'subtitle' => esc_html__( 'Enable/Desable blog area', 'truvik' ),
				'default'  => true,
			),
			array(
				'id'       => 'truvik-home-blog-title',
				'title'    => esc_html__( 'Title', 'truvik' ),
				'type'     => 'textarea',
				'subtitle' => wp_kses_post( esc_html( 'set the title', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-blog', '=', true ),
				'default'  => '<h2 class="title">Truvik get more articles from our <br><span>Recources</span> news</h2>',
				'validate' => 'html'
			),
			array(
				'id'       => 'truvik-home-blog-subtitle',
				'title'    => esc_html__( 'Subtitle', 'truvik' ),
				'type'     => 'text',
				'subtitle' => wp_kses_post( esc_html( 'set the subtitle', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-blog', '=', true ),
				'default'  => 'LATEST NEWS',
				'validate' => 'no_html'
			),
			array(
				'id'       => 'accordion-section-8-end',
				'type'     => 'accordion',
				'position' => 'end',
			),
			array(
				'id'       => 'accordion-section-9',
				'type'     => 'accordion',
				'title'    => esc_html__( 'Clients Section', 'truvik' ),
				'subtitle' => esc_html__( '', 'truvik' ),
				'position' => 'start',
			),
			array(
				'id'       => 'truvik-enable-home-clients',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fid', 'truvik' ),
				'subtitle' => esc_html__( 'Enable/Desable Fid area', 'truvik' ),
				'default'  => true,
			),
			array(
				'id'       => 'truvik-home-clients-repeater',
				'title'    => esc_html__( 'Add Image', 'truvik' ),
				'type'     => 'repeater',
				'subtitle' => wp_kses_post( esc_html( 'Add Clients Images', 'truvik' ) ),
				'required' => array( 'truvik-enable-home-clients', '=', true ),
				'fields'   => array(
					array(
						'id'      => 'truvik-client-image',
						'type'    => 'media',
						'title'   => esc_html__( 'Add Image', 'truvik' ),
						'default' => ['url' => get_template_directory_uri(  ). '/assets/img/clients.png'],
						'url'     => false
					),
				)
				
			),
			array(
				'id'       => 'accordion-section-9-end',
				'type'     => 'accordion',
				'position' => 'end',
			),
		),
	)
);