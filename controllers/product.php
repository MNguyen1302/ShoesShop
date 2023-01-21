<?php
    require '../models/database.php';
    require '../models/product.php';

    if (isset($_POST['action']))
        $action = $_POST['action'];
    else if (isset($_GET['action']))
        $action = $_GET['action'];
    else if (isset($_GET['search_item']))
        $action = 'searchProduct';
    else
        $action = "listProduct";

    switch ($action) {
        case 'listProduct':
            $list = selectProduct();
            break;
        case 'addProduct':
            if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['brand']) && !empty($_POST['description'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $brand = $_POST['brand'];
                $description = $_POST['description'];

                addProduct($name, $price, $brand, $description);
            }
            header("location: ../views/products.php");
            break;
        case 'deleteProduct':
            if (isset($_GET['id'])) {
                deleteProduct($_GET['id']);
            }
            $list = selectProduct();
            header("location: ../views/products.php");
            break;
        case 'updateProduct':
            if (!empty($_GET['id'])) {
                $id = $_GET['id'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $brand = $_POST['brand'];
                $description = $_POST['description'];
                $image = $_FILES['image']['name'] ? $_FILES['image']['name'] : $_GET['image'];

                updateProduct($id, $name, $price, $brand, $description, $image);
            }
            header("location: ../views/products.php");
            break;
        case 'getByBrand':
            if (isset($_GET['brand'])) {
                $brand = $_GET['brand'];
                $list = getByBrand($brand);
            }
            break;
        case 'searchProduct':
            if (isset($_GET['search_item'])) {
                $keyword = $_GET['search_item'];
                $list = searchProduct($keyword);
            }
        default:

            break;
    }
?>
