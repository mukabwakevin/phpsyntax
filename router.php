<?php

$routes = require('routes.php');
function routesToController($addressString, $routesArray)
{
    if (array_key_exists($addressString, $routesArray)) {
        require $routesArray[$addressString];
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code(404);

    require "views/{$code}.php";

    die();
}

$uri = parse_url($_SERVER['REQUEST_URI']) ['path'];
routesToController($uri, $routes);
