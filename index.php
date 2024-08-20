<?php
    require_once('config/connectDB.php');
    if (isset($_GET['controller'])) {
        $controller = $_GET['controller'];
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = 'index';
        }
    } else {
        $controller = 'Home';
        $action = 'index';
    }
    require_once('router/Routes.php');
?>