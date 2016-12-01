<?php get_header(); 

if(have_posts()) :
    while (have_posts()) : the_post(); ?>

        <div id="bannerImage" style="background: url('<?php header_image();?>') no-repeat scroll center center;">
            <div class="container page-title">

            <?php
            // has_children() and youandmeif_childPage() are under functions.php
            // Checks if current page has child pages
            if (has_children() OR $post->post_parent > 0) {
            ?>

                <!-- Print out parent page title -->
                <div class="row">
                    <h1 class="col-md-6 parent-page-title">
                        <a href="<?php echo get_the_permalink(youandmeif_childPage());?>"><?php echo get_the_title(youandmeif_childPage());?></a>
                    </h1>
                </div>

                <?php 
                // List all child pages
                $args = array(
                    'child_of' => youandmeif_childPage(),
                    'title_li' => ''
                );
                ?>
                
                <div class="row page-menu">  
                    <ul class="col-md-12 child-page-list">
                        <?php wp_list_pages( $args );?>
                    </ul>
                </div>
                
                <?php
                // Print out child page title
                if ($post->post_parent > 0) {
                ?>
                
                <div class="row">
                    <h2 class="col-md-12 child-page-title"><?php the_title();?></h2>
                </div>
                    
                <?php
                }

            //print out current page title if no child pages found
            } else {
            ?>
            
            <div class="row">
                <h1 class="col-md-6 parent-page-title"><?php the_title();?></h1>
            </div>
            
            <?php
            }
            ?>
            <!-- /Print out parent page title -->
            
            </div> <!-- /container -->
        </div> <!-- /bannerImage -->
        
        <article class="container page-content">
            <?php the_content();?>
        </article>

        <?php
    endwhile;
endif;
?>

<?php get_footer(); ?>