<?php
    class Money
    {
        private $value;
        private $id;

        function __construct($value = 1, $id = null)
        {
            $this->value = $value;
            $this->id = $id;
        }

        function setValue($value)
        {
            $this->value = $value;
        }

        function getValue()
        {
            return $this->value;
        }

        function getId()
        {
            return $this->id;
        }

        function addMoney($added_value)
        {
            $value = $this->getValue();
            $new_value = $value + $added_value;
            $GLOBALS['DB']->exec("UPDATE money SET value = {$new_value};");
            $this->setValue($new_value);
            return $new_value;
        }

        function subtractMoney($sub_value)
        {
            $value = $this->getValue();
            $new_value = $value - $sub_value;
            $GLOBALS['DB']->exec("UPDATE money SET value = {$new_value};");
            $this->setValue($new_value);
            return $new_value;
        }

        static function getAll()
        {
            $new_money = null;
            $money = $GLOBALS['DB']->query("SELECT * FROM money;");
            foreach ($money as $object) {
                $value = $object['value'];
                $id = $object['id'];
                $new_money = new Money($value, $id);
            }
            return $new_money;
        }

        static function reset()
        {
            $GLOBALS['DB']->exec("UPDATE money SET value = 1;");
        }
    }
 ?>
