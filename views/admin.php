<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
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
        ?>

        <div class="toggle-bar"><i class="ri-menu-line"></i></div>
        <div class="admin-container">
            <div class="block-content active">
                <div class="dashboard-heading">Dashboard</div>
                <div class="date-picker">
                    <input type="date" id="from-date">
                    <span class="arrow-right">&#8594;</span>
                    <input type="date" id="to-date">
                </div>
                <div class="total-sales">
                    <div class="total-sales-col-1">
                        <div class="total-sales-title" id="inmonth"></div>
                        <div class="total-sales-info">
                            <div class="total-sales-col-2" style="background: lightblue;">
                                <span class="dashboard-number total-in-month"></span>
                                <span>Total Sales</span>
                            </div>
                            <div class="total-sales-col-2" style="background: lightgreen;">
                                <span id="qty-inmonth" class="dashboard-number"></span>
                                <span>Total Quantitys</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-heading" style="margin: 40px 40px 0 40px;" id="totalSales"></div>
                <div class="mypost-center" style="overflow-x:auto; box-shadow: none; padding: 10px 40px;">
                    <table class="table-mypost">
                        <thead>
                            <tr>
                                <th>Index</th>
                                <th>Brand</th>
                                <th>Total Sales</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody class="dashboard-table"></tbody>
                    </table>
                </div>
            </div>
            <div class="block-content">
                <div class="mypost-container">
                    <div class="mypost-wrapper">
                        <div class="mypost-center" style="overflow-x: auto;">
                            <div class="mypost-title-box">
                                <div class="mypost-title">
                                    Products
                                </div>
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
                                <tbody class="product-table"></tbody>
                            </table>
                            <div class="pagination-wrapper"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content">
                <form class="form-post">
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
                        <button type="submit" id="btn-post">Add</button>
                    </div>
                </form>
            </div>
            <div class="block-content">
                <div class="mypost-container">
                    <div class="mypost-wrapper">
                        <div class="mypost-center" style="overflow-x: auto;">
                            <div class="mypost-title-box">
                                <div class="mypost-title">Orders</div>
                            </div>
                            <table class="table-mypost">
                                <thead>
                                    <tr>
                                        <th>Order Date</th>
                                        <th>Username</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody class="ordered-table"></tbody>
                            </table>
                            <div class="order-pagination-wrapper"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content">
                <div class="mypost-container">
                    <div class="mypost-wrapper">
                        <div class="mypost-center" style="overflow-x: auto;">
                            <div class="mypost-title-box">
                                <div class="mypost-title">
                                    Customers
                                </div>
                            </div>
                            <table class="table-mypost">
                                <thead>
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Username</th>
                                        <th>Phone Number</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="user-table"></tbody>
                            </table>
                            <div class="pagination-wrapper"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-popup"></div>

        <script type="text/javascript">
            Date.prototype.toDateInputValue = function() {
                let local = new Date(this);
                local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
                return local.toJSON().slice(0, 10);
            };

            document.getElementById('from-date').value = new Date(new Date(new Date(new Date().getFullYear(), new Date().getMonth(), 0))).toDateInputValue();
            document.getElementById('to-date').value = new Date().toDateInputValue();
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/6b31c79fde.js" crossorigin="anonymous"></script>
        <script src="../script/lib.js"></script>
        <script src="../script/main.js"></script>
        <script src="../script/admin.js"></script>
        <script src="../script/dashboard.js"></script>
    </body>
</html>
