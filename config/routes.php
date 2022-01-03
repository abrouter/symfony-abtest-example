<?php

use App\Controller\IndexController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->add('index', '/')->controller([IndexController::class, 'index']);
};
