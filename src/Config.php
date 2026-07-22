<?php

// url base da aplicação
define('APP_ROOT', GetConfig("APP_ROOT"));

// Chaves de acesso da API
define('APP_KEY', GetConfig("APP_KEY"));
define('APP_SECRET', GetConfig("APP_SECRET"));

// modo para depuração
define("DEBUG", GetConfig("APP_DEBUG"));

if(DEBUG){
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);
}

/**
 * Aqui pois o Config precisa desta função
 */
function GetConfig(string $chave)
{
    static $envs;

    if (!$envs) {
        $envs = parse_ini_file('src/Settings.conf');
    }

    return empty($envs[$chave]) ? null : $envs[$chave];
}

function url(string $uri = null): string
{
    if ($uri) {
        return APP_ROOT . "/{$uri}";
    }

    return APP_ROOT;
}