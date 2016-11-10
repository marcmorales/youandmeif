<footer>
  <div class="container">
       Below here is a footer
      <?php 
       $args = array('theme_location' => 'footer');
       wp_nav_menu( $args );
        ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>