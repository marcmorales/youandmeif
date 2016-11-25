<?php get_header(); 
/*
    Template Name: You&Me Home Page
*/
?>

<div id="bannerImage" style="background: url('<?php header_image();?>') no-repeat scroll center center;"></div>

<article class="container-fluid introduction">
    <div class="row">
        <section class="col-md-6 fp-intro main">
            <div class="img-background" style="background: url('<?php echo wp_get_attachment_url(get_theme_mod('unme-fp-img'));?>') no-repeat scroll center center;">
                <div class="intro-text">
                    <h2>
                       <a href="<?php echo get_permalink(get_theme_mod('unme-fp-link'));?>">
                        <?php echo get_theme_mod('unme-fp-headline');?>
                        </a>
                    </h2>
                    <?php echo wpautop(get_theme_mod('unme-fp-txt'));?>
                    <div class="link"><a href="<?php echo get_permalink(get_theme_mod('unme-fp-link'));?>">Learn more</a></div>
                </div>
            </div>
            
        </section>
        <section class="col-md-6 fp-intro second">
            <div class="area left">
                <h2>
                    <a href="<?php echo get_permalink(get_theme_mod('unme-fp-link-head2'));?>">
                        <?php echo get_theme_mod('unme-fp-head2');?>
                    </a>
                </h2>
                <?php echo wpautop(get_theme_mod('unme-fp-txt-head2'));?>
                <div class="link">
                    <a href="<?php echo get_permalink(get_theme_mod('unme-fp-link-head2'));?>">Learn more</a>
                </div>
            </div>
            <div class="area right">
                <h2>
                    <a href="<?php echo get_permalink(get_theme_mod('unme-fp-link-head3'));?>">
                        <?php echo get_theme_mod('unme-fp-head3');?>
                    </a>
                </h2>
                <?php echo wpautop(get_theme_mod('unme-fp-txt-head3'));?>
                <div class="link">
                    <a href="<?php echo get_permalink(get_theme_mod('unme-fp-link-head3'));?>">Learn more</a>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 quote-area">
                <h3><?php echo get_theme_mod('unme-fp-quote');?></h3>
            </div>
        </div>
    </div>

</article> <!-- /container-fluid introduction -->

<article class="container-fluid programList">
    <div class="section-card">
       <h3>Programs</h3>
    </div>
    
    <div class="container">
        <div class="row is-table-row">
            <div class="col-md-6 area left">
               <div class="box main">
                  <h2>You and Me Kids</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt cum neque adipisci dolores, vel facilis pariatur tempore quo. Harum laboriosam beatae magnam quia facilis, commodi quaerat expedita nulla possimus temporibus!</p> 
               </div>
            </div>
            <div class="col-md-6 area right">
                <div class="row">
                    <div class="col-md-12">
                       <div class="box second">
                           <h3>Kids Tutoring</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum labore vel, nisi consequatur ut modi et perspiciatis cum asperiores impedit illum molestias, odit aut nihil vitae, cumque ratione sint. Facere!</p>
                       </div>
                    </div>
                    <div class="col-md-12">
                       <div class="box thrid">
                           <h3>Kids Activities</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum labore vel, nisi consequatur ut modi et perspiciatis cum asperiores impedit illum molestias, odit aut nihil vitae, cumque ratione sint. Facere!</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum labore vel, nisi consequatur ut modi et perspiciatis cum asperiores impedit illum molestias, odit aut nihil vitae, cumque ratione sint. Facere!</p>
                       </div>
                    </div>
                </div>
            </div>
        </div> <!-- /is-table-row -->
    </div> <!-- /container -->
    
    <div class="container">
        <div class="row is-table-row">
            <div class="col-md-6 area left">
               <div class="box main">
                  <h2>You and Me Seniors</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt cum neque adipisci dolores, vel facilis pariatur tempore quo. Harum laboriosam beatae magnam quia facilis, commodi quaerat expedita nulla possimus temporibus!</p> 
               </div>
            </div>
            <div class="col-md-6 area right">
                <div class="row">
                    <div class="col-md-12">
                       <div class="box second">

                        <h3>Newcomers</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum labore vel, nisi consequatur ut modi et perspiciatis cum asperiores impedit illum molestias, odit aut nihil vitae, cumque ratione sint. Facere!</p>

                       </div>
                    </div>
                    <div class="col-md-12">
                       <div class="box thrid">
                           <h3>Volunteering Day</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum labore vel, nisi consequatur ut modi et perspiciatis cum asperiores impedit illum molestias, odit aut nihil vitae, cumque ratione sint. Facere!</p>
                       </div>
                    </div>
                </div>
            </div>
        </div> <!-- /is-table-row -->
    </div> <!-- /container -->
    
</article>

<article class="container-fluid eventList">
    <div class="container">
        <div class="row">
        <?php 
        // pull list of event category to front page
        $eventPost = new WP_Query('cat=12&posts_per_page=2');
        if( $eventPost->have_posts() ):
        ?>
          
           <h2 class="col-md-12 section-card">Current Events</h2><?php
            while( $eventPost->have_posts() ): $eventPost->the_post();
        ?>
            <section class="col-md-6 eventPost">
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
            </section>
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
                    <h2><a href="<?php echo get_page_link(20);?>">More events</a></h2>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
</article> <!-- /container-fluid eventList -->

<article class="container-fluid get-involve">
   <div class="section-card">
       <h3>Get Involved</h3>
   </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 program">
                <h2>Volunteer</h2>
            </div>
            <div class="col-md-12 program">
                <h2>Donate</h2>
            </div>
        </div>
    </div>
</article>

<article class="container-fluid connect">
   <div class="section-card">
       <h3>Connect</h3>
   </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 program">
                <h2>Facebook</h2>
            </div>
            <div class="col-md-12 program">
                <h2>Twitter</h2>
            </div>
        </div>
    </div>
</article>

<?php get_footer(); ?>