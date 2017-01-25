<?php

// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {

    $dir = dirname(__DIR__);

    $view = new \Slim\Views\Twig($dir . '/src/views', [
        'cache' => false //$dir . '/tmp/cache'
    ]);

// Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

$container['pdo'] = function($container) {
    $pdo = new PDO('mysql:dbname=cavavin;host=localhost', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
};

/*$container['db'] = function($container) {
    return $container->pdo);
};*/

$container['winesModel'] = function($container) {
    return new Src\Models\WinesModel($container);
};
