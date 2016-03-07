<?php
class Game
{
    private $id;

    function __construct($id = null)
    {
        $this->id = $id;
    }

    function getId()
    {
        return $this->getId();
    }

    function death($reason)
    {
        echo ($reason + "Game over!");
        exit(0);
    }

}

 ?>
