<?php
    function getListOrderOfUser($user_id)
    {
        session_start();
        global $db;

        $sql = "SELECT * FROM orders WHERE customerId = '$user_id'";
        $orders = $db->query($sql);
        return $orders->fetchAll();
    }

    function getListOrder($admin_id)
    {
        session_start();
        global $db;

        $sql = "SELECT * FROM orders";
        $orders = $db->query($sql);

        return $orders->fetchAll();
    }

    function getOrder($orderId)
    {
        global $db;

        $sql = "SELECT * FROM orders WHERE id = '$orderId'";
        $orders = $db->query($sql);

        return $orders->fetch();
    }

    function addOrder($id, $customerId, $address, $phone, $status, $subtotal, $orderDate)
    {
        global $db;
        $subtotal = number_format($subtotal, 0, '', '.');

        $sql = "INSERT INTO orders (id, customerId, address, phone, status, subtotal, orderDate) VALUES ('$id', '$customerId', '$address', '$phone', '0', ($subtotal), '$orderDate')";
        $db->exec($sql);

        echo json_encode(array(
            'success'   => true,
            'message'   => 'Ordered successfully'
        ));
    }
?>
