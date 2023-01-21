<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Orders</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style/admin.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../style/lib.css" media="all">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    </head>
    <body>
        <?php
            include './layout/sidebar.php';
            include '../controllers/order.php';
        ?>

        <div class="admin-container">
            <div class="mypost-container">
                <div class="mypost-wrapper">
                    <div class="mypost-center" style="overflow-x: auto;">
                        <div class="mypost-title-box">
                            <div class="mypost-title">Orders</div>
                        </div>
                        <table class="table-mypost">
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Customer Id</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody class="ordered-table">
                                <?php
                                    foreach ($orders as $order) {
                                        $status = (int) $order['status'] === 0 ? 'In Process' : 'Completed';
                                        echo "<tr>
                                                <td>{$order['orderDate']}</td>
                                                <td>{$order['customerId']}</td>
                                                <td>{$order['subtotal']} ₫</td>
                                                <td>{$status}</td>
                                                <td class='btn-view' onclick='displayOrderDetail({$order['id']})'>Detail</td>
                                            </tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                        <div class="order-pagination-wrapper"></div>
                    </div>
                </div>
            </div>

            <div class="admin-popup"></div>
        </div>

        <script src="https://kit.fontawesome.com/6b31c79fde.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="../script/orders.js" charset="utf-8"></script>
        <script type="text/javascript">
            <?php
                if (isset($_GET['orderId'])) {
                    $orderId = $_GET['orderId'];

                    global $db;

                    $sql1 = "SELECT * FROM orders WHERE id = '$orderId'";
                    $list = $db->query($sql1);

                    $sql2 = "SELECT p.name, p.price, p.image, od.quantity FROM products as p, order_details as od WHERE p.productId = od.productId AND od.orderId = '$orderId'";
                    $order_detail = $db->query($sql2);
                }
            ?>
            let orderId = new URL(location.href).searchParams.get("orderId");
            if (orderId) {
                showOrderedDetail(<?php echo json_encode($list->fetch()); ?>, <?php echo json_encode($order_detail->fetchAll()); ?>);
            }
        </script>
    </body>
</html>
