<?php get_header(); ?>


    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold text-body-emphasis">Search for: <span><?php echo esc_attr( get_search_query() ); ?></span></h1>
        
    </div>
    <main class="row mx-0 my-2" data-masonry='{"percentPosition": true }'>
        <?php if(have_posts()) { ?>
            <?php while(have_posts()) { ?>
                <?php the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('col-sm-6 col-lg-4 mb-4'); ?> >
                      <div class="card">
                        <div class="z-2 overflow-hidden max-h-300">
                        <?php if ( false == get_post_format() ) { ?>
                        <?php the_post_thumbnail('medium_large', array('class' => 'w-100 h-auto')); ?>
                            <div class="bg-white fixed-top left-fixed position-absolute w-100 h-100 opacity-50 z-2"></div>
                        <?php } ?>

                        </div>
                        <?php if ( false == get_post_format() ) { ?>
                        <div class="card-body z-3">
                            <h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="text-decoration-none card-title"><?php the_title() ?></a></h2>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                            <?php echo '<time class="text-muted" datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time>'; ?>
                        </div>
                        <?php } ?>
                        <?php if ( has_post_format('quote') ) { ?>
                            <figure class="p-3 mb-0">
                                <blockquote class="blockquote">
                                    <h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"  class="text-decoration-none card-title"><?php the_title() ?></a></h2>
                                </blockquote>
                                <figcaption class="blockquote-footer mb-0 text-muted">
                                    <cite title="Source Title">
                                        <?php 
                                        $quote =get_post_meta( $post->ID, 'rasa_blog_post_quote', true );
                                        echo $quote;
                                        ?>
                                        </cite>
                                </figcaption>
                            </figure>
                        <?php } ?>
                      </div>
                    </article>
                    
                <?php } ?>

        <?php } else { ?>
        <h2><?php echo apply_filters('rasa_blog_no_posts_text', esc_html__('Sorry, there is no content!', 'rasa-blog')); ?></h2>
        <?php } ?>
    </main>


<?php get_footer(); ?>
