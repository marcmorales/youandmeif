<?php get_header(); ?>
<hr> <!-- temp -->
<div class="container">
    <!-- class postArea: Single blog post page -->
    <div class="row postArea">
       
        <?php 
        if( have_posts() ):
            while( have_posts() ): the_post();
                get_template_part('content', get_post_format());
            endwhile;
        else :
        ?>
        
        <p>TEST</p>
        
        <?php
        endif;
        ?>
        
    </div> <!-- /row -->
</div> <!-- /container -->
<?php get_footer(); ?>


