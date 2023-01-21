<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About</title>
    <link rel="stylesheet" href="../style/about.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <?php
            include './layout/header.php';
            include '../controllers/order.php';
        ?>

        <div class="nav__overlay" id="nav-overlay"></div>
        <div class="main-menu-tablet">
            <div class="top__menu-tablet">
                <div>
                    <a href="index.php"><img src="./asset/img/logo/logoShop.webp" alt="Logo Shop" /></a>
                </div>
                <div id="btn-close-nav"><i class="ti-close icon pointer"></i></div>
            </div>
            <div><i class="ti-home"></i><a href="./index.html">Home</a></div>
            <div><i class="ti-bag"></i><a href="./product.html">Shop</a></div>
            <div><i class="ti-info-alt"></i><a href="./about.html">About</a></div>
            <div><i class="ti-email"></i><a href="./contact.html">Contact</a></div>
        </div>

        <!-- begin banner -->
        <div id="banner"><a href="./about.html" style="color: #fff;">ABOUT</a></div>
        <!-- end banner -->
        <section class="bgwhite p-t-66 p-b-38">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 p-b-30">
                        <div class="hov-img-zoom">
                            <img src="./images/banner6.jpg" alt="img-about" />
                        </div>
                    </div>
                    <div class="col-md-8 p-b-30">
                        <h3 class="m-text26 p-t-15 p-b-16">Our story</h3>
                        <p class="p-b-28">
                            Phasellus egestas nisi nisi, lobortis ultricies risus semper
                            nec. Vestibulum pharetra ac ante ut pellentesque. Curabitur
                            fringilla dolor quis lorem accumsan, vitae molestie urna
                            dapibus. Pellentesque porta est ac neque bibendum viverra.
                            Vivamus lobortis magna ut interdum laoreet. Donec gravida lorem
                            elit, quis condimentum ex semper sit amet. Fusce eget ligula
                            magna. Aliquam aliquam imperdiet sodales. Ut fringilla turpis in
                            vehicula vehicula. Pellentesque congue ac orci ut gravida.
                            Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu
                            sodales lectus sagittis. Etiam pellentesque, magna vel dictum
                            rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut
                            sem. Sed rutrum, turpis ut commodo efficitur, quam velit
                            convallis ipsum, et maximus enim ligula ac ligula. Vivamus
                            tristique vulputate ultricies. Sed vitae ultrices orci.
                        </p>
                        <div class="bo13 p-l-29 m-l-9 p-b-10">
                            <p class="p-b-11">
                                Creativity is just connecting things. When you ask creative
                                people how they did something, they feel a little guilty
                                because they didn't really do it, they just saw something. It
                                seemed obvious to them after a while.
                            </p>
                            <span class="s-text7">- Steve Job’s</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div id="footer">
            <div class="footer-box1">
                <h3 class="footer-head">Get in touch</h3>
                <br />
                <div>
                    Any questions? Let us know in store at 8th floor, 379 Hudson St, New
                    York, NY 10018 or call us on (+1) 96 716 6879
                </div>
            </div>
            <div class="footer-box2">
                <h3>Categories</h3>
                <br />
                <div>Nike<br /><br />Converse<br /><br />Vans</div>
            </div>
            <div class="footer-box2">
                <h3>Links</h3>
                <br />
                <div>
                    Search<br /><br />About us<br /><br />Contact us<br /><br />Returns
                </div>
            </div>
            <div class="footer-box2">
                <h3>Helps</h3>
                <br />
                <div>
                    Track Order<br /><br />Returns<br /><br />Shipping<br /><br />FAQs
                </div>
            </div>
            <div class="footer-box3">
                <h3>Newsletter</h3>
                <br />
                <form action="" method="get" name="frmsubcribe" validate>
                    <input type="email" name="email" value="" id="txtmail"
                        placeholder="email@example.com" /><br /><br />
                    <input type="button" name="btnsubcribe" value="SUBCRIBE" id="btnsubcribe" />
                </form>
            </div>
        </div>
    </div>

    <script src="./script/main.js"></script>
    <script src="./script/cart.js"></script>
</body>

</html>
