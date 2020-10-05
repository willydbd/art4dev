<?php include 'views/view-stubs/header.php';
require_once __DIR__ . '/lib/Helpers/feedback-helper.php';
require_once __DIR__ . '/lib/Helpers/gallery-helper.php'; ?>

    <section id="slider" class="sl-slider-wrapper">
        <div class="sl-slider">
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                <div class="sl-slide-inner">
                    <div class="slider-img slider1"></div>
                    <div class="slide-overlay"></div>
                    <div class="inner-text">
                        <ul>
                            <li class="animated wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="2s"><a href="">Showcase</a></li>
                            <li class="animated wow zoomIn" data-wow-delay=".6s" data-wow-duration="2s"><a
                                        href="<?= LINK_PREFIX . 'sponsors' ?>">Sponsor</a></li>
                            <li class="animated wow fadeInDown" data-wow-delay=".8s" data-wow-duration="2s"><a href="">Shop</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                <div class="sl-slide-inner">
                    <div class="slider-img slider2"></div>
                    <div class="slide-overlay"></div>
                </div>
            </div>

            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="slider-img slider3"></div>
                    <div class="slide-overlay"></div>
                    <div class="col-sl-12">
                        <div class="col-sl-2">
                            <span class="animated wow bounceInDown" data-wow-delay=".5s" data-wow-duration="2s">Call for Artist</span>
                        </div>
                        <div class="col-sl-3">
                            <span class="animated wow fadeInLeft" data-wow-delay=".8s" data-wow-duration="2s">
                            Are you a creative Artist with unique product?
                            </span>
                        </div>
                    </div>
                </div>
            </div>

             <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="slider-img slider4"></div>
                    <div class="slide-overlay"></div>
                    <div class="col-sl-12">
                        <div class="col-sl-2">
                            <span class="animated wow zoomInDown" data-wow-delay=".5s" data-wow-duration="2s">Call for Exhibitors</span>
                        </div>
                        <div class="col-sl-3">
                            <span class="animated wow zoomInDown" data-wow-delay=".8s" data-wow-duration="2s">
                             Be part of our Event
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="slider-img slider5"></div>
                    <div class="slide-overlay"></div>
                    <div class = "_5">
                        <img src="assets/images/Devlogo-2.png" alt="" class = "img-ho animated wow zoomInDown" data-wow-delay = ".1s">
                        <div class = "cum">
                            <ul>
                                <li class="animated wow fadeInRight" data-wow-delay=".3s" data-wow-duration="1s">Creativity</li>
                                <li class="animated wow fadeInRight" data-wow-delay=".5s" data-wow-duration="1s">Empowerment</li>
                                <li class="animated wow fadeInRight" data-wow-delay=".7s" data-wow-duration="1s">Livelihood</li>
                                <li class="animated wow fadeInRight" data-wow-delay=".9s" data-wow-duration="1s">Sustainability</li>
                            </ul>
                            <div class = "read animated wow fadeInUp" data-wow-delay = "1.1s">
                                <a href="<?= LINK_PREFIX .'about'?>" class = "read-btn">Find Out More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="slider-img slider6"></div>
                    <div class="slide-overlay"></div>
                    <div class = "_5">
                        <div class = "disc">
                            <span class="animated wow fadeInRight" data-wow-delay=".3s" data-wow-duration="1s">Discover</span>
                            <span class="animated wow fadeInRight" data-wow-delay=".5s" data-wow-duration="1s">A NEW</span>
                            <span class="animated wow fadeInRight" data-wow-delay=".7s" data-wow-duration="1s">world of</span>
                            <span class="animated wow fadeInRight" data-wow-delay=".9s" data-wow-duration="1s">Creatives</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /sl-slider -->

        <nav id="nav-dots" class="nav-dots">
            <span class="nav-dot-current"></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </nav>
        <!-- /slider-wrapper -->
    </section>
    <!-- Main Slider End -->

    <section id="about" class="about-sec section-wrapper description">
        <div class="container">
            <div class="row">
                <!-- Section Header -->
                <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown">
                    <h2><span class="highlight-text">About</span></h2>
                </div>
                <!-- Section Header End -->

                <div class="col-md-6 col-sm-6 col-xs-12 custom-sec-img wow fadeIn">
                    <img src="assets/images/Devlogo-2.png" alt="Custom Image" class = "abt-logo">
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 customized-text wow fadeIn black-ed">
                    <h3>Arts for Development</h3>
                    <span style="font-size:17px; line-height:35px;"><strong>The ART FOR DEVELOPMENT EXPO</strong> is a platform designed to showcase indigenous Arts and Crafts for Development by leveraging on technology, with afocus to promote local arts and craft as a viable means and source of sustainable livelihood...</span>
                    <p></p>
                    <div class="row">
                        <a href="<?= LINK_PREFIX .'about' ?>" class="btn btn-sm btn-register">Read More</a> &nbsp; &nbsp;
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery" class="bgSection gallery-section">
        <div class="container">
            <div class="row">

                <!-- Section Header -->
                <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown">
                    <h2><span class="highlight-text">Gallery</span></h2>
                </div>
                <!-- Section Header End -->
            </div>
        </div>

        <!-- Works -->
        <?php if ($L_SHOWROOM) { ?>
            <!-- Works -->
            <div class="portfolio-works wow fadeIn" data-wow-delay=".5s" data-wow-duration="2s">
                <div class="portfolio-items">
                    <?php foreach ($L_SHOWROOM as $gallery) : ?>
                        <?php $artworks = json_decode($gallery->art_work);
                        $slice_work = array_slice($artworks,0,4);
                        foreach ($slice_work as $art) : ?>
                            <div class="item portfolio-item web seo wow animated fadeIn" data-wow-delay=".7s" data-wow-duration="2s">
                                <img src="<?= LINK_PREFIX . 'artworks/exhibitors/' . $art ?>" alt="">
                                <div class="portfolio-details-wrapper">
                                    <div class="portfolio-details">
                                        <div class="portfolio-meta-btn">
                                            <ul class="work-meta">
                                                <li class="lightbox">
                                                    <a href="<?= LINK_PREFIX . 'artworks/exhibitors/' . $art ?>" class="author featured-work-img">
                                                        <?= $gallery->organization; ?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php endforeach; ?>
                        <?php endforeach; ?>
                </div>
            </div>
            <!-- Works End -->

            <!--Show more buttons-->
            <div class="row wow animated fadeInUp" data-wow-delay="1.7s" data-wow-duration="2s">
                <div class="view-more">
                    <a href="<?php= LINK_PREFIX . 'show-room'; ?>" class="btn btn-register">View More</a>
                </div>
            </div>
          <?php } else { ?>
                <div class="view-more">
                    <h4>Gallery is Empty For Now</h4>
                </div>
              <?php } ?>
    </section>
    <!-- Portfolio Section End -->

    <section class="creativity">
        <div class="_overlay"></div>
        <div class="inner-creativity">
            <h1 class="wow animated fadeInDown" data-wow-delay="1s">Let the creativity Begin!</h1>
            <div class="reg-create wow animated fadeInUp" data-wow-delay="1.1s">
                <a href="<?= LINK_PREFIX . 'registration'; ?>" class="btn btn-register"><span>Register Now</span></a>
            </div>
        </div>
    </section>
    <section id="sponsors" class="info-section">
        <div class="container text-xs-center wow animated fadeInUp" data-wow-delay="1.3s">
            <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInLeft sponsor">
                <h3>Sponsors</h3>
            </div>
            <section class="center slider_sponsor">
                <div>
                    <img src="<?php= LINK_PREFIX .'assets/images/sponsors/sponsor1.png' ?>">
                </div>
                <div>
                    <img src="<?php= LINK_PREFIX .'assets/images/sponsors/sponsor2.png' ?>">
                </div>
                <div>
                    <img src="<?php= LINK_PREFIX .'assets/images/sponsors/sponsor10.png' ?>">
                </div>
                <div>
                    <img src="<?php= LINK_PREFIX .'assets/images/sponsors/sponsor6.jpg' ?>">
                </div>
                <div>
                    <img style="margin-top: 0 !important;" src="<?php= LINK_PREFIX .'assets/images/sponsors/sponsor8.jpg' ?>" alt="">
                </div>
            </section>
        </div>
        <div class="row text-center">
            <a href="<?php= LINK_PREFIX .'sponsors' ?>" class="btn btn-view">View more</a>
        </div>
    </section>

    <section id="contact" class="bgSection teams-section bg">
        <div class="parallax-overlay"></div>
        <div class="teams-wrapper wow fadeInUpBig">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInUpBig">
                        <h2><span class="highlight-text">Contact Us</span></h2>
                        <h5 class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">We love feedback. Fill out the form below and we'll get back to you as soon as possible. </h5>
                    </div>

                    <div class="contact-details">
                        <!-- Contact Form -->
                        <div class="contact-form wow fadeIn">
                            <form action="" id="contactForm" method="post">
                                <div class="col-md-6">
                                    <input type="text" name="fullname" class="form-control" placeholder="Full Name" required/>
                                    <p class="help-block"></p>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="useremail" class="form-control" placeholder="Email" required/>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" required/>
                                </div>
                                <div class="col-md-12">
                                    <textarea name="message" rows="10" cols="100" class="form-control" placeholder="Enter your Message" id="message" maxlength="999" style="resize:none"></textarea>
                                </div>

                                <div class="col-md-8 col-md-offset-2">
                                    <input type="submit" name="submit" class="btn btn-register" value="Submit Message">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Subscription view-->
    <section class="subscribe">
        <div class="sub-overlay"></div>
        <div class="inner-subscribe">
            <h3>Subscribe to updates on #Art4Dev</h3>
            <div class="sub-form">
                <form action="#" method="post">
                    <div class="col-2">
                        <input type="email" placeholder="Enter email" required class="form-control">
                    </div>
                    <div class="col-1">
                        <input type="submit" value="subscribe" class="btn btn-sub"></div>
                </form>
            </div>

        </div>
    </section>
<
    <?php include 'views/view-stubs/footer.php'; ?>
