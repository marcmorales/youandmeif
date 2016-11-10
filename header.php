<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="You and Me International Foundation">
    <meta name="author" content="Marc Morales">
    <title>You and Me International Foundation</title>
    <?php wp_head(); ?>
</head>

<?php
    if( is_front_page() ):
        $youandmeClass = array( 'youandmeHomeCSS');
    else:
        $youandmeClass = array( 'youandmeGeneralCSS');
    endif;
?>

<body <?php body_class( $youandmeClass ); ?>>
    <header>
        <div class="container-fluid">
           <nav>
             <div class="upperNav">
                 <div class="container">
                     text
                 </div>
             </div>
              <div class="navStrip"></div>
               <div class="lowerNav">
                   <div class="container">
                        <?php 
                           $args = array('theme_location' => 'primary');
                           wp_nav_menu( $args ); 
                        ?>
                        <div class="navMenu">Menu</div>
                    </div>
                </div>
           </nav>
        </div>
    </header>