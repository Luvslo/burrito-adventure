<?php
    
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Room.php';

    $server = 'mysql:host=localhost;dbname=burritos_test';
    $usercourse_name = 'root';
    $password = 'root';
    $DB = new PDO($server, $usercourse_name, $password);

    class RoomTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Room::deleteAll();
        }

        function test_methodToTest_inputDescription()
        {
            // Arrange

            // Act

            // Assert
        }
    }
 ?>
