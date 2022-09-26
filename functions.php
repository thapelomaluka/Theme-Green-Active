<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

function load_stylesheets()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', [], 1, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('animate', get_stylesheet_directory_uri() . '/css/animate.css', [], 1, 'all');
    wp_enqueue_style('animate');

    wp_register_style('owl', get_stylesheet_directory_uri() . '/css/owl.carousel.css', [], 1, 'all');
    wp_enqueue_style('owl');

    wp_register_style('theme', get_stylesheet_directory_uri() . '/css/owl.theme.green.min.css', [], 1, 'all');
    wp_enqueue_style('theme');

    wp_register_style('carousel', get_stylesheet_directory_uri() . '/css/carousel.css', [], 1, 'all');
    wp_enqueue_style('carousel');

    wp_register_style('nice-hamburger', get_stylesheet_directory_uri() . '/css/nice-hamburger.css', [], 1, 'all');
    wp_enqueue_style('nice-hamburger');

    wp_register_style('PoppinsFont', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900', [], 1, 'all');
    wp_enqueue_style('PoppinsFont');

    wp_register_style('font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', [], 1, 'all');
    wp_enqueue_style('font-awesome');

    /* wp_register_style('coreui', 'https://cdn.jsdelivr.net/npm/@coreui/coreui@4.1.4/dist/css/coreui.min.css', [], 1, 'all');
    wp_enqueue_style('coreui'); */

    wp_register_style('customstyle', get_stylesheet_directory_uri() . '/css/customstyle.css', [], 1, 'all');
    wp_enqueue_style('customstyle');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

function addjs()
{

    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js', [], 1, 1, 1);
    wp_enqueue_script('jquery');

    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', [], 1, 1, 1);
    wp_enqueue_script('bootstrap');

    wp_register_script('main', get_template_directory_uri() . '/js/main.js', [], 1, 1, 1);
    wp_enqueue_script('main');

    wp_register_script('owl', get_template_directory_uri() . '/js/owl.carousel.min.js', [], 1, 1, 1);
    wp_enqueue_script('owl');

    wp_enqueue_script('jquery-form');


    wp_enqueue_script('TweenMax', get_template_directory_uri() . '/js/gsap/minified/TweenMax.min.js', array(),  1, 1, 1);
    wp_enqueue_script('TweenMax');

    wp_enqueue_script('scrollmagic', get_template_directory_uri() . '/js/scrollmagic/uncompressed/ScrollMagic.js', array(), 1, 1, 1);
    wp_enqueue_script('scrollmagic');

    wp_enqueue_script('animation', get_template_directory_uri() . '/js/scrollmagic/uncompressed/plugins/animation.gsap.js', array(), 1, 1, 1);
    wp_enqueue_script('animation');

    wp_enqueue_script('addIndicators', get_template_directory_uri() . '/js/scrollmagic/uncompressed/plugins/debug.addIndicators.js', array(), 1, 1, 1);
    wp_enqueue_script('addIndicators');

   /*  wp_register_script('coreui', 'https://cdn.jsdelivr.net/npm/@coreui/coreui@4.1.4/dist/js/coreui.bundle.min.js', [], 1, 1, 1);
    wp_enqueue_script('coreui'); */

    wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', [], '1.0.0', true);
    wp_localize_script('custom', 'ajax_object', ['ajax_url' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('ajax-nonce')]);
}
add_action('wp_enqueue_scripts', 'addjs');

add_theme_support('menus');
add_theme_support( 'post-thumbnails');
add_theme_support( 'responsive-embeds' );
add_theme_support( 'editor-styles' );
add_theme_support( 'html5', array('style','script',));
add_theme_support( 'automatic-feed-links' );

register_nav_menus([
    'primary' => __('Primary Menu', 'theme'),
]);

if (!file_exists(get_template_directory() . '/class-wp-bootstrap-navwalker.php')) {
    // file does not exist... return an error.
    return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
} else {
    // file exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar()
{
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

add_filter( 'nav_menu_link_attributes', 'bootstrap5_dropdown_fix' );
function bootstrap5_dropdown_fix( $atts ) {
     if ( array_key_exists( 'data-toggle', $atts ) ) {
         unset( $atts['data-toggle'] );
         $atts['data-bs-toggle'] = 'dropdown';
     }
     return $atts;
}



function register_my_customizations( $wp_customize ) {
   // setting
   $wp_customize->add_setting( 'header_color' , array(
    'default'   => '#000000',
    'transport' => 'refresh',
    ));
    // section
    $wp_customize->add_section( 'colors' , array(
      'title'      => __( 'Colors', 'custom_theme' ),
      'priority'   => 30,
    ));
    // control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
    	 'label'      => __( 'Header Color', 'custom_theme' ),
  	   'section'    => 'colors',
  	   'settings'   => 'header_color',
     ))
    );
}
add_action( 'customize_register', 'register_my_customizations' );

function apply_my_customizations() {
  echo '<style type="text/css">'.
          'h1 { color: '.get_theme_mod('header_color','#000000').'; }'.
       '</style>';
}
add_action( 'wp_head', 'apply_my_customizations');

function register_widget_areas() {

    register_sidebar( array(
        'name'          => 'Footer Logo',
        'id'            => 'footer_logo',
        'description'   => 'Add the logo for the company',
        'before_widget' => '<div class="footer-logo-wrapper">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => 'Company Number',
        'id'            => 'company_number',
        'description'   => 'Company Number section',
        'before_widget' => '<div class="company_number-area">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => 'Header logo',
        'id'            => 'header_logo',
        'description'   => 'The Logo for the company',
        'before_widget' => '<div class="header_logo_wrapper">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => 'Experience Page Banner',
        'id'            => 'experiecepage_banner',
        'description'   => 'The Logo for the company',
        'before_widget' => '<div class="banner_wrapper">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
    
    register_sidebar( array(
        'name'          => 'Destinations Page Banner',
        'id'            => 'destinationspage_banner',
        'description'   => '',
        'before_widget' => '<div class="bcg" id="desti">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => 'About Page Banner',
        'id'            => 'aboutpage_banner',
        'description'   => '',
        'before_widget' => '<div class="bcg" id="abt">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
    
    register_sidebar( array(
        'name'          => 'How Page Banner',
        'id'            => 'howpage_banner',
        'description'   => '',
        'before_widget' => '<div class="bcg" id="howp">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => 'contact Page Banner',
        'id'            => 'contactpage_banner',
        'description'   => '',
        'before_widget' => '<div class="bcg" id="contactp">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'register_widget_areas' );



function displayTagDestination()
{
$query = 'SELECT name FROM `wp_services`';
        $out = '';
        $subout = '';
        $result = $wpdb->get_results($query);
        if (!count($result) == 0) {
            for ($i = 0; $i < count($result); ++$i) {
                echo $result->name;
            }
        }
}

add_action('displayTagDestination', 'displayTagDestination');