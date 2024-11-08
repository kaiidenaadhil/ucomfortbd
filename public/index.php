<?php
session_start();
include "../app/init.php";
date_default_timezone_set('UTC');
$app = new app(dirname(__DIR__));
// $app->router->get('/init', [InstallController::class, 'index']);
// $app->router->post('/init', [InstallController::class, 'index']);
// $app->router->get('/export', [InstallController::class, 'export']);
// $app->router->get('/language','language-switcher');
// $app->router->post('/language', [LanguageController::class, 'switchLanguage']);

include "../app/route.php";

//$routes = $app->router->getRoutes();
// foreach ($routes['get'] as $routePath => $callback) {
//         echo "<pre>";
//     echo $routePath . "\n";
//     echo "</pre>";
// }
$app->run();