<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Inventory.php";
    require_once __DIR__."/../src/Player.php";
    require_once __DIR__."/../src/Stage.php";
    require_once __DIR__."/../src/Game.php";
    require_once __DIR__."/../src/Action.php";

    $app = new Silex\Application();

    $app['debug'] = true;

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $server = 'mysql:host=localhost;dbname=burritos';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array(
            'form' => true,
        ));
    });

    $app->post("/landing_page", function() use ($app) {
        //GAME_ID IS CURRENTLY HARD CODED TO 1
        //MIGHT NEED TO BE CHANGED?
        $player = new Player ($_POST['player_name'], 1);
        $player->save();
        $stage = Stage::find(101);
        
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player,
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'message' => array(
            )
        ));
    });

    $app->post("/snooze", function() use ($app) {
        //GAME_ID IS CURRENTLY HARD CODED TO 1
        //MIGHT NEED TO BE CHANGED?
        $player = Player::getAll();
        $stage = Stage::find(101);
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'message' => array(
                'type' => 'info',
                'text' => 'You hit the snooze for another 9 minutes.'
            )
        ));
    });

    $app->post("/clean_room", function() use ($app) {
        //GAME_ID IS CURRENTLY HARD CODED TO 1
        //MIGHT NEED TO BE CHANGED?

        //remove ability to click clean room again
        $player = Player::getAll();
        $stage = Stage::find(101);
        $money = new Money();
        $money->addMoney(2);
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'message' => array(
                'type' => 'info',
                'text' => 'You cleaned your room, and found $5! SWEET!'
            )
        ));
    });

    $app->get("/stage/{id}", function($id) use ($app) {
        $stage = Stage::find($id);
        $player = Player::getAll();
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'message' => array(
            )
        ));
    });
//102
    $app->post("/get_sunscreen", function() use ($app) {
        //GAME_ID IS CURRENTLY HARD CODED TO 1
        //MIGHT NEED TO BE CHANGED?
        $player = Player::getAll();
        $stage = Stage::find(102);
        $sunscreen = Inventory::find(4);
        $sunscreen->putInInventory('sunscreen');
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'message' => array(
                'type' => 'info',
                'text' => 'You grabbed the sunscreen! Way to be health-conscious!'
            )
        ));
    });

    $app->post("/get_keys", function() use ($app) {
        //GAME_ID IS CURRENTLY HARD CODED TO 1
        //MIGHT NEED TO BE CHANGED?
        $player = Player::getAll();
        $stage = Stage::find(102);
        $keys = Inventory::find(1);
        $keys->putInInventory('keys');

        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'message' => array(
                'type' => 'info',
                'text' => 'You grabbed the keys! Hopefully they will come in handy!'
            )
        ));
    });

    $app->post("/get_phone", function() use ($app) {
        //GAME_ID IS CURRENTLY HARD CODED TO 1
        //MIGHT NEED TO BE CHANGED?
        $player = Player::getAll();
        $stage = Stage::find(102);
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'message' => array(
                'type' => 'info',
                'text' => 'You grabbed the phone! Maybe you can use it later to call some peeps.'
            )
        ));
    });
//103
    $app->post("/take_frozen_burrito", function() use ($app) {
        //GAME_ID IS CURRENTLY HARD CODED TO 1
        //MIGHT NEED TO BE CHANGED?
        $player = Player::getAll();
        $stage = Stage::find(103);
        $frozen_burrito = Inventory::find(2);
        $frozen_burrito->putInInventory('frozen burrito');
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'message' => array(
                'type' => 'info',
                'text' => 'You took the frozen burrito!'
            )
        ));
    });
//add death function

//104
    // $app->post("/ride_bike", function() use ($app) {
    //
    //     //GAME_ID IS CURRENTLY HARD CODED TO 1
    //     //MIGHT NEED TO BE CHANGED?
    //     $player = Player::getAll();
    //     $stage = Stage::find(301);
    //     return $app['twig']->render('stage.html.twig', array(
    //         'player' => $player[0],
    //         'description' => $stage->getDescription(),
    //         'stage' => $stage,
    //         'message' => array(
    //             'type' => 'warning',
    //             'text' => 'You ate the frozen burrito AND DIED!'
    //         )
    //     ));
    // });
//401
    $app->get("/ask_for_burrito", function() use ($app) {
        $player = Player::getAll();
        $stage = Stage::find(401);
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'message' => array(

            )
        ));
    });

    $app->post("/take_man_burrito", function() use ($app) {
        $player = Player::getAll();
        $stage = Stage::find(401);
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'message' => array(

            )
        ));
    });

    return $app;
?>
