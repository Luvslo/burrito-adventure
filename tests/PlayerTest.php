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
            $stage_id = 12;
            $game_id = 1;
            $id = 1;
            $test_player = new Player($name, $stage_id, $game_id, $id);

            // Act
            $result1 = $test_player->getName();
            $result4 = $test_player->getStageId();
            $result6 = $test_player->getGameId();
            $result7 = $test_player->getId();

            // Assert
            $this->assertEquals($name, $result1);
            $this->assertEquals($stage_id, $result4);
            $this->assertEquals(1, $result6);
            $this->assertEquals($id, $result7);
        }

        function test_save()
        {
            $name = "Joe";
            $stage_id = 12;
            $game_id = 1;
            $id = 1;
            $test_player = new Player($name, $stage_id,$game_id, $id);
            $test_player->save();

            //Act
            $result = Player::getAll();

            //Assert
            $this->assertEquals([$test_player], $result);
        }

        function test_getAll()
        {
            $name = "Joe";
            $stage_id = 12;
            $game_id = 1;
            $id = 1;
            $test_player = new Player($name, $stage_id, $game_id, $id);
            $test_player->save();

            $name2 = "Mary";
            $stage_id2 = 12;
            $id2 = 2;
            $test_player2 = new Player($name2, $stage_id2, $game_id, $id2);
            $test_player2->save();

            //Act
            $result = Player::getAll();

            //Assert
            $this->assertEquals([$test_player, $test_player2], $result);
        }
    }
 ?>
