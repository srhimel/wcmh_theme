<!-- Footer Area Start -->
        <div id="footer">
            <!-- Footer Widgets Start -->
            <div class="footer-widgets">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- About Widget Start -->
                            <div class="about">
                                <h4 class="title">about company</h4>
                                <p><?php global $ordom; echo $ordom['comdes']; ?></p>
                                <address>
                                    <p><i class="fa fa-fw fa-map-marker"></i> <?php echo $ordom['comadd']; ?></p>
                                    <p><i class="fa fa-fw fa-phone"></i> <?php echo $ordom['commob']; ?></p>
                                    <p><i class="fa fa-fw fa-envelope"></i> <?php echo $ordom['comemail']; ?></p>
                                </address>
                            </div>
                            <!-- About Widget End -->
                        </div>
                        <div class="col-md-3">
                            <!-- Useful Links Widget Start -->
                            <div class="useful-links">
                                <?php dynamic_sidebar('footer-1'); ?>
                            </div>
                            <!-- Useful Links Widget End -->
                        </div>
                        <div class="col-md-3">
                            <!-- Recent Posts Widget Start -->
                            <div class="recent-posts">
                                 <?php dynamic_sidebar('footer-2'); ?>
                            </div>
                            <!-- Recent Posts Widget End -->
                        </div>
                        <div class="col-md-3">
                            <!-- Twitter Widget Start -->
                            <div class="twitter">
                                <div id="footerTwitter" data-user-name="themelooks"></div>
                            </div>
                            <!-- Twitter Widget End -->
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- Payment Methods Start -->
                                <div class="payment-methods">
                                    We Accpet: <img src="<?php echo $ordom['payimage']['url']; ?>" alt="">
                                </div>
                                <!-- Payment Methods Start -->
                            </div>
                            <div class="col-sm-6">
                                <!-- Social Links Start -->
                                <div class="social-links">
                                    <ul>
                                        <li><a href="<?php echo $ordom['facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="<?php echo $ordom['twiller']; ?>"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="<?php echo $ordom['google']; ?>"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="<?php echo $ordom['linkdin']; ?>"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="<?php echo $ordom['dribble']; ?>"><i class="fa fa-dribbble"></i></a></li>
                                        <li><a href="<?php echo $ordom['tumbler']; ?>"><i class="fa fa-tumblr"></i></a></li>
                                        <li><a href="<?php echo $ordom['youtube']; ?>"><i class="fa fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                                <!-- Social Links Start -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Widgets End -->
            <!-- Copyright Start -->
            <div class="copyright">
                <div class="container">
                    <p><?php echo $ordom['copyright'] ?></p>
                </div>
            </div>
            <!-- Copyright End -->
        </div>
        <!-- Footer Area End -->
        <!-- Back To Top Button Start -->
        <div class="back-to-top">
            <button><i class="fa fa-angle-up"></i></button>
        </div>
        <!-- Back To Top Button End -->
    </div>
    <!-- Wrapper End -->

    
    
    <?php wp_footer(); ?>
</body>
</html>
