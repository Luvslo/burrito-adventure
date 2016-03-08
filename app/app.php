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

    $app->post("/stage/1", function() use ($app) {
        //GAME_ID IS CURRENTLY HARD CODED TO 1
        //MIGHT NEED TO BE CHANGED?
        $player = new Player ($_POST['player_name'], 1);
        $player->save();
        $stage = Stage::find(1);
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player,
            'description' => $stage->getDescription(),
            'stage' => $stage
        ));
    });

    $app->post("/stage/{id}", function($id) use ($app) {
        $stage = Stage::find($id);
        $player = Player::getAll();
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage
        ));
    });

    $app->post("/snooze", function() use ($app) {
        //GAME_ID IS CURRENTLY HARD CODED TO 1
        //MIGHT NEED TO BE CHANGED?
        $player = Player::getAll();
        $stage = Stage::find(1);
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
        ));
    });

    $app->post("/clean_room", function() use ($app) {
        //GAME_ID IS CURRENTLY HARD CODED TO 1
        //MIGHT NEED TO BE CHANGED?

        //remove ability to click clean room again
        $player = Player::getAll();
        $stage = Stage::find(1);
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
        ));
    });

    $app->get("/stage/2", function() use ($app) {
        $player = Player::getAll();
        $stage = Stage::find(2);
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,

        ));
    });

    $app->post("/get_sunscreen", function() use ($app) {
        //GAME_ID IS CURRENTLY HARD CODED TO 1
        //MIGHT NEED TO BE CHANGED?
        $player = Player::getAll();
        $stage = Stage::find(2);
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
        ));
    });

    $app->post("/get_keys", function() use ($app) {
        //GAME_ID IS CURRENTLY HARD CODED TO 1
        //MIGHT NEED TO BE CHANGED?
        $player = Player::getAll();
        $stage = Stage::find(2);
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
        ));
    });

    $app->post("/get_phone", function() use ($app) {
        //GAME_ID IS CURRENTLY HARD CODED TO 1
        //MIGHT NEED TO BE CHANGED?
        $player = Player::getAll();
        $stage = Stage::find(2);
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
        ));
    });

    $app->get("/stage/3", function() use ($app) {
        $player = Player::getAll();
        $stage = Stage::find(3);
        return $app['twig']->render('stage.html.twig', array(
            'player' => $player[0],
            'description' => $stage->getDescription(),
            'stage' => $stage,
        ));
    });

    return $app;
?>
