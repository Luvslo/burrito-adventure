<?php
    class Money
    {
        private $value;

        function __construct($value = 1)
        {
            $this->value = $value;
        }

        function setValue($value)
        {
            $this->value = $value;
        }

        function getValue()
        {
            return $this->value;
        }

        function addMoney($added_value)
        {
            return $this->value += $added_value;
        }
    }
 ?>
