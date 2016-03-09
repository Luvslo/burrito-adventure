<?php

    class Inventory
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
                $GLOBALS['DB']->exec("INSERT INTO inventories (name, description, game_id, in_inventory) VALUES ('{$this->adjustPunctuation($this->getName())}', '{$this->adjustPunctuation($this->getDescription())}', {$this->getGameId()}, {$this->getInInventory()});");
                $this->id = $GLOBALS['DB']->lastInsertId();
            }

            static function getAll()
            {
                $returned_inventories = $GLOBALS['DB']->query("SELECT * FROM inventories;");
                $inventories = array();

                foreach($returned_inventories as $inventory) {
                    $name = $inventory['name'];
                    $description = $inventory['description'];
                    $game_id = $inventory['game_id'];
                    $in_inventory = $inventory['in_inventory'];
                    $id = $inventory['id'];
                    $new_inventory = new Inventory($name, $description, $game_id, $in_inventory, $id);
                    array_push($inventories, $new_inventory);
                }
                return $inventories;
            }

            static function find($search_id)
            {
                $inventories = Inventory::getAll();
                $found_inventory = null;

                foreach ($inventories as $inventory)
                if (($inventory->getId()) == $search_id)
                {
                    $found_inventory = $inventory;
                }
                return $found_inventory;
            }

            static function reset()
            {
                $GLOBALS['DB']->exec("UPDATE inventories SET in_inventory = 0;");
            }

            static function deleteAll()
            {
                $GLOBALS['DB']->exec("DELETE FROM inventories;");
            }

            function putInInventory($name)
            {
                $GLOBALS['DB']->exec("UPDATE inventories SET in_inventory = 1 WHERE name = '{$name}';");
            }

            static function isInInventory()
           {
               $found_items = [];
               $items = Inventory::getAll();
               foreach($items as $item) {
                   $item_status = $item->getInInventory();
                   if ($item_status == 1) {
                     $found_item = $item;
                     array_push($found_items, $item);
                   }
               }
               return $found_items;
           }
        }
?>
