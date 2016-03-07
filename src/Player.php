<?php

    class Player
    {
        private $name;
        private $inventory_id;
        private $stage_id;
        private $game_id;
        private $id;

        function __construct($name, $inventory_id, $stage_id, $game_id, $id = null)
        {
            $this->name = $name;
            $this->inventory_id = $inventory_id;
            $this->stage_id = $stage_id;
            $this->game_id = $game_id;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function getInventoryId()
        {
            $GLOBALS['DB']->query("SELECT * FROM inventory WHERE player_id = {$this->getId()};");
            return $this->inventory_id;
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

        function setInventoryId($inventory_id)
        {
            $this->inventory_id = $inventory_id;
        }

        function setStageId($stage_id)
        {
            $this->stage_id = $stage_id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO player (name, inventory_id, stage_id, game_id) VALUES ('{$this->getName()}', '{$this->getInventoryId()}', {$this->getStageId()}, {$this->getGameId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_players = $GLOBALS['DB']->query("SELECT * FROM player;");
            $players = [];

            foreach($returned_players as $player) {
                $name = $player['name'];
                $inventory_id = $player['inventory_id'];
                $stage_id = $player['stage_id'];
                $game_id = $player['game_id'];
                $id = $player['id'];
                $new_player = new Player($name, $inventory_id, $stage_id, $game_id, $id);
                array_push($players, $new_player);
            }
            return $players;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM player;");
        }


    }
?>
