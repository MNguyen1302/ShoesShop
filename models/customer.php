<?php
    function register($fullname, $email, $password, $address)
    {
        global $db;

        $response = (object) [
            "status" => "error",
            "content" => ""
        ];
        $sql = "SELECT * FROM customers WHERE email = '$email'";
        $old = $db->query($sql);
        $password = md5($password);

        if ($old->rowCount() > 0) {
            $response->content = "Email in use";
            return $response;
        }

        $id = uniqid();

        $sql = "INSERT INTO customers (id, fullname, email, password, address, role) VALUES ('$id', '$fullname', '$email', '$password', '$address', 'user')";
        $db->exec($sql);
        $response = (object) [
            "status" => "success",
            "content" => "Register completed"
        ];

        return $response;
    }

    function login($email, $password)
    {
        session_start();

        global $db;
        $password = md5($password);
        $response = (object) [
            "status" => "error",
            "content" => ""
        ];

        $sql = "SELECT * FROM customers WHERE email = '$email' AND password = '$password' LIMIT 1";
        $user = $db->query($sql);

        if ($user->rowCount() <= 0) {
            $response->content = "Email or password was wrong";
            return $response;
        }
        $user_result = $user->fetch();

        if ($user_result['role'] == 'user') {
            $_SESSION['user'] = $user_result['id'];
            header("location: ../views/index.php");
        }
        else {
            $_SESSION['admin'] = $user_result['id'];
            header("location: ../views/admin.php");
        }

    }

    function getUser()
    {
        session_start();

        global $db;
        if (empty($_SESSION['user'])) {
            return null;
        }
        $userId = $_SESSION['user'];

        $sql = "SELECT * FROM customers WHERE id = '$userId'";
        $user = $db->query($sql);
        return $user->fetch();
    }
?>
