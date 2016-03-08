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
        return $this->id;
    }

    function death($reason)
    //Move this to stage class?
    {
        echo ($reason + " GAME OVER");
        // exit(0);
    }

}

 ?>
