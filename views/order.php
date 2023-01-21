<!DOCTYPE html>
<html>
    <head>
        <title>Order</title>
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
            <span>Your Order</span>
        </div>

        <table class="table-viewcart" style="width: 70%; margin: 20px auto;">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Subtotal</th>
                    <th>Address</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="order-product" style="font-weight: 500;">
                <?php
                    global $db;
                    if (sizeof($orders) > 0) {
                        foreach ($orders as $order) {
                            $sql2 = "SELECT p.name, od.quantity FROM products as p, order_details as od WHERE p.productId = od.productId AND od.orderId = '{$order['id']}'";
                            $order_detail = $db->query($sql2);

                            $s = '';

                            foreach ($order_detail as $item) {
                                $s .= $item['name']." x ".$item['quantity']." | ";

                            }

                            $status = (int) $order['status'] === 0 ? 'In Process' : 'Completed';

                            echo "<tr>
                                    <td>{$s}</td>
                                    <td>{$order['subtotal']} đ</td>
                                    <td>{$order['address']}</td>
                                    <td>{$status}</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr>
                                <td colspan='10' style='text-align: center;'>You have no order yet</td>
                            </tr>";
                    }
                ?>
            </tbody>
        </table>

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
