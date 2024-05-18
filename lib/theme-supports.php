<?php 
function rasa_blog_theme_support() {
    add_theme_support( 'title-tag' ); 
    add_theme_support( 'post-thumbnails' ); 
    add_theme_support( 'html5', array('search-form', 'comment-list', 'comment-form', 'gallery', 'caption', ) ); 
    add_theme_support( 'customize-selective-refresh-widgets' ); 
    add_theme_support( 'custom-logo', array(
        'height' => 80,
        'flex-height' => false,
        'flex-width' => true,
    ) ); 

}

add_action( 'after_setup_theme', 'rasa_blog_theme_support' );


function rasa_blog_register_menus() {
    register_nav_menus( array (
        'main-menu' => esc_html__( 'Main Menu', 'rasa-blog' ),
        'footer-menu' => esc_html__( 'Footer Menu', 'rasa-blog' ),
        'top-menu' => esc_html__( 'Top Menu', 'rasa-blog' )
    ) );
}
add_action( 'after_setup_theme', 'rasa_blog_register_menus' );

add_action( 'after_setup_theme', 'rasa_blog_posts_formats', 11 );
function rasa_blog_posts_formats(){
 add_theme_support( 'post-formats', array(
    'aside',
    'audio',
    'chat',
    'gallery',
    'image',
    'link',
    'quote',
    'status',
    'video',
    ) );
}

/*
 * Set post views count 
 */
function rasa_blog_post_views($postID) {
    $countKey = 'rasa_blog_post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '1');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}


add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo', array(
    'height' => 60,
    'width'  => 150,
) );

add_theme_support( 'automatic-feed-links' );

add_theme_support( 'post-thumbnails' );
