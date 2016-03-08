<?php

    class Stage
        {
            private $name;
            private $description;
            private $game_id;
            private $id;

            function __construct($name, $description, $game_id, $id = null) {
                $this->name = $name;
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

            function getDescription()
            {
                return $this->description;
            }

            function setDescription($new_description)
            {
                $this->description = $new_description;
            }

            function getGameId()
            {
                return $this->game_id;
            }

            function setGameId($new_game_id)
            {
                $this->game_id = $new_game_id;
            }

            function getId()
            {
                return $this->name;
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
                $GLOBALS['DB']->exec("INSERT INTO stages (name, description, game_id) VALUES ('{$this->adjustPunctuation($this->getName())}', '{$this->adjustPunctuation($this->getDescription())}', {$this->getGameId()});");
                $this->id = $GLOBALS['DB']->lastInsertId();
            }

            static function getAll()
            {
                $returned_stages = $GLOBALS['DB']->query("SELECT * FROM stages;");
                $stages = array();

                foreach($returned_stages as $stage) {
                    $name = $stage['name'];
                    $description = $stage['description'];
                    $game_id = $stage['game_id'];
                    $id = $stage['id'];
                    $new_stage = new Stage($name, $description, $game_id, $id);
                    array_push($stages, $new_stage);
                }
                return $stages;
            }

            static function deleteAll()
            {
                $GLOBALS['DB']->exec("DELETE FROM stages;");
            }

        }
?>
