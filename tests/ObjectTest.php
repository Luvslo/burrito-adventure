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
        protected function tearDown()
        {
            Object::deleteAll();
        }

        function test_getInfo()
        {
            // Arrange
            $name = "Frozen Burrito";
            $description = "This frozen burrito looks super questionable. It's probably been frozen for a long time, and is as hard as a rock. Is that mold I see?";
            $id = null;
            $game_id = 1;
            $in_inventory = 0;

            $test_object = new Object($name, $description, $game_id, $in_inventory, $id);
            // Act
            $result1 = $name;
            $result3 = $description;
            $result4 = $id;
            $result5 = $game_id;
            // Assert
            $this->assertEquals($name, $result1);
            $this->assertEquals($description, $result3);
            $this->assertEquals($id, $result4);
            $this->assertEquals($game_id, $result5);
        }

        function test_Save()
        {
            $name = "Frozen Burrito";
            $description = "This frozen burrito looks super questionable. It's probably been frozen for a long time, and is as hard as a rock. Is that mold I see?";
            $id = null;
            $game_id = 1;
            $in_inventory = 0;

            $test_object = new Object($name, $description, $game_id, $in_inventory, $id);
            $test_object->save();

            $result = Object::getAll();

            $this->assertEquals($test_object, $result[0]);
        }

        function test_getAll()
        {
            $name = "Frozen Burrito";
            $description = "This frozen burrito looks super questionable. It's probably been frozen for a long time, and is as hard as a rock. Is that mold I see?";
            $id = null;
            $game_id = 1;
            $in_inventory = 0;

            $test_object = new Object($name, $description, $game_id, $in_inventory, $id);
            $test_object->save();

            $name2 = "Cash money";
            $description2 = "This is money. It can be used in exchange for goods and services.";
            $game_id2 = 2;
            $in_inventory2 = 0;

            $test_object2 = new Object($name2, $description2, $game_id2, $in_inventory2, $id);
            $test_object2->save();

            $result = Object::getAll();

            $this->assertEquals([$test_object, $test_object2], $result);
        }

    }
 ?>
