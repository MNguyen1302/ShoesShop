<?php
    function getOrderDetail($orderId)
    {
        global $db;

        $sql = "SELECT * FROM order_details WHERE orderId = '$orderId'";
        $result = $db->exec($sql);
        return $result;
    }
?>
