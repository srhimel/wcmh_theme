<?php
/**
 * orDomain 
 *
 * @link https:fb.com/s.r.himel
 *
 * @package WordPress
 * @subpackage OrDomain
 * @since 1.0
 */

/**
 * OrDomain only works in WordPress 4.7 or later.
 */ 

// Theme setup functions


add_action('after_setup_theme','ordomain_fun');

function ordomain_fun(){
    
    //Text Domain
    load_theme_textdomain('language',get_template_directory().'/languages');
    
    // Theme Support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
//    add_theme_support('custom-header',array(
//        'default-image' => get_template_directory_uri().'/img/logo.png'
//    ));
    
    // Sidebar Registration
    add_action('widgets_init', 'sidebar_areas');

    function sidebar_areas(){
        register_sidebar(array(
		'name' 			=> __('Right Sidebar', 'language'),
		'description' 	=> __('You may add your Right Sidebar Widgets Here', 'language'),
		'id' 			=> 'right-sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h6 class="upper">',
		'after_title' 	=> '</h6>'
	));
        register_sidebar(array(
		'name' 			=> __('Footer 1', 'language'),
		'description' 	=> __('You may add your Footer Middle Area Widget Here', 'language'),
		'id' 			=> 'footer-1',
		'before_widget' => '<div class="widget">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4 class="title">',
		'after_title' 	=> '</h4>'
	   ));
        register_sidebar(array(
		'name' 			=> __('Footer 2', 'language'),
		'description' 	=> __('You may add your Footer Last Area Widget Here', 'language'),
		'id' 			=> 'footer-2',
		'before_widget' => '<div class="widget">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4 class="title">',
		'after_title' 	=> '</h4>'
	   ));
        
        
    }
    
    // Menu
    register_nav_menu('main-menu',__('Main Menu','language'));
    register_nav_menu('footer-menu',__('Footer Menu','language'));
    //Custom Posts - Services
    if(current_user_can('manage_options')){
        register_post_type('services',array(
        'labels'    => array(
            'name'      =>'Services',
            'add_new_item'  => 'Add New Services',
            'view_item' => 'View Services'
        ),
        'public'    => true,
        'menu_icon' => 'dashicons-megaphone',
        'menu_position' => 4,
        'supports'  => array('title','editor','revisions'),
        'show_in_nav_menus' => false
        ));
        
    }
    // Domain Details
    if(current_user_can('manage_options')){
        register_post_type('domaindetails',array(
        'labels'    => array(
            'name'      =>'Domain Details',
            'add_new_item'  => 'Add New Doamin Details',
            'view_item' => 'View Details'
        ),
        'public'    => true,
        'menu_icon' => 'dashicons-clipboard',
        'menu_position' => 4,
        'supports'  => array('title','editor','revisions'),
        'show_in_nav_menus' => false
        ));
        
    }
    // Domain Details
    if(current_user_can('manage_options')){
        register_post_type('pricing',array(
        'labels'    => array(
            'name'      =>'Pricing Tables',
            'add_new_item'  => 'Add New Table',
            'view_item' => 'View Table'
        ),
        'public'    => true,
        'menu_icon' => 'dashicons-editor-table',
        'menu_position' => 4,
        'supports'  => array('title','editor','revisions'),
        'show_in_nav_menus' => false
        ));
        
    }
    // Counter
    if(current_user_can('manage_options')){
        register_post_type('counter',array(
        'labels'    => array(
            'name'      =>'Counter Items',
            'add_new_item'  => 'Add New Item',
            'view_item' => 'View itrm'
        ),
        'public'    => true,
        'menu_icon' => 'dashicons-carrot',
        'menu_position' => 4,
        'supports'  => array('title','editor','revisions'),
        'show_in_nav_menus' => false
        ));
        
    }
    // Testimonials
    if(current_user_can('manage_options')){
        register_post_type('testimonial',array(
        'labels'    => array(
            'name'      =>'Testimonials',
            'add_new_item'  => 'Add New Testimonial',
            'view_item' => 'View Testimonial'
        ),
        'public'    => true,
        'menu_icon' => 'dashicons-format-quote',
        'menu_position' => 4,
        'supports'  => array('title','editor','thumbnail','revisions'),
        'show_in_nav_menus' => false
        ));
        
    }
    
    
    
    
    
}


class walkermenu extends Walker_Nav_Menu{
    function start_lvl(&$output,$depth = 0, $args = array() ){
        $indent = str_repeat("t", $depth);
        $submen = ($depth>0) ? ' sub-menu' : '';
        $output .="\n$indent<ul class=\"dropdown-menu$submenu depth-$depth\">\n";
    }
    
