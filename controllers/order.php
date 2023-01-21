<?php
    require '../models/database.php';
    require '../models/order.php';
    require '../models/order_detail.php';

    $order = json_decode($_POST['order']);

    $id = $_POST['id'];
    $customerId = $_POST['customerId'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];
    $subtotal = $_POST['subtotal'];
    $orderDate = $_POST['orderDate'];

    if (isset($_POST['id'])) {
        addOrder($id, $customerId, $address, $phone, $status, $subtotal, $orderDate);
    }

    if (isset($_POST['action']))
        $action = $_POST['action'];
    else if (isset($_GET['action']))
        $action = $_GET['action'];
    else
        $action = "listOrder";

    switch ($action) {
        case 'listOrder':
            if (isset($_SESSION['admin'])) {
                $user_id = $_SESSION['admin'];
                $orders = getListOrder($user_id);
            } else if (isset($_SESSION['user'])) {
                $user_id = $_SESSION['user'];
                $orders = getListOrderOfUser($user_id);
            }
            break;
        default:
            break;
    }
?>
