<header>
    <div class="header-logo">EShoes</div>
    <div class="header-item">
        <ul>
            <li class="header-item-link">
                <a href="index.php">Home</a>
            </li>
            <li class="header-item-link">
                <a href="product.php">Products</a>
            </li>
            <li class="header-item-link">
                <a href="about.php">About us</a>
            </li>
            <li class="header-item-link">
                <a href="contact.php">Contact</a>
            </li>
        </ul>
        <ul class="header-ul">
            <li class="header-item-link" id="login-user">
                <?php
                    session_start();
                    include '../models/database.php';
                    include '../models/customer.php';

                    $user = getUser();
                    if ($user) {
                        echo '<span id="username">'. $user["fullname"] .'</span><div class="dropdown-user"><a href="logout.php"><i class="ri-logout-box-line"></i>Logout</a><a href="order.php">Order</a></div>';
                    } else {
                        echo '<a href="login.php">Login</a>';
                    }
                ?>
            </li>
            <li class="header-item-link cart">
                <i class="ri-shopping-cart-fill icon-cart"></i>
                <div class="cart-popup">
                    <div class="cart-noItem" style="display: none"> No products in the cart </div>
                    <div class="cart-wrapper"></div>
                    <div class="cart-total"></div>
                    <div class="cart-button">
                        <a href="cart.php" class="cart-button-link">View Cart</a>
                        <a href="checkout.php" class="cart-button-link">Check Out</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
