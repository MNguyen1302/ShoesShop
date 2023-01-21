<!DOCTYPE html>
<html>
    <head>
        <title>Cart</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../style/lib.css" media="all" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    </head>
    </head>
    <body>
        <?php
            include './layout/header.php';
            $user_result = json_encode($user);
        ?>

        <div class="title-cart">
            <span>View Cart</span>
        </div>

        <div class="viewcart-container">
            <div class="viewcart-wrapper">
                <div class="viewcart-center" style="overflow-x: auto;">
                    <table class="table-viewcart">
                        <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody class="viewcart-product"></tbody>
                    </table>
                    <div class="viewcart-box">
                        <div class="viecart-box-btn">
                            <?php echo "<button class='button-update' onclick='updateCart($user_result)' disabled>Update Your Cart</button>" ?>
                            <a href="./checkout.php" class="button-checkout">Checkout</a>
                        </div>
                        <div class="viewcart-price">Total: </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://kit.fontawesome.com/6b31c79fde.js" crossorigin="anonymous"></script>
        <script src="../script/lib.js"></script>
        <script src="../script/main.js"></script>
        <script src="../script/cart.js"></script>
        <script type="text/javascript">
            displayViewCart(<?php echo $user_result; ?>);
            displayCart(<?php echo $user_result; ?>);
            removeFromViewCart(<?php echo $user_result; ?>);
            totalPrice(<?php echo $user_result; ?>);
        </script>
    </body>
</html>
