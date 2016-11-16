<?php get_header(); 

/*
    Template Name: You&Me General Page
*/

?>
<div class="container">
    <br>
    <hr>
    
    <!-- Child Page loop -->
    <?php
    
    if(have_posts()) :
        while (have_posts()) : the_post();
    ?>
    <h2 class="current-page"><a href="<?php echo get_the_permalink(youandmeif_childPage());?>"><?php echo get_the_title(youandmeif_childPage());?></a></h2>
    <?php 
        $args = array(
            'child_of' => youandmeif_childPage(),
            'title_li' => ''
        );
        wp_list_pages( $args );
    ?>
    
    <hr>
    <h2><?php the_title();?></h2>
    <p><?php the_content();?></p>
    <?php
        endwhile;
    endif;
    ?>
</div>

<?php get_footer(); ?>