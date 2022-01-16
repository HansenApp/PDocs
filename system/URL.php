<?php

namespace System;

class URL
{
    function add($url, $callback)
    {
        $requrl = $_SERVER["REQUEST_URI"];
        $view = new View();

        if ($requrl == $url) {
            call_user_func($callback, $view);
        } elseif ($requrl == "/cssStyle") {
            $open = fopen(__DIR__ . "/../src/css/style.css", "r");
            echo fread($open, filesize(__DIR__ . "/../src/css/style.css"));
        } elseif ($requrl == "/prismJS") {
            $open = fopen(__DIR__ . "/../src/js/prism.js", "r");
            echo fread($open, filesize(__DIR__ . "/../src/js/prism.js"));
        } elseif ($requrl == "/prismCSS") {
            $open = fopen(__DIR__ . "/../src/css/prism.css", "r");
            echo fread($open, filesize(__DIR__ . "/../src/css/prism.css"));
        }
    }
}
