<section class="col-sm-6 col-md-4 clearfix youandmeBlog">
    <div class="thumbnail-img">
           <?php 
           if ( has_post_thumbnail() ) { ?>
               <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>"><?php 
           } else { ?>
               <img src="<?php bloginfo('template_directory');?>/images/default-banner.png" alt="<?php the_title();?>"><?php 
           }
            ?>
    </div>
    <h2><?php the_title(); ?></h2>
    <div class="blogSummary">
        <p>
            <?php echo get_the_excerpt();?>
            <a href="#">Read more&raquo;</a>
        </p>

        <small>
            Posted: <?php the_date() ?> at <?php the_time("g:i a (T)") ?>
        </small>
        <small>
           <?php the_category() ?>
        </small>
    </div>
</section>