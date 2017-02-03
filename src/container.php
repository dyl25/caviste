<?php

// Get container
$container = $app->getContainer();

/* Redbean connection */
\R::setup('mysql:host=localhost;dbname=cavavin', 'root', '');

// Register component on container
$container['view'] = function ($container) {

    $dir = dirname(__DIR__);

    $view = new \Slim\Views\Twig($dir . '/src/views', [
        'cache' => false, //$dir . '/tmp/cache'
        'debug' => true
    ]);

// Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

$container['pdo'] = function($container) {
    $pdo = new PDO('mysql:dbname=cavavin;host=localhost', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
};

/*$container['db'] = function($container) {
    return $container->pdo);
};*/

$container['winesModel'] = function($container) {
    return new Src\Models\WinesModel($container);
};