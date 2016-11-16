<?php get_header(); ?>
<hr> <!-- temp -->
<div class="container">
    <!-- class searchArea: Search result page -->
    <div class="row searchArea">
       
        <?php 
        if( have_posts() ):
        ?>

        <h2>Search results for: <?php the_search_query();?></h2>

        <?php 
            while( have_posts() ): the_post();
                get_template_part('content', get_post_format());
            endwhile;
        else :
        ?>
        
        <p>TEst</p>
        
        <?php
        endif;
        ?>
        
    </div> <!-- /row -->
</div> <!-- /container -->
<?php get_footer(); ?>


