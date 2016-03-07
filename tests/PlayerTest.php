<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Player.php';

    $server = 'mysql:host=localhost;dbname=burritos_test';
    $usercourse_name = 'root';
    $password = 'root';
    $DB = new PDO($server, $usercourse_name, $password);

    // class PlayerTest extends PHPUnit_Framework_TestCase
    // {
    //     protected function tearDown()
    //     {
    //         Player::deleteAll();
    //     }

        // function test_methodToTest_inputDescription()
        // {
            // Arrange

            // Act

            // Assert
        // }
    // }
 ?>
