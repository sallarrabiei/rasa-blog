<?php
/**
 * The header for Rasa Blog theme.
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/styles.css">
    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
        <div class="container-fluid">
                <?php
                  $custom_logo_id = get_theme_mod( 'custom_logo' );
                  $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                  
                  if(has_custom_logo( )){
                    the_custom_logo();
                  } else {
    
                echo '<a class="navbar-brand" href="' . (site_url( )) .'">';
                echo get_bloginfo( 'name' );
                echo '</a>';
    
                } ?>
                
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#rasaBLOG" aria-controls="rasaBLOG" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="rasaBLOG">
                <?php 
                wp_nav_menu( array(
                    'theme_location'  => 'main-menu',
                    'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                    'container'       => '',
                    'menu_class'      => 'navbar-nav me-auto mb-2 mb-lg-0',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ) );
                ?>
            <form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>">
            </form>
            </div>
        </div>
    </nav>