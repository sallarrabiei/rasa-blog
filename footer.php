    <div class="container-fluid">
        <footer class="py-3 my-4">
            <?php 
            wp_nav_menu( array(
                'theme_location'  => 'footer-menu',
                'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
                'container'       => '',
                'menu_class'      => 'nav justify-content-center border-bottom pb-3 mb-3',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker(),
            ) );
            ?>
            <?php 
                $site_info = get_theme_mod( 'rasa_blog_site_info', 'All rights reserved' );
            
            ?>
            <?php if ($site_info) { ?>
            <p class="text-center text-body-secondary"><?php
                    $allowed = array('a' => array(
                        'href' => array(),
                        'title' => array()
                
                    ));
                    echo wp_kses( $site_info, $allowed ); ?></p>
            <?php } ?>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.bundle.min.js" ></script>
    <?php wp_footer(); ?>

</body>
</html>