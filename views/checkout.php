<!DOCTYPE html>
<html>
    <head>
        <title>Checkout</title>
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
            include '../controllers/order.php';
            $user_result = json_encode($user);
        ?>

        <div class="title-cart">
            <span>Check Out</span>
        </div>

        <?php
            echo "<form id='form-order' method='post' action='' onsubmit='order(event, $user_result)'>
                    <div class='form-input'>
                        <label>Phone</label>
                        <input type='text' name='phone' id='phone' autocomplete='off'>
                    </div>
                    <div class='form-input'>
                        <label>Address</label>
                        <input type='text' name='address' id='address' autocomplete='off'>
                    </div>
                    <div class='form-title'>Your Order</div>
                    <table class='table-viewcart'>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class='checkout-product' style='font-weight: 500;'></tbody>
                    </table>
                    <button type='submit' class='btn-order'>Order</button>
                </form>";
        ?>

        <script src="https://kit.fontawesome.com/6b31c79fde.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <script src="../script/lib.js"></script>
        <script src="../script/main.js"></script>
        <script src="../script/cart.js"></script>
        <script src="../script/orders.js"></script>
        <script type="text/javascript">
            displayCart(<?php echo $user_result; ?>);
            displayViewCheckout(<?php echo $user_result; ?>);
            totalPrice(<?php echo $user_result; ?>);
        </script>
    </body>
</html>
