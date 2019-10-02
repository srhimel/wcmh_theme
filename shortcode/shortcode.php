<?php


// Slider Shortcode


add_shortcode('home-slider','ordom_slider');
function ordom_slider(){
    ob_start();
    ?>
        
        <div style="background: url('<?php global $ordom; echo $ordom['sliderback']['url']; ?>'); background-size: cover; " id="service" class="service-primary">
            <div class="vc-parent">
                <div class="vc-child">
                    <div class="service-slider">
                       <?php $slider = $ordom['slider'];
                                foreach($slider as $sliders){
                                    
                                ?>
                        <div class="item">
                            <div class="container">
                               
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="image">
                                            <img src="<?php echo $sliders['image'];?>" alt="">
                                        </div>
                                        <div class="price-tag bg-green">
                                            <p>starting at<span>$10<em>/mo</em></span></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Service Item Content Start -->
                                        <div class="content">
                                            <h2 class="text-green"><span class="text-white"><?php echo $sliders['title']; ?></span>hosting</h2>
                                            <p><?php echo $sliders['description']; ?></p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-check text-green"></i>&nbsp; Lorem ipsum dolor sit amet.</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-check text-green"></i>&nbsp; Lorem ipsum dolor sit amet.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-check text-green"></i>&nbsp; Lorem ipsum dolor sit amet.</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><i class="fa fa-check text-green"></i>&nbsp; Lorem ipsum dolor sit amet.</p>
                                                </div>
                                            </div>
                                            <div class="content--footer">
                                                <a href="<?php echo $sliders['url'] ?>" class="btn btn-lg btn-custom btn-green"><?php echo $sliders['btext'] ?></a>
                                            </div>
                                        </div>
                                        <!-- Service Item Content End -->
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <?php
                                }
                                ?>
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        
    <?php
    return ob_get_clean();
    
   
}

 //Service Shortcode
    
add_shortcode('service','service_shortcode_function');
    
    function service_shortcode_function($attr,$content){
        $attributes = extract(shortcode_atts(array(
            'title' => 'our services',
            'subtitle' => 'why choose us'
        ),$attr));
        ob_start();
        ?>
        <div id="feature">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2><span><?php echo $subtitle; ?></span><?php echo $title; ?></h2>
                </div>
                <!-- Section Title End -->
                <div class="row AdjustRow">
                    <!-- Feature Item Start -->
                    <?php 
                        $services = new WP_Query(array(
                            'post_type' => 'services'
                        ));
                        while($services->have_posts()): $services->the_post();
                    ?>
                    <div class="col-md-3 col-sm-6 feature-item">
                        <div class="icon">
                            <i class="<?php echo get_post_meta(get_the_id(),'serviceicon',true); ?>"></i>
                        </div>
                        <div class="content">
                            <h3 class="heading"><?php the_title(); ?></h3>
                            <p class="desc"><?php the_content(); ?></p>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    
                    <!-- Feature Item End -->
                    
                </div>
            </div>
        </div>
        
        <?php
        return ob_get_clean();
        
    }

