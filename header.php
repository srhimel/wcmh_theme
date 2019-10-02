<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    
    <meta name="description" content="">
    <meta name="author" content="">
    <?php wp_head(); ?>
</head>
<body <?php body_class();  ?>>
    
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preloader--bounce">
            <div class="preloader-bouncer--1"></div>
            <div class="preloader-bouncer--2"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Navigation Area Start -->
        <nav id="navigation">
            <div class="contact-bar">
                <div class="container">
                    <div class="social-icons pull-left">
                        <ul class="nav nav-tabs">
                            <li><a href="<?php  global $ordom; echo $ordom['headfb']; ?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $ordom['headtw']; ?>"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo $ordom['headgo']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="<?php echo $ordom['headyo']; ?>"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                    <div class="contact-bar--text pull-left">
                        <p><a href="mailto:support@example.com"><i class="fa fm fa-envelope-o"></i><?php  echo $ordom['heademail']; ?></a></p>
                    </div>
                    <div class="contact-bar--text pull-left">
                        <p><a href="tel:+444000000000"><i class="fa fm fa-phone"></i><?php echo $ordom['headmob']; ?></a></p>
                    </div>
                    <div class="contact-bar--text text-capitalize pull-right">
                        <p><a href="login.html"><i class="fa fm fa-user"></i>login</a><span class="slash">/</span><a href="http://billing.ywhmcs.com/register.php?systpl=OrDomainCV1"><i class="fa fm fa-user-plus"></i>signup</a></p>
                    </div>
                </div>
            </div>
            <div class="navbar">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Logo Start -->
                        <span class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo $ordom['logo']['url']; ?>" alt=""></a></span>
                        
                        <!-- Logo End -->
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navbar-right reset-padding">
                        <!-- Navigation Links Start -->
                        <?php wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'menu_class' =>'nav navbar-nav',
                            'walker' => new walkermenu()
                            )); ?>
<!--
                        
                        <!-- Navigation Links End -->
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navigation Area End -->