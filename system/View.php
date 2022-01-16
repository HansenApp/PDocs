<?php

namespace System;

require_once __DIR__ . "/../vendor/erusev/parsedown/Parsedown.php";

use Parsedown;

class View
{
    function render($file = "")
    {
        $config = require_once __DIR__ . "/../app.php";
        $md = new Parsedown();
        echo "
<html>
    <head>
        <link rel='stylesheet' href='/cssStyle'>
        " . '<link rel="stylesheet" href="https://unpkg.com/@highlightjs/cdn-assets@11.4.0/styles/dark.min.css">
        <script src="https://unpkg.com/@highlightjs/cdn-assets@11.4.0/highlight.min.js"></script>
        <script src="https://unpkg.com/@highlightjs/cdn-assets@11.4.0/languages/go.min.js"></script>' . "
        <script>hljs.highlightAll();</script>
    </head>
    <body>
    <aside>
    <div class='h3'>" . $config["name"] . "</div>
    <ul>";
        foreach ($config["sidebar"]["sidebarConfig"] as $sidebar) {
            echo "<li><a href='" . $sidebar["link"] . "'>" . $sidebar["title"] . "</a></li>";
        }
        echo "
    </ul>
    </aside>
        <div id='app'>
            " . $md->parse(fread(fopen(__DIR__ . "/../src/pages/$file.md", "r"), filesize(__DIR__ . "/../src/pages/$file.md"))) . "
        </div>

    </body>
</html>
";
    }
}
