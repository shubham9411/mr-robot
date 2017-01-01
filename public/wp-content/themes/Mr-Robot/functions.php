<?php 

if ( ! function_exists( 'mr_robot_scripts' ) ) {
    function mr_robot_scripts() {
        wp_enqueue_script('mr_robot-jquery', get_template_directory_uri().'/dist/lib/js/jquery-1.11.3.min.js');
        wp_enqueue_script('mr_robot-bootstrap', get_template_directory_uri().'/dist/lib/js/bootstrap.min.js');
        wp_enqueue_script('main', get_template_directory_uri().'/main.js');
        wp_localize_script('main','ajaxurl',admin_url('admin-ajax.php') );

    }
    add_action('wp_enqueue_scripts','mr_robot_scripts');
}

if ( ! function_exists( 'mr_robot_styles' ) ) {
    function mr_robot_styles() {  
        wp_enqueue_style('mr_robot-bootstrap', get_template_directory_uri().'/dist/lib/css/bootstrap.min.css');
        wp_enqueue_style('style', get_template_directory_uri().'/style.css');

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
        return '...';
    }
}
if(!function_exists('mr_robot_theme_setup')){
    function mr_robot_theme_setup(){
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        register_nav_menu('primary', 'Primary Header Navigation');
        register_nav_menu('secondary', 'Footer Navigation');
    }
}
add_filter('show_admin_bar','__return_false');
add_filter('excerpt_more','mr_robot_excerpt_more');
add_filter('excerpt_length','mr_robot_custom_excerpt_length');
add_action( 'init', 'mr_robot_theme_setup' );