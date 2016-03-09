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
            $money->addMoney(5);

            $this->assertEquals(6, $money->getValue());
        }

        function test_getMoney()
        {
            $money = new Money();
            $money->addMoney(5);

            $result = 6

            $this->assertEquals(6, $money->getValue());
        }
    }
