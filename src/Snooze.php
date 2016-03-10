<?php
    class Snooze
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

        function addSnooze($added_value)
        {
            $value = $this->getValue();
            $new_value = $value + $added_value;
            $GLOBALS['DB']->exec("UPDATE snooze SET value = {$new_value};");
            $this->setValue($new_value);
            return $new_value;
        }

        static function getAll()
        {
            $new_snooze = null;
            $snooze = $GLOBALS['DB']->query("SELECT * FROM snooze;");
            foreach ($snooze as $object) {
                $value = $object['value'];
                $id = $object['id'];
                $new_snooze = new Snooze($value, $id);
            }
            return $new_snooze;
        }

        static function reset()
        {
            $GLOBALS['DB']->exec("UPDATE snooze SET value = 1;");
        }
    }
 ?>
