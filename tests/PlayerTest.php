<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Player.php';

    $server = 'mysql:host=localhost;dbname=burritos_test';
    $user_name = 'root';
    $password = 'root';
    $DB = new PDO($server, $user_name, $password);

    class PlayerTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Player::deleteAll();
        }

        function test_getInfo()
        {
            // Arrange
            $name = "Joe";
            $game_id = 1;
            $id = 1;
            $test_player = new Player($name, $game_id, $id);

            // Act
            $result1 = $test_player->getName();
            $result6 = $test_player->getGameId();
            $result7 = $test_player->getId();

            // Assert

            $this->assertEquals($name, $result1);
            $this->assertEquals(1, $result6);
            $this->assertEquals($id, $result7);
        }

        function test_save()
        {
            $name = "Joe";
            $game_id = 1;
            $id = 1;
            $test_player = new Player($name, $game_id, $id);
            $test_player->save();

            //Act
            $result = Player::getAll();

            //Assert
            $this->assertEquals([$test_player], $result);
        }

        function test_getAll()
        {
            $name = "Joe";
            $game_id = 1;
            $id = 1;
            $test_player = new Player($name, $game_id, $id);
            $test_player->save();

            $name2 = "Mary";
            $id2 = 2;
            $test_player2 = new Player($name2, $game_id, $id2);
            $test_player2->save();

            //Act
            $result = Player::getAll();

            //Assert
            $this->assertEquals([$test_player, $test_player2], $result);
        }
    }
 ?>
