<?php
require "../route.php";
require "../config/config.php";
class AuthController
{
    public function login()
    {
        if (isset($_POST["btn-login"])) {
            //Lấy thông tin người dùng nhập vào
            $email = $_POST["email"];
            $password = $_POST["password"];
            // xử lý đầu vào
            if ($email == 'abc@gmail.com' && $password == '123') {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('Location: ../views/customer/index.php');
            } else {
                header('Location:../views/404.php');
            }
        }
    }

    public function register(){
        
    }
}
