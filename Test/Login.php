<?php

use PHPUnit\Framework\TestCase;

class RegistionTest extends TestCase
{
    public function testEmptyFields()
    {
        $_POST = array(
            'username' => '',
            'password' => ''
        );
        $this->assertEquals('All fields must be Required!', $this->validate_login('', ''));
    }
    
    public function testUsernameAlreadyExists()
    {
        // Assuming that the username 'testuser' already exists in the database
        $_POST = array(
            'username' => 'trang1',
            'password' => 'password123'
        );
        $this->assertEquals('Username Already exists!', $this->validate_login('trang1','password123'));
    }
    

    public function validate_login($username, $password)
    {
        $message = '';
        if (empty($username) || empty($password)) {
            $message = "All fields must be Required!";
        } elseif ($password != $password) {
            $message = "Password not match";
        } elseif (strlen($password) < 6) {
            $message = "Password Must be >=6";
        } else {
            include("connection/connect.php");
            $check_username = mysqli_query($db, "SELECT username FROM users where username = '" . $username . "' ");
            if (mysqli_num_rows($check_username) > 0) {
                $message = "Username Already exists!";
            }
        }
        return $message;
    }
}