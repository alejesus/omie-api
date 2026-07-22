<?php

ob_start();
session_start();
set_time_limit(600);

// Carrega componentes
require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$route = new Router(APP_ROOT);

/**
 * APP path
 */
   $route->namespace("Source\App");

/**
 * Controllers
 */
   $route->group(null);
   $route->get("/", "Web:home");
   $route->get("/home", "Web:home");
   $route->get("/info", "Web:info");
   $route->get("/testes", "Web:testes");
   $route->get("/contato", "Web:contato");

/**
 * Group Error
 * This monitors all Router errors.
 * Are they: 400 Bad Request, 404 Not Found, 405 Method Not Allowed and 501 Not Implemented
 */
   $route->group("error");
   $route->get("/{errcode}", function ($data) {
      echo "Error ", $data["errcode"];
   });

/**
 * This method executes the routes
 */
   $route->dispatch();

/**
 * Redirect all errors
 */
   if ($route->error()) {
      $route->redirect("/error/{$route->error()}");
   }

ob_end_flush();
