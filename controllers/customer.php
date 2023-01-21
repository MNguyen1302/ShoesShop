<?php
    require '../models/database.php';
    require '../models/customer.php';

    if (isset($_POST['action']))
        $action = $_POST['action'];
    else if (isset($_GET['action']))
        $action = $_GET['action'];
    else
        $action = "listCustomer";

    switch ($action) {
        case 'register':
            if (!empty($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['address'])) {
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $address = $_POST['address'];

                $response = register($fullname, $email, $password, $address);
            }
            break;
        case 'login':
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $response = login($email, $password);
            }
            break;
        default:
            // code...
            break;
    }
?>
