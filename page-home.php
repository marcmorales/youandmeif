<?php get_header(); 
/*
    Template Name: You&Me Home Page
*/
?>

<div id="bannerImage" style="background: url('<?php header_image();?>') no-repeat scroll center center;"></div>

<div class="container-fluid introduction">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid eventList">
    <div class="container">
        <div class="row">
        <?php 
        // pull list of event category to front page
        $eventPost = new WP_Query('cat=12&posts_per_page=2');
        if( $eventPost->have_posts() ):
        ?>
          
           <h2 class="col-md-12">Current Events</h2><?php
            while( $eventPost->have_posts() ): $eventPost->the_post();
        ?>
            <div class="col-md-6 eventPost">
               <a href="<?php the_permalink();?>">
                  <div class="img-box" style="background: url('<?php 
                                           
                   if (has_post_thumbnail() ) {
                       echo wp_get_attachment_url( get_post_thumbnail_id($post->ID));
                   } else {
                       bloginfo('template_directory');?>/images/default-banner.png<?php
                   }
                   ?>') no-repeat scroll center center;">
                   
                   <h2 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                   
                   <p class="post-excerpt"><?php echo get_the_excerpt();?></p>
                   
                   <div class="img-overlay"></div>
                
               </div> <!-- /img-box -->
                </a>
            </div>
         <?php   
            endwhile;
        else :
            echo '<p>No content found</p>';
        endif;
        wp_reset_postdata();
        ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="moreEvents">
                    <h2><a href="#">More events</a></h2>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
</div> <!-- /container-fluid eventList -->

<?php get_footer(); ?>