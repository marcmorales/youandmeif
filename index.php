<?php get_header(); ?>
    <?php 
    if( have_posts() ):
        while( have_posts() ): the_post(); ?>
        
            <h2><?php the_title(); ?></h2>
            <small>Posted: <?php the_date() ?> at <?php the_time("g:i a (T)") ?></small>
            <p><?php the_content(); ?></p>
            <small><?php the_category() ?></small>
            <hr>
        <?php
        endwhile;
    endif;
    ?>
<?php get_footer(); ?>


