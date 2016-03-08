<?php

    class Player
    {
        private $name;
        private $game_id;
        private $id;

        function __construct($name, $game_id, $id = null)
        {
            $this->name = $name;
            $this->game_id = $game_id;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
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
            $GLOBALS['DB']->exec("INSERT INTO player (name, game_id) VALUES ('{$this->getName()}', {$this->getGameId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_players = $GLOBALS['DB']->query("SELECT * FROM player;");
            $players = [];

            foreach($returned_players as $player) {
                $name = $player['name'];
                $game_id = $player['game_id'];
                $id = $player['id'];
                $new_player = new Player($name, $game_id, $id);
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
