<?php
    include '../models/database.php';

    $orderDetails = json_decode(stripslashes($_POST['orderDetails']));
    global $db;

    foreach ($orderDetails as $item) {
        $price = number_format($item->price, 0, '', '.');
        $sql = "INSERT INTO order_details (orderId, productId, quantity, price) VALUES ('$item->orderId', '$item->productId', ($item->quantity), '$price')";
        $db->exec($sql);
    }

    echo json_encode(array(
        'success'   => true,
        'message'   => 'Ordered successfully'
    ));
?>
