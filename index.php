<?php get_header(); ?>
<hr><hr><hr> <!-- temp -->
<div class="container">
    <div class="row blogArea">
        <?php 
        if( have_posts() ):
            while( have_posts() ): the_post(); ?>

            <?php
            get_template_part('content', get_post_format())
            ?>

            <?php
            endwhile;
        endif;
        ?>
    </div>
</div>
<?php get_footer(); ?>


