<article class="col-sm-6 col-md-4 clearfix youandmeBlog post-aside">
   
    <!--Date/Time, Author and Category-->
    <small>

        <?php the_time('F j, Y g:i a (T)'); ?> 

        | By:  <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>"><?php the_author(); ?></a>

    </small>

    <!-- Print out the content/excerpt -->
    <div class="blogSummary">
    <p>

        <?php 
        // Listen for blog(home), search and archive pages
        if ( is_search() OR is_archive() OR is_home() ) {
            echo get_the_excerpt();
        ?>

        <a href="<?php the_permalink();?>">Read more&raquo;</a>

        <?php
        } else {
            the_content();
        }
        ?>

    </p>
        
    </div>
</article>