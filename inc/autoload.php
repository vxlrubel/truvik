<?php
// directly access denied
// define('ABSPATH') or exit;

// directly access denied
defined('ABSPATH') OR exit;

// all the conditional function

// define some conditional functions
require_once dirname(__FILE__).'/function.php';

require_once dirname(__FILE__).'/template.php';

// custom meta field
// require_once 'classes/class-custom-meta.php';

// post class 
require_once dirname(__FILE__).'/classes/class-post.php';

// custom post type
require_once dirname(__FILE__).'/classes/class-post-type.php';

// custom post type called "services"
require_once dirname(__FILE__).'/classes/class-services.php';

// custom post type called "immigrations"
require_once dirname(__FILE__).'/classes/class-immigration.php';

// custom post type called "testimonial"
require_once dirname(__FILE__).'/classes/class-testimonial.php';

// include header part
require_once dirname(__FILE__).'/classes/class-header.php';

// custom walker class for nav menus
require_once dirname(__FILE__).'/classes/class-truvik-nav-menu.php';

// shortcode
require_once dirname(__FILE__).'/classes/class-shortcodes.php';

// custom meta boxes
require_once dirname(__FILE__).'/classes/truvik-custom-metaboxes.php';

// custom loagin page design
require_once dirname(__FILE__).'/classes/class-login-page.php';


// application form submited
require_once dirname(__FILE__).'/class-application.php';

// include assessment form for admin
require_once dirname(__FILE__).'/classes/admin/class-assessment.php';

// custom data base handler
require_once dirname(__FILE__).'/classes/admin/class-ajax-data-handler.php';

/**
 * Include All widget items
 * 
 * @return widget item 
 */

//  search widget
require_once dirname(__FILE__).'/classes/widgets/widget-search.php';

// trending post widget
require_once dirname(__FILE__).'/classes/widgets/widget-trending-post.php';
 

// Theme Options Framework
require_once dirname( __FILE__ ) . '/theme-options/redux-core/framework.php';



// require_once dirname( __FILE__ ) . '/theme-options/sample/sample-config.php';

// Customize Options
// require_once dirname( __FILE__ ) . '/theme-options/sample/config.php';

require_once dirname( __FILE__ ) . '/options-config.php';
