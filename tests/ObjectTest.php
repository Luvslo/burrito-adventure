<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Object.php';

    $server = 'mysql:host=localhost;dbname=burritos_test';
    $user_name = 'root';
    $password = 'root';
    $DB = new PDO($server, $user_name, $password);

    class ObjectTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Object::deleteAll();
        // }

        function test_getInfo()
        {
            // Arrange
            $name = "Frozen Burrito";
            $location = "Freezer";
            $description = "This frozen burrito looks super questionable. It's probably been frozen for a long time, and is as hard as a rock. Is that mold I see?";
            $id = null;
            $game_id = 1;

            $new_object = new Object($name, $location, $description, $id, $game_id);
            // Act
            $result1 = $name;
            $result2 = $location;
            $result3 = $description;
            $result4 = $id;
            $result5 = $game_id;
            // Assert
            $this->assertEquals($name, $result1);
            $this->assertEquals($location, $result2);
            $this->assertEquals($description, $result3);
            $this->assertEquals($id, $result4);
            $this->assertEquals($game_id, $result5);


        }
    }
 ?>
