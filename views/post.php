<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Add Product</title>
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
            include '../controllers/product.php';
        ?>

        <div class="admin-container" >
            <form class="form-post" method="post" action="?action=addProduct" enctype="multipart/form-data">
                <div class="admin-post-input">
                    <div class="admin-post-title">Post</div>
                    <label for="name">Product Name</label>
                    <input type="text" id="name" name="name" value="">
                </div>
                <div class="admin-post-input">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price" value="">
                </div>
                <div class="admin-post-input">
                    <label>Product Image</label>
                    <input id="image" type="file" name="image">
                    <img src="https://fairydent.ro/wp-content/uploads/2016/10/orionthemes-placeholder-image-750x750.jpg" alt="Preview Image" width="280px" height="400px" id="previewImg">
                </div>
                <div class="admin-post-input">
                    <label for="brand">Brand</label>
                    <select name="brand" id="brand" class="admin-input-select">
                        <option value="none" hidden selected disabled>Choose Brand</option>
                        <option value="converse">Converse</option>
                        <option value="nike">Nike</option>
                        <option value="adidas">Adidas</option>
                        <option value="vans">Vans</option>
                    </select>
                </div>
                <div class="admin-post-input">
                    <label for="description">Description</label>
                    <textarea name="description" class="description" id="description" cols="30" rows="10"></textarea>
                </div>
                <div class="btn-post">
                    <button type="submit" name="upload" id="btn-post">Add</button>
                </div>
            </form>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/6b31c79fde.js" crossorigin="anonymous"></script>
        <script src="../script/lib.js"></script>
        <script src="../script/admin.js"></script>
    </body>
</html>
