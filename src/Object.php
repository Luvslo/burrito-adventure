<?php

    class Object
        {
            private $name;
            private $description;
            private $game_id;
            private $in_inventory;
            private $id;

            function __construct($name, $description, $game_id, $in_inventory = 0, $id = null) {
                $this->name = $name;
                $this->description = $description;
                $this->game_id = $game_id;
                $this->in_inventory = $in_inventory;
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

            function getInInventory()
            {
                return $this->in_inventory;
            }

            function setInInventory($new_in_inventory)
            {
                $this->in_inventory = $new_in_inventory;
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
                $GLOBALS['DB']->exec("INSERT INTO objects (name, description, game_id, in_inventory) VALUES ('{$this->adjustPunctuation($this->getName())}', '{$this->adjustPunctuation($this->getDescription())}', {$this->getGameId()}, {$this->getInInventory()});");
                $this->id = $GLOBALS['DB']->lastInsertId();
            }

            static function getAll()
            {
                $returned_objects = $GLOBALS['DB']->query("SELECT * FROM objects;");
                $objects = array();

                foreach($returned_objects as $object) {
                    $name = $object['name'];
                    $description = $object['description'];
                    $game_id = $object['game_id'];
                    $in_inventory = $object['in_inventory'];
                    $id = $object['id'];
                    $new_object = new Object($name, $description, $game_id, $in_inventory, $id);
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
