<?php
class Connection {
    private static $instance = null;
    public $conn;

    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'fruit_shop';

    private function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->name);
        mysqli_set_charset($this->conn,"utf8");
        if (!$this->conn) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
        }
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

