<?php

function rasa_blog_customize_register( $wp_customize) {



    $wp_customize ->  selective_refresh -> add_partial('_themname_footer_partial', array(
        'setting' => array('rasa_blog_site_info' , 'rasa_blog_footer_layout'),
        'selector' => '',
        'container_inclusive' => true ,
        'render_callback' => function() {
            get_template_part( 'template-parts/footer/info');
        }
    ));

    $wp_customize -> add_section('rasa_blog_footer_copyright', array(
        'title' => esc_html__( 'Footer Settings', 'rasa-blog' ),
        'description' => esc_html__( 'Change Footer Copyright.', 'rasa-blog' ),
        'priority' => 90
    ));

    $wp_customize -> add_setting('rasa_blog_site_info', array(
        'default' => 'all rights reserved for <a href="http://rabiei.me" title="rabiei">Rabiei</a>',
        'sanitize_callback' => 'rasa_blog_sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize -> add_control('rasa_blog_site_info', array(
        'type' => 'text',
        'label' => esc_html__( 'site copyright footer', 'rasa-blog' ),
        'section' => 'rasa_blog_footer_copyright'
    ));
    
    
}

add_action( 'customize_register', 'rasa_blog_customize_register' );

function rasa_blog_sanitize_text_field( $input ){
    $allowed = array( 'a' => array(
        'href' => array(),
        'title' => array()

    ));
    return wp_kses($input, $allowed);
}