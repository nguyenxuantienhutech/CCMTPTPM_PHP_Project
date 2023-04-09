<?php

use PHPUnit\Framework\TestCase;

class RegistionTest extends TestCase
{
    public function testEmptyFields()
    {
        $_POST = array(
            'username' => '',
            'firstname' => '',
            'lastname' => '',
            'email' => '',
            'phone' => '',
            'password' => '',
            'cpassword' => '',
            'address' => ''
        );
        $this->assertEquals('All fields must be Required!', $this->validate_register('', '', '', '', '', '', '', ''));
    }

    public function testInvalidPassword()
    {
        $_POST = array(
            'username' => 'testuser',
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone' => '1234567890',
            'password' => '123',
            'cpassword' => '123',
            'address' => '123 Main St'
        );
        $this->assertEquals('Password Must be >=6', $this->validate_register('testuser', 'John', 'Doe', 'john.doe@example.com', '1234567890', '123', '123', '123 Main St'));
    }

    public function testValidRegistration()
    {
        $_POST = array(
            'username' => 'testuser',
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone' => '1234567890',
            'password' => 'password123',
            'cpassword' => 'password123',
            'address' => '123 Main St'
        );
        $this->assertEquals('', $this->validate_register('testuser', 'John', 'Doe', 'john.doe@example.com', '1234567890', 'password123', 'password123', '123 Main St'));
    }
    
    public function testInvalidEmail()
    {
        $_POST = array(
            'username' => 'testuser',
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'johndoe@example',
            'phone' => '1234567890',
            'password' => 'password123',
            'cpassword' => 'password123',
            'address' => '123 Main St'
        );
        $this->assertEquals('Invalid email address please type a valid email!', $this->validate_register('testuser', 'John', 'Doe', 'johndoe@example', '1234567890', 'password123', 'password123', '123 Main St'));
    }
    
    public function testUsernameAlreadyExists()
    {
        // Assuming that the username 'testuser' already exists in the database
        $_POST = array(
            'username' => 'trang1',
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'xuantien8a23@gmail.com',
            'phone' => '1234567890',
            'password' => 'password123',
            'cpassword' => 'password123',
            'address' => '123 Main St'
        );
        $this->assertEquals('Username Already exists!', $this->validate_register('trang1', 'John', 'Doe', 'xuantien8a23@gmail.com', '1234567890', 'password123', 'password123', '123 Main St'));
    }
    
    public function testPasswordNotMatch()
    {
        $_POST = array(
            'username' => 'testuser',
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'password' => 'password123',
            'cpassword' => 'password456',
            'address' => '123 Main St'
        );
        $this->assertEquals('Password not match', $this->validate_register('testuser', 'John', 'Doe', 'johndoe@example.com', '1234567890', 'password123', 'password456', '123 Main St'));
    }
    

    public function validate_register($username, $firstname, $lastname, $email, $phone, $password, $cpassword, $address)
    {
        $message = '';
        if (empty($username) || empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($password) || empty($cpassword) || empty($address)) {
            $message = "All fields must be Required!";
        } elseif ($password != $cpassword) {
            $message = "Password not match";
        } elseif (strlen($password) < 6) {
            $message = "Password Must be >=6";
        } elseif (strlen($phone) < 10) {
            $message = "Invalid phone number!";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Invalid email address please type a valid email!";
        } else {
            include("connection/connect.php");
            $check_username = mysqli_query($db, "SELECT username FROM users where username = '" . $username . "' ");
            $check_email = mysqli_query($db, "SELECT email FROM users where email = '" . $email . "' ");
            if (mysqli_num_rows($check_username) > 0) {
                $message = "Username Already exists!";
            } elseif (mysqli_num_rows($check_email) > 0) {
                $message = "Email Already exists!";
            }
        }
        return $message;
    }
}
