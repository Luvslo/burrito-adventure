<?php

    class Player
    {
        private $name;
        private $money;
        private $inventory;
        private $current_stage;
        private $has_burrito;
        private $id;

        function __construct($name, $money = 0, $inventory, $current_stage, $has_burrito = 0, $id = null)
        {
            $this->name = $name;
            $this->money = $money;
            $this->inventory = $inventory;
            $this->current_stage = $current_stage;
            $this->has_burrito = $has_burrito;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function getMoney()
        {
            return $this->money;
        }

        function getInventory()
        {
            return $this->inventory;
        }

        function getCurrentStage()
        {
            return $this->current_stage;
        }

        function getHasBurrito()
        {
            return $this->has_burrito;
        }

        function getId()
        {
            return $this->id;
        }

        function setName($name)
        {
            $this->name = $name;
        }

        function setMoney($money)
        {
            $this->money = $money;
        }

        function setInventory($inventory)
        {
            $this->inventory = $inventory;
        }

        function setCurrentStage($current_stage)
        {
            $this->current_stage = $current_stage;
        }

        function setHasBurrito($has_burrito)
        {
            $this->has_burrito = $has_burrito;
        }


    }
?>
