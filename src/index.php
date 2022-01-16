<?php

require_once __DIR__ . "/../vendor/autoload.php";

use System\URL;
use System\View;

$url = new URL;

$url->add("/", function (View $view) {
    $view->render("index");
});

$url->add("/main", function (View $view) {
    $view->render("main");
});
