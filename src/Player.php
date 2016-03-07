<?php

    class Player
    {
        private $name;
        private $stage_id;
        private $game_id;
        private $id;

        function __construct($name, $stage_id, $game_id, $id = null)
        {
            $this->name = $name;
            $this->stage_id = $stage_id;
            $this->game_id = $game_id;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function getStageId()
        {
            return $this->stage_id;
        }

        function getGameId()
        {
            return $this->game_id;
        }

        function getId()
        {
            return $this->id;
        }

        function setName($name)
        {
            $this->name = $name;
        }

        function setStageId($stage_id)
        {
            $this->stage_id = $stage_id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO player (name, stage_id, game_id) VALUES ('{$this->getName()}', {$this->getStageId()}, {$this->getGameId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_players = $GLOBALS['DB']->query("SELECT * FROM player;");
            $players = [];

            foreach($returned_players as $player) {
                $name = $player['name'];
                $stage_id = $player['stage_id'];
                $game_id = $player['game_id'];
                $id = $player['id'];
                $new_player = new Player($name, $stage_id, $game_id, $id);
                array_push($players, $new_player);
            }
            return $players;
        }

        function getInventory()
        {
            $GLOBALS['DB']->query("SELECT * FROM inventory WHERE in_inventory = 1;");
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM player;");
        }


    }
?>
