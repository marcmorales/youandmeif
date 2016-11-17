<?php get_header(); 
/*
    Template Name: You&Me General Page
*/
?>

<div class="container">
    <hr>
    
    <!-- Child Page loop -->
    <?php
    if(have_posts()) :
        while (have_posts()) : the_post();
    ?>
    
    <?php 
    if (has_children() OR $post->post_parent > 0) {
        ?>
        <h2 class="current-page"><a href="<?php echo get_the_permalink(youandmeif_childPage());?>"><?php echo get_the_title(youandmeif_childPage());?></a></h2>
        <?php 
        $args = array(
            'child_of' => youandmeif_childPage(),
            'title_li' => ''
        );
        wp_list_pages( $args );

        if ($post->post_parent > 0) {
            ?>
            <h2><?php the_title();?></h2>
            <?php
        }
    } else {
        ?>
        <h2><?php the_title();?></h2>
        <?php
    }
    ?>
    <p><?php the_content();?></p>
    
    <?php
        endwhile;
    endif;
    ?>
    
</div> <!-- /container -->
<?php get_footer(); ?>