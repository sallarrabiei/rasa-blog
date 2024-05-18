<?php//popular post query
    query_posts('meta_key=post_views_count&posts_per_page=5&orderby=meta_value_num&
    order=DESC');
    if (have_posts()) : while (have_posts()) : the_post();
?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php
    endwhile; endif;
    wp_reset_query();
?>