<?php get_header(); 
/*
    Template Name: You&Me Home Page
*/
?>

<div id="bannerImage" style="background: url('<?php header_image();?>') no-repeat scroll center center;"></div>

<article class="container-fluid introduction">
    <div class="row">
        <section class="col-md-6 fp-intro left-col outer">
            <div class="img-background" style="background: url('<?php echo wp_get_attachment_url(get_theme_mod('unme-fp-img'));?>') no-repeat scroll center center;">
                <div class="intro-text inner">
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
        <section class="col-md-6 fp-intro right-col outer">
            <div class="area left inner">
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
            <div class="area right inner">
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

</article>

<article class="container-fluid programList">
    <div class="section-card">
       <h3>Programs</h3>
    </div>
    <div class="container">
        <div class="row program kids">
            <div class="col-sm-6 title">
                <div class="box outer">
                   <div class="inner">
                       <h2><a href="<?php echo get_page_link(204);?>">YOU AND ME KIDS</a></h2>
                       <p>Helping the next generation find their voice in the community is a necessity of any neighbourhood and city. They are our next innovators and leaders, our next change makers and influencers.</p>
                       <div class="link"><a href="<?php echo get_page_link(204);?>">Learn More</a></div>
                   </div>
                   
                </div>
            </div>
            <div class="col-sm-6 list">
                <div class="box outer">
                    <div class="inner">
                        <h3>Kids Tutoring</h3>
                        <p>Allowing students to find and develop their own learning skills is extremely important for their growth, and Kids Tutoring aims to help provide that foundation.</p>
                    </div>
                    <div class="inner">
                        <h3>Kids Activities</h3>
                        <p>Through fundraising efforts, the project focuses on providing underprivileged kids with opportunities to stay active and social with kids of varying backgrounds. Kids Activities not only serves to broaden skillsets and creativity through activities of their choice, but it promotes collaboration and community.</p>
                    </div>
                </div>
            </div>
        </div> <!-- /row -->
        <div class="row program seniors">
            <div class="col-sm-6 title">
                <div class="box outer">
                   <div class="inner">
                       <h2><a href="<?php echo get_page_link(206);?>">YOU AND ME SENIORS CONNECTIONS</a></h2>
                       <p>Seniors should be afforded the independence they want and be more integrated into our localcommunities. Through workshops, volunteer days and mentoring opportunities, You and MeSeniors Connections offers real opportunities to directly impact communities and raise self-esteem by inspiring others.</p>
                        <div class="link"><a href="<?php echo get_page_link(206);?>">Learn More</a></div>
                   </div>
                  
                </div>
            </div>
            <div class="col-sm-6 list">
                <div class="box outer">
                    <div class="inner">
                        <h3>Newcomers</h3>
                        <p>By connecting seniors with newcomers to Canada, the Newcomers activity seeks to not only provide an avenue for seniors to share their experience, skills and knowledge, but help newcomers navigate the city and its services.</p>
                    </div>
                    <div class="inner">
                        <h3>Seniors Craft Workshop</h3>
                        <p>Share artistic interests and skills with others in running craft workshops.</p>
                    </div>
                    <div class="inner">
                        <h3>Volunteering Day</h3>
                        <p>promote seniors’ participation in the community, enhance community ties, developing social capital and social cohesion.</p>
                    </div>
                </div>
            </div>
        </div> <!-- /row -->
    </div> <!-- /container -->
</article>

<article class="container-fluid eventList">
    <div class="section-card">
        <h3>Connect</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 left-col outer event">
                   <div class="col-md-12 inner heading">
                       <h3>Latest Blog</h3>
                   </div>
                    <?php 
                    // pull list of event posts to front page
                    $eventPost = new WP_Query( array(
                        'cat'     => '11, 12',
                        'posts_per_page'    => 2
                    ));
                    if ( $eventPost->have_posts() ):
                        while ( $eventPost->have_posts() ): $eventPost->the_post();
                    ?>
                    <section class="col-md-12 clearfix event-post">
                        <div class="area left">
                          <div class="img-container">
                           <a href="<?php the_permalink();?>">
                            <?php 
                            if (has_post_thumbnail() ) { ?>
                              <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>">
                           <?php
                            } else {?>
                                <img src="<?php bloginfo('template_directory');?>/images/default/<?php echo esc_html( get_the_category()[0]->name );?>.png" alt="<?php the_title();?>"><?php }?>
                            </a>
                            </div>
                        </div>
                       <div class="area right">
                           <h2 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                           <p class="post-date"><?php  the_time('M. j, Y');?> | <?php echo get_the_author();?></p>
                           <p><?php the_excerpt();?></p>
                       </div>
                    </section>
                    <?php
                        endwhile;
                    else:
                        echo '<p>No Content Found</p>';
                    endif;
                    wp_reset_postdata();
                    ?>
                    <div class="col-md-12 archive-link">
                        <div class="link">
                           <a href="<?php echo get_page_link(20);?>">Blog Archives</a>
                       </div>
                    </div>
            </div> <!-- /event -->
            <div class="col-sm-6 right-col outer media">
               <div class="col-md-12 inner heading">
                   <h3>Social Media</h3>
               </div>
            </div>
        </div>
    </div>
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