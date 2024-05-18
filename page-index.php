<?php /* Template Name: Blog index */ ?>
<?php

get_header();

?>
<div class="container">
        <div class="px-4 py-5 my-5 text-center">
            <h1 class="display-1 fw-bold text-body-emphasis"><?php single_post_title(); ?></h1>
            <div class="mx-auto">
                <p class="lead mb-4">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                    the_content();
                    endwhile; else: ?>
                </p>
                <p>Sorry, no posts matched your criteria.</p>
                <?php endif; 
                wp_reset_query(); ?>
                
            </div>
        </div>
        <main>
            <ol>
            <?php
                global $query_string;
                query_posts (array('posts_per_page'=>'-1', 'order' => 'asc'));

                if(have_posts()) { 
                ?>
                <?php while(have_posts()) { ?>
                <?php the_post(); ?>
                <li>
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"  class="text-decoration-none text-dark"><?php the_title() ?></a>
                </li>
                
                 <?php } ?>
            
                <?php } ?>
            </ol>
    
            
        </main>

    </div>
    
    
<?php


get_footer();
?>