<?php 
require_once "../controllers/AuthController.php";

// Xử lý yêu cầu đăng nhập
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-login'])) {
    $authController = new AuthController();
    $authController->login();
}

// Xử lý yêu cầu đăng ký
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-register'])) {
    $authController = new AuthController();
    $authController->register();
}