//Banner area shortcode
add_shortcode('banner','banner_function');
function banner_function($attr,$content= 'FREE WITH EVERY DOMAIN NAME!'){
    $attributes = extract(shortcode_atts(array(
            'title' => 'domain name?',
            'subtitle' => 'looking a premium quality'
        ),$attr));
    ob_start();
    ?>
        <div id="banner" class="banner-primary">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2><span><?php echo $subtitle; ?></span><?php echo $title; ?></h2>
                </div>
                <!-- Section Title End -->
                <!-- Banner Content Start -->
                <div class="banner-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="domain--search" data-form-validation="true">
                                <form action="http://billing.ywhmcs.com/domainchecker.php?systpl=OrDomainCV1" method="post" id="domainSearchForm" class="clearfix">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="domain" class="form-control" placeholder="eg. example" required>
                                            <span class="input-group-addon">
                                                <input type="submit" value="Search" class="form-control">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row extensions">
                                        <div class="col-sm-2 col-xs-6">
                                            <input type="radio" name="ext" value=".com" id="extCom" checked>
                                            <label for="extCom">.com</label>
                                        </div>
                                        <div class="col-sm-2 col-xs-6">
                                            <input type="radio" name="ext" value=".net" id="extNet">
                                            <label for="extNet">.net</label>
                                        </div>
                                        <div class="col-sm-2 col-xs-6">
                                            <input type="radio" name="ext" value=".org" id="extOrg">
                                            <label for="extOrg">.org</label>
                                        </div>
                                        <div class="col-sm-2 col-xs-6">
                                            <input type="radio" name="ext" value=".info" id="extInfo">
                                            <label for="extInfo">.info</label>
                                        </div>
                                        <div class="col-sm-2 col-xs-6">
                                            <input type="radio" name="ext" value=".biz" id="extBiz">
                                            <label for="extBiz">.biz</label>
                                        </div>
                                        <div class="col-sm-2 col-xs-6">
                                            <input type="radio" name="ext" value=".us" id="extUs">
                                            <label for="extUs">.us</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="extension-slider-holder">
                                <div class="extension-slider owl-carousel text-center text-white" data-items="5">
                                    <div class="item">
                                        <p class="ext--name">.com</p>
                                        <p class="ext--price">$3.99<span>/yr</span></p>
                                    </div>
                                    <div class="item">
                                        <p class="ext--name">.org</p>
                                        <p class="ext--price">$3.99<span>/yr</span></p>
                                    </div>
                                    <div class="item">
                                        <p class="ext--name">.net</p>
                                        <p class="ext--price">$3.99<span>/yr</span></p>
                                    </div>
                                    <div class="item">
                                        <p class="ext--name">.info</p>
                                        <p class="ext--price">$3.99<span>/yr</span></p>
                                    </div>
                                    <div class="item">
                                        <p class="ext--name">.biz</p>
                                        <p class="ext--price">$3.99<span>/yr</span></p>
                                    </div>
                                    <div class="item">
                                        <p class="ext--name">.io</p>
                                        <p class="ext--price">$3.99<span>/yr</span></p>
                                    </div>
                                    <div class="item">
                                        <p class="ext--name">.me</p>
                                        <p class="ext--price">$3.99<span>/yr</span></p>
                                    </div>
                                    <div class="item">
                                        <p class="ext--name">.bd</p>
                                        <p class="ext--price">$3.99<span>/yr</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="domain--addons">
                                <h2><?php echo $content; ?></h2>
                                
                                <ul>
                                   <?php 
                                        $domaindetails = new WP_Query(array(
                                            'post_type' => 'domaindetails'
                                        ));
                                        while($domaindetails->have_posts()): $domaindetails->the_post();
                                    ?>
                                    <li>
                                        <i class="<?php echo get_post_meta(get_the_id(),'domainicon',true); ?>"></i>
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php the_content(); ?></p>
                                    </li>
                                    <?php endwhile; ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Banner Content End -->
            </div>
        </div>
        
    <?php
    return ob_get_clean();
    
}

