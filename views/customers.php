<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Orders</title>
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

        <div class="admin-container">
            <div class="mypost-container">
                <div class="mypost-wrapper">
                    <div class="mypost-center" style="overflow-x: auto;">
                        <div class="mypost-title-box">
                            <div class="mypost-title">Customers</div>
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
                            <tbody class="ordered-table">

                            </tbody>
                        </table>
                        <div class="order-pagination-wrapper"></div>
                    </div>
                </div>
            </div>

            <div class="admin-popup"></div>
        </div>

        <script src="https://kit.fontawesome.com/6b31c79fde.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="../script/orders.js" charset="utf-8"></script>

    </body>
</html>