    function start_el(&$output, $item, $depth = 0 , $args = array(), $id=0){
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $li_attributes = '';
        $class_names = $values = '';
        
        
        $classes[] = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = ($args-> walker->has_children) ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = 'menu-item' .$item->ID;
        
        if($depth && $args->walker->has_children){
            $classes[] = 'dropdown-submen';
        }
        $class_name= join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item , $args));
        $class_names = 'class"' .esc_attr($class_names) .'"';
        
        $id = apply_filters('nav_menu_item_id', 'active', $items, $args);
        $id = 'id="' .esc_attr($id) .'"';
        
        $output .=$indent.'<li '.$id .$values .'class="dropdown"' .$li_attributes .'>';
        
        $attributes = !empty($item->attr_title) ? 'title="' .$item->attr_title.'"' : '';
        $attributes .= !empty($item->target) ? 'target="' .$item->atarget.'"' : '';
        $attributes .= !empty($item->xfn) ? 'rel="' .$item->xfn.'"' : '';
        $attributes .= !empty($item->url) ? 'href="' .$item->url.'"' : '';
        
        $attributes .= ($args->walker->has_children) ? 'class="dropdown-toggle" data-toggle="dropdown"' : '';
        $menuitems = $args->before;
        $menuitems .= '<a '.$attributes .'>';
        $menuitems .= $args->before_link .apply_filters('the_title', $item->title , $item->ID) .$args->after_link;
        $menuitems .= ($depth ==0 && $args->walker->has_children) ? ' <span class="caret"></span></a>' : '</a>';
        $menuitems .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $menuitems , $item, $depth, $args);
    }
    
}


//Adding Redux Framework

if( file_exists( dirname( __FILE__ ) . '/themeoption/ReduxCore/framework.php')){
    require_once( dirname( __FILE__ ) . '/themeoption/ReduxCore/framework.php');
}
if( file_exists( dirname( __FILE__ ) . '/themeoption/sample/config.php')){
    require_once( dirname( __FILE__ ) . '/themeoption/sample/config.php');
}

//Adding Shortcode

if( file_exists( dirname( __FILE__ ) . '/shortcode/shortcode.php')){
    require_once( dirname( __FILE__ ) . '/shortcode/shortcode.php');
}

//Adding CMB2 metabox

if( file_exists( dirname( __FILE__ ) . '/metabox/init.php')){
    require_once( dirname( __FILE__ ) . '/metabox/init.php');
}
if( file_exists( dirname( __FILE__ ) . '/metabox/cusmeta.php')){
    require_once( dirname( __FILE__ ) . '/metabox/cusmeta.php');
}
// TMG Plugin
if( file_exists( dirname( __FILE__ ) . '/plugin/require.php')){
    require_once( dirname( __FILE__ ) . '/plugin/require.php');
}
// Google Fonts

function get_google_fonts(){
    $fonts = array();
    $fonts[] = 'Roboto:100,300,400,500,700,900';
    $or_fonts = add_query_arg(
    array(
        'family' => urlencode(implode('|',$fonts))
        ), 'https://fonts.googleapis.com/css'
    );
    return $or_fonts;
}



