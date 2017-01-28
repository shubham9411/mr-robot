<?php 
$version = '1.0.0'; // used for returning version of style and js
// define( 'ACF_LITE', true );
// include_once('advanced-custom-fields/acf.php');
// include_once('adv_custom_field.php');
if ( ! isset( $content_width ) ) $content_width = 900;
if ( ! function_exists( 'mr_robot_scripts' ) ) {
    function mr_robot_scripts() {
        $my_js_ver  = md5(date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . '/main.js' )));
        $my_js_ver = mr_robot_return_version($my_js_ver);
        wp_enqueue_script('mr_robot-nprogress', get_template_directory_uri().'/dist/lib/js/nprogress.min.js',array('jquery'));
        wp_enqueue_script('mr_robot-bootstrap', get_template_directory_uri().'/dist/lib/js/bootstrap.min.js',array('jquery'));
        wp_enqueue_script('main', get_template_directory_uri().'/main.js',array('jquery'), $my_js_ver);
        wp_localize_script('main','ajaxurl',admin_url('admin-ajax.php') );
        wp_localize_script('main','header_image' , get_header_image());
        wp_localize_script('main','links',get_posts_nav_link() );
        if(get_option('custom_header_color')){
            wp_localize_script('main','custom_header_color' , get_option('custom_header_color'));
        }
    }
    add_action('wp_enqueue_scripts','mr_robot_scripts');
}

if ( ! function_exists( 'mr_robot_styles' ) ) {
    function mr_robot_styles() {  
        $my_css_ver = md5(date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'style.css' )));
        $my_css_ver = mr_robot_return_version($my_css_ver);
        wp_enqueue_style('mr_robot-bootstrap', get_template_directory_uri().'/dist/lib/css/bootstrap.min.css');
        wp_enqueue_style('mr_robot-font-awesome', get_template_directory_uri().'/dist/lib/css/font-awesome.min.css');
        wp_enqueue_style('mr_robot-nprogress', get_template_directory_uri().'/dist/lib/css/nprogress.min.css');
        wp_enqueue_style('style', get_stylesheet_uri(), false, $my_css_ver);

    }
    add_action('wp_enqueue_scripts','mr_robot_styles');
}
if(!function_exists('mr_robot_custom_excerpt_length')){
    function mr_robot_custom_excerpt_length(){
        return 50;
    }
}
if(!function_exists('mr_robot_excerpt_more')){
    function mr_robot_excerpt_more(){
        global $post;
        return '...<a href="' . get_the_permalink() . '" title="Read More" >Read More → </a>';
    }
}
if(!function_exists('mr_robot_theme_setup')){
    function mr_robot_theme_setup(){
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        register_nav_menu('primary', 'Primary Header Navigation');
        register_nav_menu('secondary', 'Footer Navigation');
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
        add_theme_support( 'custom-logo', array(
            'width'       => 150,
            'height'      => 150,
            'flex-width'  => true,
        ) );
        add_theme_support('custom-background');
        add_theme_support('title-tag' );
        $args = array(
            'default-image'          => get_stylesheet_directory_uri().'/dist/img/headshot.png',
            'width'                  => 100,
            'height'                 => 100,
            'flex-width'             => true,
            'flex-height'            => true,
            'header-text'            => false,
            'default-text-color'     => '',
            'wp-head-callback'       => '',
            'admin-head-callback'    => '',
            'admin-preview-callback' => '',
        );

        $args = apply_filters( 'mr_robot_custom_header_args', $args );

        add_theme_support( 'custom-header', $args );
        add_theme_support( 'post-formats',  array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
        add_option( 'custom_header_color', 'antiquewhite' );
    }
}
if(!function_exists('mr_robot_pingback_header')){
    function mr_robot_pingback_header() {
        if ( is_singular() && pings_open() ) {
            printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
        }
    }
}
if(!function_exists('mr_robot_widget_init')){
    function mr_robot_widget_init(){
           /**
            * Creates a sidebar
            * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
            */
            $primary = array(
                'name'          => __( 'Primary Sidebar', 'Resolution' ),
                'id'            => 'primary-sidebar',
                'description'   => 'Primary sidebar to show notification and alert in the website',
                'class'         => 'primary-sidebar',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>'
            );
        
            register_sidebar( $primary );
        
    }
}
function mr_robot_return_version($var_hash){
    global $version;
    $version_val = $version . '.' . substr($var_hash,0,4);
    return $version_val;
}
if(!function_exists('mr_robot_custom_field')){
    function mr_robot_custom_field($attr){
        global $post;
        $name = $attr['name'];
        if(empty($name)) return;
        return get_post_meta( $post->ID, $name, true );
    }
}
add_filter('show_admin_bar','__return_false');
add_filter('excerpt_more','mr_robot_excerpt_more');
add_filter('excerpt_length','mr_robot_custom_excerpt_length');
add_action('after_setup_theme','mr_robot_theme_setup');
add_action('wp_head','mr_robot_pingback_header');
add_filter('the_generator', '__return_null');
add_action('widgets_init','mr_robot_widget_init');
add_shortcode('new_field','mr_robot_custom_field');
add_shortcode('coming_soon','mr_robot_coming_soon');
function will_paginate() 
{
    global $wp_query;
    if ( is_home() ) {
        $max_num_pages = $wp_query->max_num_pages;
        if ( $max_num_pages > 1 ){
            return true;
        }
    }
    return false;
}