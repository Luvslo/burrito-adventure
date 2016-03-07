<?php

    class Object
        {
            private $name;
            private $location;
            private $description;
            private $game_id;
            private $id;

            function __construct($name, $location, $description, $game_id, $id = null) {
                $this->name = $name;
                $this->location = $location;
                $this->description = $description;
                $this->game_id = $game_id;
                $this->id = $id;
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

            function adjustPunctuation($input)
            {
                $search = "/(\')/";
                $replace = "\'";
                $clean_input = preg_replace($search, $replace, $input);
                return $clean_input;
            }

            function save()
            {
                $GLOBALS['DB']->exec("INSERT INTO objects (name, location, description, game_id) VALUES ('{$this->adjustPunctuation($this->getName())}', '{$this->adjustPunctuation($this->getLocation())}', '{$this->adjustPunctuation($this->getDescription())}', {$this->getGameId()});");
                $this->id = $GLOBALS['DB']->lastInsertId();
            }

            static function getAll()
            {
                $returned_objects = $GLOBALS['DB']->query("SELECT * FROM objects;");
                $objects = array();

                foreach($returned_objects as $object) {
                    $name = $object['name'];
                    $location = $object['location'];
                    $description = $object['description'];
                    $game_id = $object['game_id'];
                    $id = $object['id'];
                    $new_object = new Object($name, $location, $description, $game_id, $id);
                    array_push($objects, $new_object);
                }
                return $objects;
            }

            static function deleteAll()
            {
                $GLOBALS['DB']->exec("DELETE FROM objects;");
            }




        }
?>
