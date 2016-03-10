<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Inventory.php";
    require_once __DIR__."/../src/Player.php";
    require_once __DIR__."/../src/Stage.php";
    require_once __DIR__."/../src/Game.php";
    require_once __DIR__."/../src/Action.php";
    require_once __DIR__."/../src/Money.php";

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
        Player::deleteAll();
        return $app['twig']->render('index.html.twig', array(
            'form' => true,
        ));
    });

    $app->post("/landing_page", function() use ($app) {
        Inventory::reset();
        $player = new Player ($_POST['player_name'], 1);
        $player->save();
        $stage = Stage::find(101);
        $inventories = Inventory::isInInventory();
        Money::reset();
        $money = Money::getAll();
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player,
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'money' => $money->getValue(),
            'message' => array(
            ),
            'inventories' => $inventories
        ));
    });

    $app->post("/snooze", function() use ($app) {
        $player = Player::getAll();
        $stage = Stage::find(101);
        $inventories = Inventory::isInInventory();
        $money = Money::getAll();
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'inventories' => $inventories,
            'money' => $money->getValue(),
            'message' => array(
                'type' => 'info',
                'text' => 'You hit the snooze for another 9 minutes.'
            )
        ));
    });
//add find money to clean room
    $app->post("/clean_room", function() use ($app) {
        //remove ability to click clean room again
        $player = Player::getAll();
        $stage = Stage::find(101);
        $money = Money::getAll();
        $money->addMoney(2);
        $inventories = Inventory::isInInventory();
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'inventories' => $inventories,
            'money' => $money->getValue(),
            'message' => array(
                'type' => 'info',
                'text' => 'You cleaned your room, and found $2! SWEET!'
            )
        ));
    });

    $app->get("/stage/{id}", function($id) use ($app) {
        $stage = Stage::find($id);
        $player = Player::getAll();
        $inventory = Inventory::getAll();
        $inventories = Inventory::isInInventory();
        $money = Money::getAll();
        $has_keys = 0;
        $has_frozen_burrito = 0;
        $has_cactus = 0;
        $has_sunscreen = 0;
        $has_bumhelp = 0;
        foreach ($inventories as $item){
            if ($item->getName() == 'Keys')
            {
                $has_keys = 1;
            }
            elseif ($item->getName() == 'Frozen Burrito') {
                $has_frozen_burrito = 1;
            }
            elseif ($item->getName() == 'Cactus') {
                $has_cactus = 1;
            }
            elseif ($item->getName() == 'Sunscreen') {
                $has_sunscreen = 1;
            }
            elseif ($item->getName() == 'Bum IOU') {
                $has_bumhelp = 1;
            }
        }
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'has_keys' => $has_keys,
            'has_frozen_burrito' => $has_frozen_burrito,
            'has_cactus' => $has_cactus,
            'has_sunscreen' => $has_sunscreen,
            'has_bumhelp' => $has_bumhelp,
            'money' => $money->getValue(),
            'inventories' => $inventories,
            'inventory' => $inventory,
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
        $inventories = Inventory::isInInventory();
        $money = Money::getAll();
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'money' => $money->getValue(),
            'inventories' => $inventories,
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
        $money = Money::getAll();
        $inventories = Inventory::isInInventory();
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'money' => $money->getValue(),
            'inventories' => $inventories,
            'message' => array(
                'type' => 'info',
                'text' => 'You grabbed the keys! Hopefully they will come in handy!'
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
        $inventories = Inventory::isInInventory();
        $money = Money::getAll();
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'money' => $money->getValue(),
            'inventories' => $inventories,
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
        $inventories = Inventory::isInInventory();
        $money = Money::getAll();
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'money' => $money->getValue(),
            'inventories' => $inventories,
            'message' => array(

            )
        ));
    });

    $app->post("/take_man_burrito", function() use ($app) {
        $player = Player::getAll();
        $stage = Stage::find(401);
        $inventories = Inventory::isInInventory();
        $money = Money::getAll();
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'money' => $money->getValue(),
            'inventories' => $inventories,
            'message' => array(

            )
        ));
    });

    $app->post("/help_bum", function() use ($app) {
        $player = Player::getAll();
        $money = Money::getAll();
        $stage = Stage::find(602);
        $bumhelp = Inventory::find(5);
        $bumhelp->putInInventory('bumhelp');
        $inventories = Inventory::isInInventory();
        $money = Money::getAll();
        $money->subtractMoney(1);
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'money' => $money->getValue(),
            'stage' => $stage,
            'inventories' => $inventories,
            'message' => array(

            )
        ));
    });

    $app->post("/take_cactus", function() use ($app) {
        //GAME_ID IS CURRENTLY HARD CODED TO 1
        //MIGHT NEED TO BE CHANGED?
        $player = Player::getAll();
        $stage = Stage::find(502);
        $cactus = Inventory::find(3);
        $cactus->putInInventory('cactus');
        $inventories = Inventory::isInInventory();
        $money = Money::getAll();
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'money' => $money->getValue(),
            'inventories' => $inventories,
            'message' => array(
                'type' => 'info',
                'text' => 'You grabbed the cactus! Maybe it will come in handy later!'
            )
        ));
    });

    $app->post("/loot_purse", function() use ($app) {
        //GAME_ID IS CURRENTLY HARD CODED TO 1
        //MIGHT NEED TO BE CHANGED?
        $player = Player::getAll();
        $stage = Stage::find(502);
        $inventories = Inventory::isInInventory();
        $money = Money::getAll();
        $money->addMoney(8);
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
            'money' => $money->getValue(),
            'inventories' => $inventories,
            'message' => array(
                'type' => 'info',
                'text' => 'You looted Wandas purse! YOU SLY DOG! You scored $8 from that trickery!'
            )
        ));
    });
    return $app;
?>
