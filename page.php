<?php get_header(); ?>
    <?php
        if(have_posts()) { 
    ?>
            <?php while(have_posts()) { ?>
                <?php the_post(); 
                rasa_blog_post_views(get_the_ID());
                $post_views_count = get_post_meta( get_the_ID(), 'rasa_blog_post_views_count', true );
                // Check if the custom field has a value.
                ?>
            <div class="container px-4 py-5 border-bottom">
                <?php if (has_post_thumbnail()) { ?>
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                    <div class="col-10 col-sm-8 col-lg-6">
                        <?php the_post_thumbnail('medium_large', array('class' => 'd-block mx-lg-auto img-fluid', 'width' => '700', 'height' => '500')); ?>
                    </div>
                <?php } ?>
                    <div class="<?php if (has_post_thumbnail() ) { echo 'col-lg-6'; } else { echo 'col-lg-12'; } ?>">
                
                        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?php the_title() ?></h1>
                        <p class="lead">POSTED ON <?php echo '<time class="text-secondary" datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time>'; ?> BY <span class="text-secondary"><?php $author_id = $post->post_author;
                        echo get_the_author_meta( 'nickname', $author_id ); ?> <span class="mx-2">|</span> 
                         
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                        </svg>
                        <?php echo $post_views_count; ?></span></p>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="g-5">
                    <article>
                        <?php the_content(); ?>
                    </article>
                </div>
            </div>
    <?php } ?>
    <?php
    
    ?>
    <?php } else { ?>
        <h2><?php echo apply_filters('rasa_blog_no_posts_text', esc_html__('Sorry! There is not any content.', 'rasa-blog')); ?></h2>
    <?php } ?>
    <!--start comment -->
    <div class="container">
        <?php // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
        	comments_template();
        endif;	?>            
    </div>
<?php get_footer(); ?>
