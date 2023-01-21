<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style/home.css" media="all" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    </head>
    <body>
        <?php
            include './layout/header.php';
        ?>
        <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="https://sneakernews.com/wp-content/uploads/2021/09/adidas-shopping-guide-ultraboost-ultra-boost-og-banner.jpg" alt="First Slide">
                </div>
                <div class="item">
                    <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/adidas-muenchen-made-in-germany-by9805-mood-1-1504626730.jpg" alt="Second Slide">
                </div>
                <div class="item">
                    <img src="https://media.gq.com/photos/57ed2b4233e653ef59f1f463/16:9/w_2560%2Cc_limit/adidas-futurecraft-01.jpg" alt="Third Slide">
                </div>
                <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>

        <div id="banner">
            <div class="banner-content">
                <div class="hov-img-zoom box1">
                    <img src="./images/banner1.jpg" alt="">
                    <div class="caption-content"><a href="./product.html">NIKE</a></div>
                </div>
            </div>
            <div class="banner-content">
                <div class="hov-img-zoom box2">
                    <img src="./images/banner2.jpg" alt="">
                    <div class="caption-content"><a href="./product.html">ADIDAS</a></div>
                </div>
            </div>
            <div class="banner-content">
                <div class="hov-img-zoom box3">
                    <img src="./images/banner3.jpg" alt="">
                    <div class="caption-content"><a href="./product.html">CONVERSE</a></div>
                </div>
            </div>
        </div>

        <div id="banner-content">
            <div class="banner-child">
                <div class="content-banner-child">
                    <div class="child-content1">The Beauty</div>
                    <div class="child-content2">Nike</div>
                </div>
            </div>
        </div>
        <div id="content-blogs">
            <h3 class="heading-intro blogs">Our Blog</h3>
            <div id="banner">
                <div class="banner-content ">
                    <div class="hov-img-zoom box1">
                        <img src="./images/blog1.jpg" alt="">
                        <div class="main-text">
                            <h4>Black Friday Guide: Best Sales & Discount Codes</h4>
                            <p>
                                By Nancy Ward on July 22, 2017<br><br>
                                Duis ut velit gravida nibh bibendum commodo.
                                Sus-pendisse pellentesque mattis augue id euismod.
                                Inter-dum et malesuada fames
                            </p>
                        </div>
                    </div>
                </div>
                <div class="banner-content">
                    <div class="hov-img-zoom box2">
                        <img src="./images/blog2.jpg" alt="">
                        <div class="main-text">
                            <h4>The White Sneakers Nearly Every Fashion Girls Own</h4>
                            <p>
                                By Nancy Ward on July 18, <br><br>
                                Nullam scelerisque, lacus sed consequat laoreet,
                                dui enim iaculis leo, eu viverra ex nulla in tellus.
                                Nullam nec ornare tellus, ac fringilla lacus.
                                Ut sit ame

                            </p>
                        </div>
                    </div>
                </div>
                <div class="banner-content">
                    <div class="hov-img-zoom box3">
                        <img src="./images/blog3.jpg" alt="">
                        <div class="main-text">
                            <h4>New York SS 2018 Street Style: Annina Mislin</h4>
                            <p>
                                By Nancy Ward on July 2, 2017<br><br>
                                Proin nec vehicula lorem, a efficitur ex.
                                Nam vehicula nulla vel erat tincidunt, sed hendrerit
                                ligula porttitor. Fusce sit amet maximus nunc
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <div class="footer-box1">
                <h3 class="footer-head">Get in touch</h3><br>
                <div>
                    Any questions? Let us know in store at 8th
                    floor, 379 Hudson St, New York, NY 10018 or call
                    us on (+1) 96 716 6879
                </div>
            </div>
            <div class="footer-box2">
                <h3>Categories</h3><br>
                <div>Nike<br><br>Converse<br><br>Vans</div>
            </div>
            <div class="footer-box2">
                <h3>Links</h3><br>
                <div>Search<br><br>About us<br><br>Contact us<br><br>Returns</div>
            </div>
            <div class="footer-box2">
                <h3>Helps</h3><br>
                <div>Track Order<br><br>Returns<br><br>Shipping<br><br>FAQs</div>
            </div>
            <div class="footer-box3">
                <h3>Newsletter</h3><br>
                <form action="" method="get" name="frmsubcribe" validate>
                    <input type="email" name='email' value="" id="txtmail" placeholder="email@example.com"><br><br>
                    <input type="button" name="btnsubcribe" value="SUBCRIBE" id="btnsubcribe">
                </form>
            </div>
        </div>

        <script src="https://kit.fontawesome.com/6b31c79fde.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="../script/lib.js"></script>
        <script src="../script/main.js"></script>
        <script src="../script/cart.js"></script>
    </body>
</html>
