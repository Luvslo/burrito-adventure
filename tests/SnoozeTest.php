<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Snooze.php';

    $server = 'mysql:host=localhost;dbname=burritos_test';
    $user_name = 'root';
    $password = 'root';
    $DB = new PDO($server, $user_name, $password);

    class SnoozeTest extends PHPUnit_Framework_TestCase
    {
        function test_addSnooze()
        {
            $snooze = new Snooze();
            $snooze->addSnooze(5);

            $this->assertEquals(6, $snooze->getValue());
        }

        function test_getValue()
        {
            $snooze = new Snooze();
            $snooze->addSnooze(5);

            $result = 6;

            $this->assertEquals(6, $snooze->getValue());
        }
    }
 ?>
