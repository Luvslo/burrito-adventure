<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Inventory.php";
    require_once __DIR__."/../src/Player.php";
    require_once __DIR__."/../src/Stage.php";
    require_once __DIR__."/../src/Game.php";

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
        $players = Player::getAll();

        return $app['twig']->render('index.html.twig', array(
            'players' => $players,
            'form' => true,

        ));
    });

    $app->post("/stage/1", function() use ($app) {

        $players = Player::getAll();

        $stage = Stage::find(1);
        return $app['twig']->render('stage.html.twig', array(
            'players' => $players,
            'description' => $stage->getDescription(),
            'stage' => $stage
        ));
    });



    return $app;
?>
