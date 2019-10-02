<div class="contentBox">
    	<div class="innerBox">


           <?php while(have_posts()) : the_post(); ?>

                <div class="contentTitle">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                    
                </div>
                <div class="contentText">



					<?php if( is_single() ) : ?>
	                   
	                   	<?php the_content(); ?>

	                <?php else : ?>

	               	 <?php 
	                    $readmore = '<p><a href="'.get_permalink().'">read more</a></p>';

	                    echo wp_trim_words( get_the_content(), 3, $readmore ); ?>

					<?php endif; ?>




                </div>

            <?php endwhile; ?>
        </div>
    </div>