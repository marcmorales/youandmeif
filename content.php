<!-- You&Me theme main loop for post -->

<article class="col-sm-6 col-md-4 clearfix youandmeBlog">
    <div class="thumbnail-img">
       
        <?php 
        if ( has_post_thumbnail() ) { 
        ?>
        
        <!-- Featured image URL -->
        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>">
        
        <?php 
        } else { 
        ?>
        
        <!-- Featured image fallback -->
        <img src="<?php bloginfo('template_directory');?>/images/default-banner.png" alt="<?php the_title();?>">
        
        <?php 
        }
        ?>
        
    </div>
    
    <h2><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h2>
    
    <!--Date/Time, Author and Category-->
    <small>
       
        <?php the_time('F j, Y g:i a (T)'); ?> 

        | By:  <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>"><?php the_author(); ?></a>
    
    </small>
    
    <br>
    
    <small class="category">

        <?php 
        $categories = get_the_category();
        $separator = ', ';
        $output = '';

        if ($categories) {

        // add link to category archives
        foreach ($categories as $category) {
        $output .='<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
        }

        // remove unecessary comma
        echo trim($output, $separator);
        }
        ?>
    
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