add_shortcode('pricing','pricing_shortcode');
function pricing_shortcode($attr,$content){
    $attributes = extract(shortcode_atts(array('title' => 'our popular','subtitle'=>'pricing'),$attr));
    ob_start();
    ?>
        <div id="pricing">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2><span>our popular</span>pricing</h2>
                </div>
                <!-- Section Title End -->
                <div class="pricing-tab-filter">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tabA" class="btn-custom-reverse" aria-controls="tabA" role="tab" data-toggle="tab">Shared Hosting</a></li>
                        <li role="presentation"><a href="#tabB" class="btn-custom-reverse" aria-controls="tabB" role="tab" data-toggle="tab">RESELLER Hosting</a></li>
                        <li role="presentation"><a href="#tabC" class="btn-custom-reverse" aria-controls="tabC" role="tab" data-toggle="tab">VPS Hosting</a></li>
                        <li role="presentation"><a href="#tabD" class="btn-custom-reverse" aria-controls="tabD" role="tab" data-toggle="tab">Dedicated Hosting</a></li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="tabA">
                        <div class="row">
                            <!-- Pricing Table Start -->
                            <div class="pricing-table">
                                <!-- Pricing Item Start -->
                                <?php
                                $pricing = new WP_Query(array(
                                    'post_type' => 'pricing'
                                ));
                                while($pricing->have_posts()): $pricing->the_post();
                                    $check = get_post_meta(get_the_id(),'featured',true);
                                    $check2 = get_post_meta(get_the_id(),'tag',true);
                                    
                                
                                    ?>
                                <div class="col-md-4 pricing-item <?php if($check==yes){ echo "active"; } ?>">
                                    <div class="pricing-item-content">
                                      <?php if($check2==1){
                                        ?>
                                            <div class="ribbon ribbon-small text-white">
                                            <div class="ribbon-content bg-green text-uppercase">Popular</div>
                                        </div>
                                            <?php ;
                                    } ?>
                                       
                                        
                                        <div class="head">
                                            <h3 class="title"><?php the_title(); ?></h3>
                                            <p class="desc"> <?php
                                            echo get_post_meta(get_the_id(),'shortdes',true);    ?></p>
                                            <div class="price"><div>Start at</div><div><span>$ <?php
                                            echo get_post_meta(get_the_id(),'price',true);    ?></span>/m</div></div>
                                        </div>
                                        <div class="body">
                                            <div class="features">
                                                <?php the_content(); ?>
                                            </div>
                                            <div class="buy-now">
                                                <a href=" <?php
                                            echo get_post_meta(get_the_id(),'btnurl',true);    ?>" class="btn btn-lg btn-custom">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pricing Item End -->
                                <?php endwhile; ?>
                            </div>
                            <!-- Pricing Table End -->
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabB">
                        <div class="row">
                            <!-- Pricing Table Start -->
                            <div class="pricing-table">
                                <!-- Pricing Item Start -->
                                <?php
                                $pricing = new WP_Query(array(
                                    'post_type' => 'pricing'
                                ));
                                while($pricing->have_posts()): $pricing->the_post();
                                    $check = get_post_meta(get_the_id(),'featured',true);
                                    $check2 = get_post_meta(get_the_id(),'tag',true);
                                    
                                
                                    ?>
                                <div class="col-md-4 pricing-item <?php if($check==yes){ echo "active"; } ?>">
                                    <div class="pricing-item-content">
                                      <?php if($check2==1){
                                        ?>
                                            <div class="ribbon ribbon-small text-white">
                                            <div class="ribbon-content bg-green text-uppercase">Popular</div>
                                        </div>
                                            <?php ;
                                    } ?>
                                       
                                        
                                        <div class="head">
                                            <h3 class="title"><?php the_title(); ?></h3>
                                            <p class="desc"> <?php
                                            echo get_post_meta(get_the_id(),'shortdes',true);    ?></p>
                                            <div class="price"><div>Start at</div><div><span>$ <?php
                                            echo get_post_meta(get_the_id(),'price',true);    ?></span>/m</div></div>
                                        </div>
                                        <div class="body">
                                            <div class="features">
                                                <?php the_content(); ?>
                                            </div>
                                            <div class="buy-now">
                                                <a href=" <?php
                                            echo get_post_meta(get_the_id(),'btnurl',true);    ?>" class="btn btn-lg btn-custom">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pricing Item End -->
                                <?php endwhile; ?>
                            </div>
                            <!-- Pricing Table End -->
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabC">
                        <div class="row">
                            <!-- Pricing Table Start -->
                            <div class="pricing-table">
                                <!-- Pricing Item Start -->
                                <?php
                                $pricing = new WP_Query(array(
                                    'post_type' => 'pricing'
                                ));
                                while($pricing->have_posts()): $pricing->the_post();
                                    $check = get_post_meta(get_the_id(),'featured',true);
                                    $check2 = get_post_meta(get_the_id(),'tag',true);
                                    
                                
                                    ?>
                                <div class="col-md-4 pricing-item <?php if($check==yes){ echo "active"; } ?>">
                                    <div class="pricing-item-content">
                                      <?php if($check2==1){
                                        ?>
                                            <div class="ribbon ribbon-small text-white">
                                            <div class="ribbon-content bg-green text-uppercase">Popular</div>
                                        </div>
                                            <?php ;
                                    } ?>
                                       
                                        
                                        <div class="head">
                                            <h3 class="title"><?php the_title(); ?></h3>
                                            <p class="desc"> <?php
                                            echo get_post_meta(get_the_id(),'shortdes',true);    ?></p>
                                            <div class="price"><div>Start at</div><div><span>$ <?php
                                            echo get_post_meta(get_the_id(),'price',true);    ?></span>/m</div></div>
                                        </div>
                                        <div class="body">
                                            <div class="features">
                                                <?php the_content(); ?>
                                            </div>
                                            <div class="buy-now">
                                                <a href=" <?php
                                            echo get_post_meta(get_the_id(),'btnurl',true);    ?>" class="btn btn-lg btn-custom">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pricing Item End -->
                                <?php endwhile; ?>
                            </div>
                            <!-- Pricing Table End -->
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabD">
                        <div class="row">
                            <!-- Pricing Table Start -->
                            <div class="pricing-table">
                                <!-- Pricing Item Start -->
                                <?php
                                $pricing = new WP_Query(array(
                                    'post_type' => 'pricing'
                                ));
                                while($pricing->have_posts()): $pricing->the_post();
                                    $check = get_post_meta(get_the_id(),'featured',true);
                                    $check2 = get_post_meta(get_the_id(),'tag',true);
                                    
                                
                                    ?>
                                <div class="col-md-4 pricing-item <?php if($check==yes){ echo "active"; } ?>">
                                    <div class="pricing-item-content">
                                      <?php if($check2==1){
                                        ?>
                                            <div class="ribbon ribbon-small text-white">
                                            <div class="ribbon-content bg-green text-uppercase">Popular</div>
                                        </div>
                                            <?php ;
                                    } ?>
                                       
                                        
                                        <div class="head">
                                            <h3 class="title"><?php the_title(); ?></h3>
                                            <p class="desc"> <?php
                                            echo get_post_meta(get_the_id(),'shortdes',true);    ?></p>
                                            <div class="price"><div>Start at</div><div><span>$ <?php
                                            echo get_post_meta(get_the_id(),'price',true);    ?></span>/m</div></div>
                                        </div>
                                        <div class="body">
                                            <div class="features">
                                                <?php the_content(); ?>
                                            </div>
                                            <div class="buy-now">
                                                <a href=" <?php
                                            echo get_post_meta(get_the_id(),'btnurl',true);    ?>" class="btn btn-lg btn-custom">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pricing Item End -->
                                <?php endwhile; ?>
                            </div>
                            <!-- Pricing Table End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    <?php
    return ob_get_clean();
    
    
}

