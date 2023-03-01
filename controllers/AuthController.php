<?php
session_start();
require "../route.php";
class AuthController
{
    public function login()
    {
        // Kiểm tra nếu người dùng đã submit form đăng nhập
        if (isset($_POST['btn-login'])) {
            // Lấy thông tin đăng nhập từ form
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password = md5($password);

            // Kiểm tra xem người dùng đã nhập đủ thông tin hay chưa
            if (empty($email) || empty($password)) {
                header("Location: ../views/login.php?error=empty_login");
                exit();
            } else {
                // Kết nối tới CSDL
                require("../models/AccountsModel.php");
                $account = new AccountsModel();
                $result = $account->getAccounts($email, $password);

                // Kiểm tra xem truy vấn có trả về kết quả hay không
                if ($result && mysqli_num_rows($result) > 0) {
                    // Đăng nhập thành công
                    // Chuyển hướng đến trang chủ hoặc trang mà người dùng muốn truy cập
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    header("Location: ../views/home.php");
                    exit();
                } else {
                    // Thông tin đăng nhập không chính xác
                    echo '<script>alert("Sai thong tin")</script>';
                }
                // Đóng kết nối CSDL
                exit();
                // mysqli_close($conn);
            }
        }
    }

    // Đăng ký -> done nhưng chưa bắt lỗi
    public function register()
    {
        if (isset($_POST['btn-register'])) {
            $name = $_POST['fullName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $role = "customer";
            $uppercase = preg_match('@[A-Z]@', $password); // Kiểm tra mật khẩu có chứa kí tự hoa không
            $number = preg_match('@[0-9]@', $password); // Kiểm tra mật khẩu có chứa số không
            require("../models/AccountsModel.php");
            $account = new AccountsModel();
            $result = $account->findDuplicate($email);
            // Validate input data
            if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
                echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            } else if ($password !== $confirmPassword) {
                echo "Passwords do not match.";
                exit;
            } else if ($result and mysqli_num_rows($result) > 0) {
                echo "Email này đã được đăng ký!. <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            } else if (strlen($password) < 8) {
                echo "Mật khẩu quá ngắn. <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            } else if (!$uppercase || !$number) {
                echo "Mật khẩu phải có 1 chữ hoa và 1 số. <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            } else {
                // mã hóa mật khẩu
                $hashedPassword = md5($password);
                // tạo tài khoản
                // require("../models/AccountsModel.php");
                // $account1 = new AccountsModel();
                $result1 = $account->addAccount($name, $email, $hashedPassword, $role);
                if ($result1) {
                    header("Location:../views/customer/index.php");
                } else {
                    echo '<script> let choice = confirm("Đăng ký thất bại. Thử lại?")</script>';
                }
            }
        }
    }
}
