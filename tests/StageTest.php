<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Stage.php';

    $server = 'mysql:host=localhost;dbname=burritos_test';
    $usercourse_name = 'root';
    $password = 'root';
    $DB = new PDO($server, $usercourse_name, $password);

    class StageTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stage::deleteAll();
        }

        function test_Save()
        {
            $name = "Kitchen";
            $description = "This is a kitchen and there's stuff in it";
            $id = null;
            $game_id = 1;

            $test_stage = new Stage($name, $description, $game_id, $id);
            $test_stage->save();

            $result = Stage::getAll();

            $this->assertEquals($test_stage, $result[0]);
        }

        function test_getAll()
        {
            $name = "Kitchen";
            $description = "This is a kitchen and there's stuff in it";
            $id = null;
            $game_id = 1;

            $test_stage = new Stage($name, $description, $game_id, $id);
            $test_stage->save();

            $name2 = "Bedroom";
            $description2 = "You wake up in a bedroom. You are hungry for burritos.";
            $game_id2 = 2;

            $test_stage2 = new Stage($name2, $description2, $game_id2, $id);
            $test_stage2->save();

            $result = Stage::getAll();

            $this->assertEquals([$test_stage, $test_stage2], $result);
        }

        function test_find()
        {
            $name = "Kitchen";
            $description = "This is a kitchen and there's stuff in it";
            $id = 1;
            $game_id = 1;

            $test_stage = new Stage($name, $description, $game_id, $id);
            $test_stage->save();

            $name2 = "Bedroom";
            $description2 = "You wake up in a bedroom. You are hungry for burritos.";
            $id2 = 2;
            $game_id2 = 2;

            $test_stage2 = new Stage($name2, $description2, $game_id2, $id2);
            $test_stage2->save();

            $result = Stage::find($test_stage2->getId());

            $this->assertEquals($test_stage2, $result);
        }

    }
 ?>
