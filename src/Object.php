<?php

    class Object
        {
            private $name;
            private $location;
            private $description;
            private $id;
            private $game_id;

            function __construct($name, $location, $description, $id, $game_id) {
                $this->name = $name;
                $this->location = $location;
                $this->description = $description;
                $this->id = $id;
                $this->game_id = $game_id;
            }

            function getName()
            {
                return $this->name;
            }

            function setName($new_name)
            {
                $this->name = $new_name;
            }

            function getLocation()
            {
                return $this->location;
            }

            function setLocation($new_location)
            {
                $this->location = $new_location;
            }

            function getDescription()
            {
                return $this->description;
            }

            function setDescription($new_description)
            {
                $this->description = $new_description;
            }

            function getId()
            {
                return $this->id;
            }

            function getGameId()
            {
                return $this->game_id;
            }

            function setGameId($new_game_id)
            {
                $this->game_id = $new_game_id;
            }






        }
?>
