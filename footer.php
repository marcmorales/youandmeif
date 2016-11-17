<footer>
    <div class="container">
       <div class="main-column">
                  
        Below here is a footer

        <?php 
        $args = array('theme_location' => 'footer');
        wp_nav_menu( $args );
        ?>

        <p><?php bloginfo('name');?> - &copy; <?php echo date('Y');?></p>
       </div>
       <div class="secondary-column">
           
           <?php dynamic_sidebar('sidebar1');?>
           
       </div>

    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>