// COMPANY STATISTICS

add_shortcode('counter','counter_shortcode');
function counter_shortcode($attr,$subtitle){
    $attributes = extract(shortcode_atts(array('title' => 'STATISTICS','subtitle' => 'COMPANY'),$attr));
    ob_start();
    ?>
    <div id="counter" data-bg-img="img/background-img/counter-bg.png">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2><span><?php echo $subtitle; ?></span><?php echo $title; ?></h2>
                </div>
                <!-- Section Title End -->
                <div class="row">
                   <?php 
                        $counter = new WP_Query(array(
                            'post_type' => 'counter'
                        ));
                        while($counter->have_posts()): $counter->the_post();
                        1?>
                    <div class="col-sm-3 col-xs-6">
                        <!-- Counter Item Start -->
                        
                        <div class="counter-holder">
                            <div class="counter-number-holder">
                                <i class="<?php echo get_post_meta(get_the_id(),'countericon',true); ?>"></i>
                                <span class="counter-number"><?php the_title(); ?></span>
                            </div>
                            <p class="counter-text"><?php the_content(); ?></p>
                        </div>
                        
                        <!-- Counter Item End -->
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    
    <?php
    return ob_get_clean();
}

// Testimonials

add_shortcode('testimonial','testimonial_shortcode');
function testimonial_shortcode($attr,$content){
    $attributes = extract(shortcode_atts(array('title' => '','subtitle' => ''),$attr));
    ob_start();
    
    ?>
    <div id="feedback">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2><span><?php echo $subtitle; ?></span><?php echo $title; ?></h2>
                </div>
                <!-- Section Title End -->
            </div>
            <div class="clients-holder">
                <div class="clients-slider owl-carousel">
                   <?php  
                        $testimonial = new WP_Query(array(
                            'post_type' => 'testimonial'
                        ));
                        while($testimonial->have_posts()): $testimonial->the_post();
                    ?>
                    <!-- Client Item Start -->
                    <div class="item" data-id="<?php echo get_the_id(); ?>">
                        <img src="<?php the_post_thumbnail('thumbnail'); ?>" alt="" class="img-responsive">
                    </div>
                    <?php endwhile; ?>
                    
                </div>
            </div>
            <div class="feedback-slider owl-carousel">
               
                <!-- Feedback Item Start -->
                <?php  
                        $testimonialnew = new WP_Query(array(
                            'post_type' => 'testimonial'
                        ));
                        while($testimonialnew->have_posts()): $testimonialnew->the_post();
                    ?>
                <div class="feedback-item">
                   
                    <div class="feedback-comment link-color--child">
                        <p><?php the_content(); ?></p>
                    </div>
                    <div class="feedback-info">
                        <span class="feedback-name"><?php the_title(); ?>,</span>
                        <span class="feedback-role"><?php echo get_post_meta(get_the_id(),'designation',true) ;?></span>
                    </div>
                    
                </div>
                <?php endwhile; ?>
                <!-- Feedback Item End -->
                
                
            </div>
        </div>
    
    
    <?php
    return ob_get_clean();
}


