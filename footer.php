<footer>
  <div class="container">
       Below here is a footer
      <?php 
       $args = array('theme_location' => 'footer');
       wp_nav_menu( $args );
        ?>
        <p><?php bloginfo('name');?> - &copy; <?php echo date('Y');?></p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>