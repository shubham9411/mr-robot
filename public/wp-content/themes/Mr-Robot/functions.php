<?php 
include_once('widget.php');
if ( ! function_exists( 'mr_robot_scripts' ) ) {
    function mr_robot_scripts() {
        wp_enqueue_script('mr_robot-nprogress', get_template_directory_uri().'/dist/lib/js/nprogress.js',array('jquery'));
        wp_enqueue_script('mr_robot-bootstrap', get_template_directory_uri().'/dist/lib/js/bootstrap.min.js',array('jquery'));
        wp_enqueue_script('main', get_template_directory_uri().'/main.js',array('jquery'));
        wp_localize_script('main','ajaxurl',admin_url('admin-ajax.php') );
    }
    add_action('wp_enqueue_scripts','mr_robot_scripts');
}

if ( ! function_exists( 'mr_robot_styles' ) ) {
    function mr_robot_styles() {  
        wp_enqueue_style('mr_robot-bootstrap', get_template_directory_uri().'/dist/lib/css/bootstrap.min.css');
        wp_enqueue_style('mr_robot-nprogress', get_template_directory_uri().'/dist/lib/css/nprogress.css');
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
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
        add_theme_support( 'custom-logo', array(
            'width'       => 250,
            'height'      => 250,
            'flex-width'  => true,
        ) );
        add_theme_support('custom-background');
        add_theme_support('title-tag' );
        $args = array(
            'default-image'          => get_stylesheet_directory_uri().'/dist/img/headshot.png',
            // 'width'                  => 100,
            // 'height'                 => 100,
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
        // add_theme_support( 'customize-selective-refresh-widgets' );
        // add_theme_support( 'post-formats',  array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
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
                'name'          => __( 'Primary Sidebar', 'mr_robot' ),
                'id'            => 'primary-sidebar',
                'description'   => 'Primary sidebar to show notification and alert in the website',
                'class'         => 'primary-sidebar',
                'before_widget' => '<li id="%1$s" class="widget %2$s">',
                'after_widget'  => '</li>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>'
            );
        
            register_sidebar( $primary );
        
    }
}
if(!function_exists('mr_robot_meta_tags')){
    function mr_robot_meta_tags(){
        global $post;
        echo '<!--- meta tags--->'."\n";
        echo '<meta property="og:locale" content="en_US" />'."\n";
        echo '<meta property="og:site_name" content="'.get_option('blogname' ).'" />'."\n";
        echo '<meta name="twitter:site" content="'.get_option('blogname' ).'" />'."\n";
        echo '<meta name="twitter:card" content="summary" />'."\n";
        echo '<meta name="twitter:creator" content="@shubham9411" />'."\n";
        if (is_home()) {
            echo '<meta name="robots" content="index,archive,follow" />'."\n";
            echo '<meta property="og:url" content="'.get_home_url().'" />'."\n";
        } 
        else if(is_single() || is_page()){
            echo '<meta name="robots" content="index,archive,follow" />'."\n";
            echo '<meta property="og:url" content="'.get_the_permalink().'" />'."\n";
            $url =  mr_robot_meta_image();
            echo '<meta property="og:image" content="'.$url.'" />'."\n";
            echo '<meta property="og:description" content="'.get_the_excerpt($post->ID).'" />'."\n";
            echo '<meta name="twitter:description" content="'.get_the_excerpt($post->ID).'" />'."\n";
            echo '<meta property="og:title" content="'.get_the_title().'" />'."\n";
            echo '<meta name="twitter:title" content="'.get_the_title().'" />'."\n";
            if(is_single()){
                echo '<meta property="og:type" content="post" />'."\n";
            }
            else{
                echo '<meta property="og:type" content="page" />'."\n";
            }
        }
        else {
            echo '<meta name="robots" content="noindex,noarchive,follow" />'."\n";
        }
        echo '<!--- end meta tags--->'."\n";
    }
}
if(!function_exists('mr_robot_meta_image')){
    function mr_robot_meta_image(){
        global $post, $posts;
        $meta_image = '';
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_the_post_thumbnail(), $matches);
        if( isset($matches[1][0])){
            $meta_image = $matches [1] [0];
        }
        if(empty($meta_image)){
            $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
            if(isset($matches[1][0])){
                $meta_image = $matches [1] [0];
            }
        }
        if(empty($meta_image)){
            $meta_image = get_stylesheet_directory_uri()."/dist/img/default.jpg"; // default image
        }  
        return $meta_image;
    }
}
add_filter('show_admin_bar','__return_false');
add_filter('excerpt_more','mr_robot_excerpt_more');
add_filter('excerpt_length','mr_robot_custom_excerpt_length');
add_action('after_setup_theme', 'mr_robot_theme_setup' );
add_action('wp_head', 'mr_robot_pingback_header' );
add_action('wp_head', 'mr_robot_meta_tags' );
add_filter('the_generator', '__return_null' );
add_action('widgets_init','mr_robot_widget_init');