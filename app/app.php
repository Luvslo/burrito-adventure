<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Inventory.php";
    require_once __DIR__."/../src/Player.php";
    require_once __DIR__."/../src/Stage.php";
    require_once __DIR__."/../src/Game.php";

    $app = new Silex\Application();

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
        return $app['twig']->render('index.html.twig', array('players' => $players));
    });

    $app->get("/player_info", function() use ($app) {
        $players = Player::getAll();

        return $app['twig']->render('index.html.twig', array(
            'form' => true,
            'players' => $players
        ));
    });

    return $app;
?>
