<?php

// Routes
// 
//Affichage d'un vin grâce à nom
$app->get('/api/wines/search/{name}', Src\Controllers\WinesController::class . ':search');

//Affichage d'un vin grâce à son id
$app->get('/api/wines/{id}', Src\Controllers\WinesController::class . ':index');

//Affichage de tous les vins disponiblent
$app->get('/api/wines', Src\Controllers\WinesController::class . ':index');

//Ajout de vin
$app->post('/api/wines', Src\Controllers\WinesController::class . ':add');
