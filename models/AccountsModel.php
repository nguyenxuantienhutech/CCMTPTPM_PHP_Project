<?php
require_once("../Connection.php");
class AccountsModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getInstance()->getConnection();
    }

    // CRUD 
    public function addAccount($fullName, $email, $password, $role)
    {
        $sql = "INSERT INTO accounts (name, email, password, account_type) VALUES ('$fullName', '$email', '$password', '$role')";
        if (mysqli_query($this->conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    // thêm các phương thức khác để thao tác với bảng accounts
    public function getAccounts($email, $password)
    {
        $sql = "SELECT * FROM accounts where email = '$email' AND password = '$password'";
        $user = mysqli_query($this->conn,$sql);
        return $user;
    }
    // tìm trùng
    public function findDuplicate($email)
    {
        $sql = "SELECT email FROM accounts WHERE email='$email'";
        $user = mysqli_query($this->conn,$sql);
        return $user;
    }
}
