<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="You and Me International Foundation">
    <meta name="author" content="Marc Morales">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<?php
// Generate appropriate CSS for FrontPage or General Page
if( is_front_page() ):
    $youandmeClass = array( 'youandmeHomeCSS');
else:
    $youandmeClass = array( 'youandmeGeneralCSS');
endif;
?>

<body <?php body_class( $youandmeClass ); ?>>
    
   <!--  Main navigation -->
    <header class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
           <nav>
            <!-- Holds quick links for Social Media and the Search bar -->
             <div class="upperNav">
                 <div class="container">
                   <?php get_search_form();?>
                   
                   <div class="header-widget">
                       <?php dynamic_sidebar('link1');?>
                   </div>
                   
                   
                    
                 </div>
             </div>
             
            <!-- Main navbar backdrop color -->
            <div class="navStrip"></div>
              
              <!-- Navbar list items -->
               <div class="lowerNav">
                   <div class="container">
                      
                       <div class="logo-placeholder">
                               <?php the_custom_logo(); ?>
                           </div>  
                        <?php 
                       // Generate menu from WordPress dashboard
                        $args = array('theme_location' => 'primary');
                        wp_nav_menu( $args ); 
                        ?>
                        
                        
                        <!-- Menu toggle button for smartphone viewport -->
                        <div class="navMenu">
                         
                          <?php 
                            if ( has_custom_logo() ) { ?>
                               
                                <img src="<?php
                                     $custom_logo_id = get_theme_mod( 'custom_logo' );
                                     $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                                     
                                     echo $image[0];?>">
                             <?php
                            } else {
                                echo 'Menu';
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
           </nav>
        </div>
    </header>