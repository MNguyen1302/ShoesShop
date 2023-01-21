<!DOCTYPE html>
<html>
    <head>
        <title>Product</title>
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
    <body>
        <?php
            include '../controllers/product.php';
            include './layout/header.php';

            $num_per_page = 5;
        ?>

        <div class="title-cart">
            <span>Products</span>
        </div>

        <div class="product">
            <div class="filter-heading">
                <ul class="filter-categories">
                    <li onclick="searchByBrand('all')">All Products</li>
                    <li onclick="searchByBrand('nike')">Nike</li>
                    <li onclick="searchByBrand('adidas')">Adidas</li>
                    <li onclick="searchByBrand('converse')">Converse</li>
                    <li onclick="searchByBrand('vans')">Vans</li>
                </ul>
                <form class="search-box" method="get" action="?action=searchProduct">
                    <input id="search" name="search_item" type="text" placeholder="Search..." autocomplete="off">
                    <button class="icon-search" type="submit"><i class="ri-search-line"></i></button>
                </form>
            </div>
            <div class="product-item">
                <?php
                    $user_result = json_encode($user);

                    if ($_GET['page'])
                        $page = $_GET['page'];
                    else
                        $page = 1;

                    $num_per_page = 5;
                    $start = ($page - 1) * $num_per_page;

                    $products = array_slice($list->fetchAll(), $start, $num_per_page);

                    foreach ($products as $product) {
                        $product_result = json_encode($product);
                        echo "<div class='product-box' data-id='{$product['productId']}'>
                                <img class='product-image' onclick='displayDetail(".$product['productId'].")' src='../images/".$product['image']."' alt='{$product['name']}' data-id='{$product['productId']}'>
                                <div class='product-info'>
                                    <span>{$product['name']}</span>
                                    <span>{$product['price']} ₫</span>
                                </div>
                                <button class='button-add' data-id='{$product['productId']}' onclick='addToCart($user_result, $product_result)'>Add to cart</button>
                            </div>";
                    }
                ?>
            </div>
            <div class="pagination-wrapper">
                <?php
                    $total_products = $list->rowCount();
                    $total_pages = ($total_products/$num_per_page);

                    for ($page=1; $page <= ceil($total_pages); $page++) {
                        echo "<button class='number-page' onclick='updateParamPage(${page})'>$page</a>";
                    }
                ?>
            </div>
        </div>

        <?php
            if (!empty($_GET['id'])) {
                $id = $_GET['id'];
                $query = "SELECT * FROM products WHERE productId = '$id'";
                $result = $db->query($query);
                $product = $result->fetch();
                $product_result = json_encode($product);

                echo "<div class='product-popup' style='display: block;'>
                        <div class='product-popup-wrapper' id='{$product['productId']}'>
                            <div class='close-detail-product'>
                                <i class='ri-close-line btn-close' onclick='
                                    (function() {
                                        closePopup();
                                    })();
                                '></i>
                            </div>
                            <div class='product-detail'>
                                <div class='product-detail-img'>
                                    <img src='../images/".$product['image']."' alt='{$product['name']}'>
                                </div>
                                <div class='product-detail-content'>
                                    <div class='product-detail-info'>
                                        <span class='product-detail-name'>{$product['name']}</span>
                                        <span class='product-detail-price'>{$product['price']} ₫</span>
                                    </div>
                                    <p class='product-detail-description'>{$product['description']}</p>
                                    <form class='cart'>
                                        <div class='quantity buttons-added' style='float: left; border: solid 1px rgba(0 0 0 / 30%);'>
                                            <button type='button' class='minus' onclick='addCountToCart(`-`)'>
                                                <i class='ri-subtract-fill'></i>
                                            </button>
                                            <input type='number' class='input-quantity' step='1' min='1' max name='quantity' value='1'>
                                            <button type='button' class='plus' onclick='addCountToCart(`+`)'>
                                                <i class='ri-add-fill'></i>
                                            </button>
                                        </div>
                                        <button type='button' class='add_to_cart' onclick='addCountToCart(`add`, $product_result, $user_result)'>Add To Cart</button>
                                    </form>
                                    <div class='brand'>
                                        <span>Brand: </span>
                                        <span>{$product['brand']}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
        ?>

        <script src="https://kit.fontawesome.com/6b31c79fde.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="../script/lib.js"></script>
        <script src="../script/main.js"></script>
        <script src="../script/product.js"></script>
        <script src="../script/cart.js"></script>

        <script type="text/javascript">
            displayCart(<?php echo json_encode($user); ?>);
            totalPrice(<?php echo json_encode($user); ?>);
        </script>

    </body>
</html>
