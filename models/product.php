<?php
    function selectProduct()
    {
        global $db;
        $query = "SELECT * from products";
        $result = $db->query($query);
        return $result;
    }

    function getByBrand($brand)
    {
        global $db;
        $query = "SELECT * FROM products WHERE brand = '$brand'";
        $result = $db->query($query);
        return $result;
    }

    function addProduct($name, $price, $brand, $description)
    {
        global $db;

        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_parts = explode('.', $file_name);
        $file_ext = strtolower(end($file_parts));

        $expensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $expensions) == false) {
            $errors[] = "Just support jpeg, jpg and png file";
        }
        if ($file_size > 2097152) {
            $errors[] = "File size cannot be larger 2MB";
        }
        $target = "../images/".basename($file_name);

        $productId = hexdec(uniqid());
        $date = date('Y-m-d');
        $price = number_format($price, 0, '', '.');

        $sql = "INSERT INTO products (productId, name, price, image, brand, description, createdAt) VALUES ('$productId', '$name', '$price', '$file_name', '$brand', '$description', '$date')";
        $db->exec($sql);

        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }

    function deleteProduct($id)
    {
        global $db;

        $sql = "SET FOREIGN_KEY_CHECKS=0;";
        $sql .= "DELETE FROM products WHERE productId = '$id';";
        $sql .= "SET FOREIGN_KEY_CHECKS=1";
        $db->exec($sql);
    }

    function updateProduct($id, $name, $price, $brand, $description, $image)
    {
        global $db;

        if ($_FILES['image']['name']) {
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_parts = explode('.', $file_name);
            $file_ext = strtolower(end($file_parts));

            $expensions = array("jpeg", "jpg", "png");
            if (in_array($file_ext, $expensions) == false) {
                $errors[] = "Just support jpeg, jpg and png file";
            }
            if ($file_size > 2097152) {
                $errors[] = "File size cannot be larger 2MB";
            }
        }
        $target = "../images/".basename($image);
        $updatedAt = date('Y-m-d');

        $sql = "UPDATE products SET name = '$name', price = '$price', image = '$image', brand = '$brand', description = '$description', createdAt = '$updatedAt' WHERE productId = '$id'";
        $db->exec($sql);

        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }

    function searchProduct($keyword)
    {
        global $db;
        $sql = "SELECT * FROM products WHERE name LIKE '%$keyword%'";
        $result = $db->query($sql);
        return $result;
    }
?>
