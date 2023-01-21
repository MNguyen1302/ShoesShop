<?php
    include 'profile.php';

    try {
        $dbn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT;
        $db = new PDO($dbn, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include 'database_error.php';
        exit();
    }
?>
