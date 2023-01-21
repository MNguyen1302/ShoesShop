<?php
    // session_start();
    //
    // if (!empty($_SESSION['user'])) {
    //     header("location: index.php");
    // }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style/auth.css" media="all" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    </head>
    <body>
        <?php
            include '../controllers/customer.php';
        ?>

        <div class="login">
            <div class="banner">
                <img src="https://cf.shopee.vn/file/1a2ac4183c8d053e2efc8dad038f10b1" alt="">
            </div>
            <div class="form-login register">
                <h3 class="form-auth-title">Register</h3>
                <form id="form-register" method="post" action="?action=register">
                    <div class="form-group">
                        <label class="form-label" for="">Fullname</label>
                        <input class="form-input" type="text" name="fullname" id="fullname" autocomplete="off">
                        <span class="error-message"></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Email</label>
                        <input class="form-input" type="text" name="email" id="email" autocomplete="off">
                        <span class="error-message"></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Password</label>
                        <input class="form-input" type="password" name="password" id="password" autocomplete="off">
                        <span class="error-message"></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Confirm Password</label>
                        <input class="form-input" type="password" name="confirmpassword" id="confirmpassword" autocomplete="off">
                        <span class="error-message"></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Address</label>
                        <input class="form-input" type="text" name="address" id="address" autocomplete="off">
                        <span class="error-message"></span>
                    </div>
                    <button type="submit" class="button-register">Register</button>
                </form>
                <div class="status-login">
                    <span>You have account? <a href="login.php">Login</a></span>
                </div>
            </div>
        </div>

        <script src="../script/lib.js"></script>
        <script src="../script/auth.js"></script>
        <?php
            if (isset($response)) {
                echo "<script>addAlert(`{$response->content}`, `{$response->status}`)</script>";
            }
        ?>
    </body>
</html>
