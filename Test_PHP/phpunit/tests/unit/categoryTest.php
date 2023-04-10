 
<?php

use PHPUnit\Framework\TestCase;

class RegistionTest extends TestCase
{
    public function testEmptyFields()
    {
        $_POST = array(
            'id_product' => '',
            'name_product' => '',
            'price_product' => '',
        );
        $this->assertEquals('All fields must be Required!', $this->validate_login('', ''));
    }

    public function testUsernameAlreadyExists()
    {
        // Assuming that the id_product 'testuser' already exists in the database
        $_POST = array(
            'id_product' => '',
            'name_product' => '',
            'price_product' => '',
        );
        $this->assertEquals('id_product Already exists!', $this->validate_category('01','vegetable'));
    }