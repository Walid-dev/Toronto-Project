<?php
session_start();
require('controller/frontendController.php');

try {
    if (isset($_GET['error'])) {
        echo "error";
     } elseif (isset($_POST['login-submit'])) {
        login();
    } elseif (isset($_POST['signup-submit'])) {
        addUser();
    } elseif (isset($_POST['logout-submit'])) {
        logout();
    }
     else {
        home();
    }
} catch (Exception $e) {
    $_SESSION['message'] = $e->getMessage();
    $_SESSION['msg_type'] = "danger";
    home();
}
