<?php get_header(); ?>
<hr> <!-- Temp -->
<div class="container">
    <!-- Archive title -->
    <h2>
    
    <?php 
    $archive = 'Archives';

    if ( is_category() ) {
        echo single_cat_title() . ' ' . $archive;

    } elseif ( is_tag() ) {
        echo single_tag_title() . ' ' . $archive;

    } elseif ( is_author() ) {
        the_post();
        echo 'Author ' . $archive . ': ' . get_the_author();
        rewind_posts();
        
    } else {
        echo $archive;
    }
    ?>
    
    </h2>
    <!-- class archiveArea: Archive page -->
    <div class="row archiveArea">
    
        <?php 
        if( have_posts() ):
            while( have_posts() ): the_post();
                get_template_part('content', get_post_format());
            endwhile;
        else :
        ?>

        <!-- TEMPORARY FALLBACK -->
        <section class="col-sm-6 col-md-4 clearfix youandmeBlog">
            <div class="thumbnail-img">
                <img src="<?php bloginfo('template_directory');?>/images/default-banner.png" alt="<?php the_title();?>">
            </div>
            <h2>No Content Found</h2>
            <div class="blogSummary">
                <p>Start adding content by clicking <a href="#"><strong>here</strong></a></p>
            </div>
        </section>
    
    <?php endif;?>
    
    </div> <!-- /row -->
</div> <!-- /container -->
<?php get_footer(); ?>