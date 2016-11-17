<?php get_header(); 
/*
    Template Name: You&Me Home Page
*/
?>

<div id="bannerImage" style="background: url('<?php header_image();?>') no-repeat fixed center center;"></div>

<div class="container">
    
    <?php 
    // pull list of event category to front page
    $eventPost = new WP_Query('cat=12&posts_per_page=1');
    if( $eventPost->have_posts() ):
    ?>
       <h2>Events</h2><?php
        while( $eventPost->have_posts() ): $eventPost->the_post();
    ?>
            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
     <?php   
        endwhile;
    else :
        echo '<p>No content found</p>';
    endif;
    wp_reset_postdata();
    ?>
</div>

<?php get_footer(); ?>