<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Inventory.php';

    $server = 'mysql:host=localhost;dbname=burritos_test';
    $user_name = 'root';
    $password = 'root';
    $DB = new PDO($server, $user_name, $password);

    class InventoryTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Inventory::deleteAll();
        }

        function test_getInfo()
        {
            // Arrange
            $name = "Frozen Burrito";
            $description = "This frozen burrito looks super questionable. It's probably been frozen for a long time, and is as hard as a rock. Is that mold I see?";
            $id = null;
            $game_id = 1;
            $in_inventory = 0;
            $picture = "picture.png";

            $test_inventory = new Inventory($name, $description, $game_id, $in_inventory, $picture, $id);
            // Act
            $result1 = $name;
            $result2 = $in_inventory;
            $result3 = $description;
            $result4 = $id;
            $result5 = $game_id;
            // Assert
            $this->assertEquals($name, $result1);
            $this->assertEquals(0, $result2);
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
            $picture = "picture.png";

            $test_inventory = new Inventory($name, $description, $game_id, $in_inventory, $picture, $id);
            $test_inventory->save();

            $result = Inventory::getAll();

            $this->assertEquals($test_inventory, $result[0]);
        }

        function test_getPicture()
        {
            $name = "Frozen Burrito";
            $description = "This frozen burrito looks super questionable. It's probably been frozen for a long time, and is as hard as a rock. Is that mold I see?";
            $id = null;
            $game_id = 1;
            $in_inventory = 0;
            $picture = "picture.png";

            $test_inventory = new Inventory($name, $description, $game_id, $in_inventory, $picture, $id);
            $test_inventory->save();

            $result = $test_inventory->getPicture();

            $this->assertEquals("picture.png", $result);
        }

        function test_getAll()
        {
            $name = "Frozen Burrito";
            $description = "This frozen burrito looks super questionable. It's probably been frozen for a long time, and is as hard as a rock. Is that mold I see?";
            $id = null;
            $game_id = 1;
            $in_inventory = 0;
            $picture = "picture.png";

            $test_inventory = new Inventory($name, $description, $game_id, $in_inventory, $picture, $id);
            $test_inventory->save();

            $name2 = "Cash money";
            $description2 = "This is money. It can be used in exchange for goods and services.";
            $game_id2 = 2;
            $in_inventory2 = 0;
            $picture2 = "picture.png";

            $test_inventory2 = new Inventory($name2, $description2, $game_id2, $in_inventory2, $picture2, $id);
            $test_inventory2->save();

            $result = Inventory::getAll();

            $this->assertEquals([$test_inventory, $test_inventory2], $result);
        }

        function test_reset()
        {
            $name = "Frozen Burrito";
            $description = "This frozen burrito looks super questionable. It's probably been frozen for a long time, and is as hard as a rock. Is that mold I see?";
            $id = null;
            $game_id = 1;
            $in_inventory = 1;
            $picture = "picture.png";

            $test_inventory = new Inventory($name, $description, $game_id, $in_inventory, $picture, $id);
            $test_inventory->save();

            $name2 = "Cash money";
            $description2 = "This is money. It can be used in exchange for goods and services.";
            $game_id2 = 2;
            $in_inventory2 = 1;
            $picture2 = "picture.png";

            $test_inventory2 = new Inventory($name2, $description2, $game_id2, $in_inventory2, $picture, $id);
            $test_inventory2->save();

            Inventory::reset();

            $current_inventory = Inventory::getAll();

            $this->assertEquals(0, $current_inventory[0]->getInInventory());
            $this->assertEquals(0, $current_inventory[1]->getInInventory());
        }

        function test_putInInventory()
        {
            $name = "Frozen Burrito";
            $description = "This frozen burrito looks super questionable. It's probably been frozen for a long time, and is as hard as a rock. Is that mold I see?";
            $id = null;
            $game_id = 1;
            $in_inventory = 0;
            $picture = "picture.png";

            $test_inventory = new Inventory($name, $description, $game_id, $in_inventory, $picture, $id);
            $test_inventory->save();

            $test_inventory->putInInventory("Frozen Burrito");

            $current_inventory = Inventory::getAll();

            $this->assertEquals(1, $current_inventory[0]->getInInventory());
        }

        function test_isInInventory()
        {
            $name = "Frozen Burrito";
            $description = "This frozen burrito looks super questionable. It's probably been frozen for a long time, and is as hard as a rock. Is that mold I see?";
            $id = null;
            $game_id = 1;
            $in_inventory = 1;
            $picture = "picture.png";
            $test_inventory = new Inventory($name, $description, $game_id, $in_inventory, $picture, $id);
            $test_inventory->save();

            $name2 = "Cash money";
            $description2 = "This is money. It can be used in exchange for goods and services.";
            $in_inventory2 = 1;
            $picture2 = "picture.png";
            $test_inventory2 = new Inventory($name2, $description2, $game_id, $in_inventory2, $picture, $id);
            $test_inventory2->save();

            $name3 = "Keys";
            $description3 = "keys";
            $in_inventory3 = 0;
            $test_inventory3 = new Inventory($name3, $description3, $game_id, $in_inventory3, $picture, $id);
            $test_inventory3->save();

            $current_inventory = Inventory::isInInventory();
            $this->assertEquals([$test_inventory, $test_inventory2], $current_inventory);
        }

    }
 ?>
