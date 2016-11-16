<?php get_header(); ?>
<hr><hr><hr> <!-- temp -->
<div class="container">
   <!-- class postArea: Single blog post page -->
    <div class="row postArea">
        <?php 
        if( have_posts() ):
            while( have_posts() ): the_post(); ?>

            <?php
            get_template_part('content', get_post_format())
            ?>

            <?php
            endwhile;
            else :?>
            <section class="col-sm-6 col-md-4 clearfix youandmeBlog">
                <div class="thumbnail-img">
                <img src="<?php bloginfo('template_directory');?>/images/default-banner.png" alt="<?php the_title();?>">
                </div>
                <h2>No Content Found</h2>
                <div class="blogSummary">
                    <p>Start adding content by clicking <a href="#"><strong>here</strong></a></p>
                </div>
            </section>
            <?php
        endif;
        ?>
    </div>
</div>
<?php get_footer(); ?>


