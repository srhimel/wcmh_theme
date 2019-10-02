<?php get_header(); ?>


<div class="container" style="padding: 110px 0 50px 0">
<div class="col-md-9">
    <?php
    while(have_posts()): the_post(); ?>
    ?><h2><?php the_title(); ?></h2>
    
    <?php the_post_thumbnail(); ?>
    <p><?php the_content(); ?></p>
    <?php endwhile; ?>

</div>
   <div class="col-md-3">
  <div class="sidebar">


	   <?php dynamic_sidebar('right-sidebar'); ?>

    
  </div>
</div>
    
</div>



<?php get_footer(); ?>