//Newslatter Shortcode

add_shortcode('newslatter','newslatter_shortcode');
function newslatter_shortcode($attr, $content){
    ob_start();
    ?>
    <div id="subscribe" data-bg-img="img/subscribe-bg/subscribe-bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h2><?php echo $content; ?></h2>
                        <!-- Subscribe Form Start -->
                        <div data-form-validation="true">
                            <form action="http://themelooks.us12.list-manage.com/subscribe/post?u=50e1e21235cbd751ab4c1ebaa&amp;id=ac81d988e4" method="post" name="mc-embedded-subscribe-form" target="_blank" id="subscribeForm" novalidate="novalidate">
                                <input type="text" value="" name="EMAIL" placeholder="Enter your email address" class="input-box" required>
                                <input type="submit" value="Subscribe" class="submit-button btn-green">
                            </form>
                        </div>
                        <!-- Subscribe Form End -->
                    </div>
                </div>
            </div>
        </div>
    <?php
    return ob_get_clean();
}
//Posts Shortcode

add_shortcode('blog','blog_shortcode');
function blog_shortcode($attr, $content){
    $attributes = extract(shortcode_atts(array('title' => 'RECENT BLOG POST','subtitle' => 'LATEST POST'),$attr));
    ob_start();
    ?>
    <div id="blog">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2><span><?php echo $subtitle ;?></span><?php echo $title; ?></h2>
                </div>
                <!-- Section Title End -->
                <div class="row res-col">
                   <?php 
                    $posts = new WP_Query(array(
                        'post_type' => 'post'
                    ));
                    while($posts->have_posts()): $posts->the_post();
                    ?>
                    <div class="col-md-4">
                        <!-- Post Item Start -->
                        <div class="post-item">
                            <!-- Post Image Start -->
                            <div class="post-image">
                                <a href="#"><img src="<?php the_post_thumbnail('small'); ?>"></a>
                            </div>
                            <!-- Post Image End -->
                            <!-- Post Content Start -->
                            <div class="post-content">
                                <h2 class="title"><a href="#"><?php the_title(); ?></a></h2>
                                <p class="meta">By <a href="<?php the_author(); ?>"><?php the_author(); ?></a> in <?php the_category(); ?> at <?php the_time('d F Y'); ?></p>
                                <div class="summery">
                                    <p><?php echo wp_trim_words(get_the_content(), 30, '');?></p>
                                </div>
                                <div class="footer clearfix">
                                    <a href="<?php the_permalink(); ?>"><i class="fa fa-angle-double-right"></i> Read More</a>
                                    <a href="#" class="pull-right"><i class="fa fa-comments-o"></i> 2 Comments</a>
                                </div>
                            </div>
                            <!-- Post Content End -->
                        </div>
                        <!-- Post Item End -->
                    </div>
                    <?php endwhile; ?>
                </div>
                
            </div>
        </div>
    <?php
    return ob_get_clean();
}















