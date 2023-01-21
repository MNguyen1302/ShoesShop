<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <?php
            include './layout/header.php';
        ?>

        <div class="nav__overlay" id="nav-overlay"></div>
        <div class="main-menu-tablet">
            <div class="top__menu-tablet">
                <div><a href="index.html"><img src="./asset/img/logo/logoShop.webp" alt="Logo Shop"></a></div>
                <div id="btn-close-nav"><i class="ti-close icon pointer"></i></div>
            </div>
            <div><i class="ti-home"></i><a href="./index.html">Home</a></div>
            <div><i class="ti-bag"></i><a href="./product.html">Shop</a></div>
            <div><i class="ti-info-alt"></i><a href="./about.html">About</a></div>
            <div><i class="ti-email"></i><a href="./contact.html">Contact</a></div>

        </div>
        <!-- begin banner -->
        <div id="banner"><a href="./contact.html" style="color: #fff;">CONTACT</a></div>
        <!-- end banner -->
        <div class="container">
            <div style="text-align:center">
                <h2>Send us your message</h2>
            </div>
            <div class="row">
                <div class="column">
                    <p style="text-align: center;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.669726937899!2d106.68006961474885!3d10.759917092332737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1b7c3ed289%3A0xa06651894598e488!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBTw6BpIEfDsm4!5e0!3m2!1svi!2s!4v1637656820945!5m2!1svi!2s"
                            width="503" height="457" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </p>
                </div>
                <div class="column">
                    <form action="">
                        <input type="text" id="fname" placeholder="Full name..">
                        <input type="text" id="phone" placeholder="Phone number..">
                        <input type="text" id="email" placeholder="Email Address..">
                        <textarea id="message" placeholder="Message.." style="height:170px"></textarea>
                        <input type="submit" value="Send">
                    </form>
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
    </div>

    <script src="./script/main.js"></script>
    <script src="./script/cart.js"></script>
</body>

</html>
