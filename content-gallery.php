<hr>
<h3>Gallery Post</h3>
<h2><?php the_title(); ?></h2>
<div class="thumbnail-img">
    <?php
    if ( has_post_thumbnail() ) {
        the_post_thumbnail('thumbnail');
    }
    ?>
</div>
<p><?php the_content(); ?></p>
<hr>