// Adding Stylesheet
add_action('wp_enqueue_scripts','ordomain_styles');
function ordomain_styles(){
    wp_enqueue_style('fontawesome', get_template_directory_uri().'/css/font-awesome.min.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('owlcarousel', get_template_directory_uri().'/css/owl.carousel.min.css');
    wp_enqueue_style('bxslider', get_template_directory_uri().'/css/jquery.bxslider.min.css');
    wp_enqueue_style('maincolor', get_template_directory_uri().'/css/main-color-1.css');
    wp_enqueue_style('mainstyle', get_stylesheet_uri());
    wp_enqueue_style('responsive', get_template_directory_uri().'/css/responsive-style.css');
    wp_enqueue_style('googlefonts', get_google_fonts());
    
    
}

// Adding conditional Scripts
add_action('wp_enqueue_scripts','ordomain_conditional');
function ordomain_conditional(){
    wp_enqueue_script('shimp','https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js',array(),'',false);
    wp_script_add_data('shimp','conditional','lt IE 9');    wp_enqueue_script('respond','https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js',array(),'',false);
    wp_script_add_data('respond','conditional','lt IE 9');
}

// Adding Scripts
add_action('wp_enqueue_scripts','ordomain_scripts');
function ordomain_scripts(){
    wp_enqueue_script( 'script', get_template_directory_uri().'/js/jquery-2.2.2.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'script2', get_template_directory_uri().'/js/bootstrap.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'script3', get_template_directory_uri().'/js/jquery.validate.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'script4', get_template_directory_uri().'/js/owl.carousel.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'script5', get_template_directory_uri().'/js/jquery.bxslider.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'script6', get_template_directory_uri().'/js/jquery.waypoints.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'script7', get_template_directory_uri().'/js/jquery.counterup.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'script8', get_template_directory_uri().'/js/isotope.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'script11', 'https://platform.twitter.com/widgets.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'script9', get_template_directory_uri().'/js/retina.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'script10', get_template_directory_uri().'/js/main.js', array ( 'jquery' ), 1.1, true);

}
add_action('vc_before_init','set_as_theme_vc');
function set_as_theme_vc(){
    vc_set_as_theme();

vc_map(array(
    'name'  => 'Home Slider',
    'base'  => 'home-slider',
    'show_setting_on_create'    => false
));
vc_map(array(
    'name'  =>  'Service',
    'base'  =>  'service',
    'params' => array(
        array(
            'type'  =>  'textfield',
            'heading'   => 'Title',
            'value' =>  'OUR SERVICES',
            'param_name'    => 'title'
        ),
        array(
            'type'  =>  'textfield',
            'heading'   => 'Subitle',
            'value' =>  'WHY CHOOSE US',
            'param_name'    => 'subtitle'
        )
    )
));
vc_map(array(
    'name'  =>  'Banner',
    'base'  =>  'banner',
    'params' => array(
        array(
            'type'  =>  'textfield',
            'heading'   => 'Title',
            'value' =>  'DOMAIN NAME?',
            'param_name'    => 'title'
        ),
        array(
            'type'  =>  'textfield',
            'heading'   => 'Subitle',
            'value' =>  'LOOKING A PREMIUM QUALITY',
            'param_name'    => 'subtitle'
        ),
        array(
            'type'  =>  'textfield',
            'heading'   => 'Content',
            'value' =>  'FREE WITH EVERY DOMAIN NAME!',
            'param_name'    => 'content'
        )
    )
));
vc_map(array(
    'name'  =>  'Pricing',
    'base'  =>  'pricing',
    'params' => array(
        array(
            'type'  =>  'textfield',
            'heading'   => 'Title',
            'value' =>  'pricing',
            'param_name'    => 'title'
        ),
        array(
            'type'  =>  'textfield',
            'heading'   => 'Subitle',
            'value' =>  'our popular',
            'param_name'    => 'subtitle'
        )
    )
));
vc_map(array(
    'name'  =>  'Counter',
    'base'  =>  'counter',
    'params' => array(
        array(
            'type'  =>  'textfield',
            'heading'   => 'Title',
            'value' =>  'STATISTICS',
            'param_name'    => 'title'
        ),
        array(
            'type'  =>  'textfield',
            'heading'   => 'Subitle',
            'value' =>  'COMPANY',
            'param_name'    => 'subtitle'
        )
    )
));
vc_map(array(
    'name'  =>  'Testimonial',
    'base'  =>  'testimonial',
    'params' => array(
        array(
            'type'  =>  'textfield',
            'heading'   => 'Title',
            'value' =>  'OUR CLIENTS & FEEDBACK',
            'param_name'    => 'title'
        ),
        array(
            'type'  =>  'textfield',
            'heading'   => 'Subitle',
            'value' =>  'CLIENTS & FEEDBACK',
            'param_name'    => 'subtitle'
        )
    )
));
vc_map(array(
    'name'  =>  'Newslatter',
    'base'  =>  'newslatter',
    'params' => array(
        array(
            'type'  =>  'textfield',
            'heading'   => 'Title',
            'value' =>  'SUBSCRIBE TO GET OUR NEWSLETTER',
            'param_name'    => 'content'
        )
    )
));

vc_map(array(
    'name'  =>  'Blog',
    'base'  =>  'blog',
    'params' => array(
        array(
            'type'  =>  'textfield',
            'heading'   => 'Title',
            'value' =>  'RECENT BLOG POST',
            'param_name'    => 'title'
        ),
        array(
            'type'  =>  'textfield',
            'heading'   => 'Subitle',
            'value' =>  'latest post',
            'param_name'    => 'subtitle'
        )
    )
));


}





















