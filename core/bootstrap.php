<?php

use App\Core\App;

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

function view($name, $data = [])
{
    extract($data);
    return require "app/views/{$name}.view.php";
}

function redirect($uri_path)
{
    header("Location: {$uri_path}");
}

function dd($dumped_val)
{
    echo '<pre>';
    die(var_dump($dumped_val));
    echo '</pre>';
}	// dump and die

function sanitize($input)
{
    return htmlspecialchars($input);
}
