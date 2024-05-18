<?php

get_header();

?>
<div class="container">
        <div class="px-4 py-5 my-5 text-center">
            <?php the_archive_title( '<h1 class="display-1 fw-bold text-body-emphasis">','</h1>' ); ?>
            <div class="mx-auto">
                <?php the_archive_description('<p class="lead mb-4">', '</p>'); ?>
            </div>
        </div>
        <main>
            <hr>
                <?php if(have_posts()) { ?>
                <?php while(have_posts()) { ?>
                <?php the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('mb-4'); ?> >
                <h2 class="display-2"><?php the_title() ?></h2>
                <p class="lead">POSTED ON <?php echo '<time class="text-muted" datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time>'; ?> BY <span class="text-secondary"><?php $author_id = $post->post_author;
                        echo get_the_author_meta( 'nickname', $author_id ); ?> <span class="mx-2"></span></p>
                <p>
                    <?php the_excerpt(); ?>
                </p>
                <p class="text-end">
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="text-dark"><em>Continue Reading</em></a>
                </p>
                
                    </article>
                    <hr>
                <?php } ?>

                <?php } else { ?>
                <h2><?php echo apply_filters('rasa_blog_no_posts_text', esc_html__('sorry, there is no content!', 'rasa-blog')); ?></h2>
                <?php } ?>
        </main>
        <?php the_posts_pagination(); ?>


    </div>
    
    
<?php



//popular post query
    query_posts('meta_key=post_views_count&posts_per_page=5&orderby=meta_value_num&
    order=DESC');
    if (have_posts()) : while (have_posts()) : the_post();
?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php
    endwhile; endif;
    wp_reset_query();

get_footer();
?>