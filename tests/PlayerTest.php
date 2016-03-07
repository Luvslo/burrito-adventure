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

    class PlayerTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Player::deleteAll();
        // }

        function test_getInfo()
        {
            // Arrange
            $name = "Joe";
            $money = 0;
            $inventory = ['frozen_hunk'];
            $current_stage = 12;
            $has_burrito = 0;
            $game_id = 1;
            $id = 1;
            $test_player = new Player($name, $money, $inventory, $current_stage, $has_burrito, $game_id, $id);

            // Act
            $result1 = $test_player->getName();
            $result2 = $test_player->getMoney();
            $result3 = $test_player->getInventory();
            $result4 = $test_player->getCurrentStage();
            $result5 = $test_player->getHasBurrito();
            $result6 = $test_player->getGameId();
            $result7 = $test_player->getId();

            // Assert
            $this->assertEquals($name, $result1);
            $this->assertEquals($money, $result2);
            $this->assertEquals($inventory, $result3);
            $this->assertEquals($current_stage, $result4);
            $this->assertEquals(0, $result5);
            $this->assertEquals(1, $result6);
            $this->assertEquals($id, $result7);
        }
    }
 ?>
