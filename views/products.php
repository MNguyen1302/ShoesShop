<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Products</title>
        <link rel="stylesheet" type="text/css" href="../style/admin.css" media="all" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    </head>
    <body>
        <?php
            include './layout/sidebar.php';
            include '../controllers/product.php';

        ?>
        <div class="admin-container">
            <div class="mypost-container">
                <div class="mypost-wrapper">
                    <div class="mypost-center" style="overflow-x: auto;">
                        <div class="mypost-title-box">
                            <div class="mypost-title">Products</div>
                            <div class="mypost-search">
                                <input id="search" type="text" placeholder="Search...">
                            </div>
                        </div>
                        <table class="table-mypost">
                            <thead>
                                <tr>
                                    <th>Product Id</th>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Time</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody class="product-table">
                                <?php
                                    if ($_GET['page'])
                                        $page = $_GET['page'];
                                    else
                                        $page = 1;

                                    $num_per_page = 8;
                                    $start = ($page - 1) * $num_per_page;

                                    $products = array_slice($list->fetchAll(), $start, $num_per_page);

                                    foreach ($products as $product) {
                                        echo "<tr id='{$product['productId']}'>
                                                <td class='td-index'>{$product['productId']}</td>
                                                <td class='td-image'>
                                                    <img src='../images/".$product['image']."' alt=''>
                                                </td>
                                                <td>{$product['name']}</td>
                                                <td>{$product['brand']}</td>
                                                <td>{$product['price']} ₫</td>
                                                <td>{$product['createdAt']}</td>
                                                <td class='td-action' style='color: lightgreen;'>
                                                    <span class='btn-edit' data-id='{$product['productId']}' onclick='togglePopupEdit()'>
                                                        <i class='ri-edit-box-line'></i>
                                                    </span>
                                                </td>
                                                <td class='td-action'>
                                                    <button class='btn-delete' onclick='togglePopupDelete()'>
                                                        <i class='ri-delete-bin-6-line'></i>
                                                    </button>
                                                    <div class='popup-delete-post'>
                                                        <div class='delete-popup-content'>
                                                            Do you want to delete this product?
                                                        </div>
                                                        <div class='btn-choose'>
                                                            <button class='btn-yes' data-id='{$product['productId']}'>Yes</button>
                                                            <button class='btn-no'>No</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
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
                </div>
            </div>

            <div class="admin-popup"></div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/6b31c79fde.js" crossorigin="anonymous"></script>
        <script src="../script/main.js"></script>
        <script src="../script/admin.js"></script>
        <script type="text/javascript">
            <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query = "SELECT * FROM products WHERE productId = '$id'";
                    $result = $db->query($query);
                    $product = $result->fetch();
                }
            ?>
            let id = new URL(location.href).searchParams.get("id");
            if (id) {
                showEditPost(<?php echo json_encode($product); ?>);
            }

        </script>
    </body>
</html>
