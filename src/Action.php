<?php

    class Action
    {
        private $name;
        private $description;
        private $stage_id;
        private $id;

        function __construct($name, $description, $stage_id, $id = null)
        {
            $this->name = $name;
            $this->description = $description;
            $this->stage_id = $stage_id;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function getDescription()
        {
            return $this->description;
        }

        function getStageId()
        {
            return $this->stage_id;
        }

        function getId()
        {
            return $this->id;
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
            $GLOBALS['DB']->exec("INSERT INTO actions (name, description, stage_id) VALUES ('{$this->adjustPunctuation($this->getName())}', '{$this->adjustPunctuation($this->getDescription())}', {$this->getStageId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_actions = $GLOBALS['DB']->query("SELECT * FROM actions;");
            $actions = array();

            foreach($returned_actions as $action) {
                $name = $action['name'];
                $description = $action['description'];
                $stage_id = $action['stage_id'];
                $id = $action['id'];
                $new_action = new Action($name, $description, $stage_id, $id);
                array_push($actions, $new_action);
            }
            return $actions;
        }

        static function find($search_id)
        {
            $actions = Action::getAll();
            $found_action = null;

            foreach ($actions as $action)
            if (($action->getId()) == $search_id)
            {
                $found_action = $action;
            }
            return $found_action;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM actions;");
        }

    }

?>
