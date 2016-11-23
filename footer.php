<footer>
    <div class="container">
        <div class="row">

            <div class="col-md-4 main-column">
                <ul class="row">
                    <?php dynamic_sidebar('sidebar2');?>
                </ul>           
            </div>
            
            <div class="col-md-8 secondary-column">
                <ul class="row">
                   <?php dynamic_sidebar('sidebar1');?>
                </ul>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="row lowerFooter">
                 <div class="col-md-6">
                         <p>
                           <?php 
                            bloginfo('name');?> - &copy; <?php echo date('Y');
                            $args = array('theme_location' => 'footer');
                            wp_nav_menu( $args );
                            ?>
                      </p>
                 </div>
                 <div class="col-md-6">
                     <p>Made by: <a href="#">marcmorales.ca</a></p>
                 </div>
            </div>
            
        </div>
    </div> <!-- /container -->
</footer>

<?php wp_footer(); ?>
</body>
</html>