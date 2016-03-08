<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Game.php';

    $server = 'mysql:host=localhost;dbname=burritos_test';
    $user_name = 'root';
    $password = 'root';
    $DB = new PDO($server, $user_name, $password);

    class GameTest extends PHPUnit_Framework_TestCase
    {
        function test_getId()
        {
            //Arrange
            $id = 1;
            $test_game = new Game($id);
            //
            // //Act
            $result = $test_game->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        // function test_death()
        // {
        //     //Arrange
        //     $id = 1;
        //     $test_game = new Game($id);
        //     $reason = "You ate a gross-ass burrito.";
        //
        //     //Act
        //     $result = $test_game->death($reason);
        //
        //     //Assert
        //     $this->assertEquals("You ate a gross-ass burrito.  GAME OVER", $result);
        //
        // }

    }

 ?>
