<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Money.php';

    $server = 'mysql:host=localhost;dbname=burritos_test';
    $user_name = 'root';
    $password = 'root';
    $DB = new PDO($server, $user_name, $password);

    class MoneyTest extends PHPUnit_Framework_TestCase
    {
        function test_addMoney()
        {
            $money = new Money();
            $money->addMoney(2);

            $this->assertEquals(3, $money->getValue());
        }
    }
