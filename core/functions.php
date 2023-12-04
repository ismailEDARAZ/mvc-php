<?php

function getHeader($path)
{
    $link = VIEW_PATH . $path . ".php";
    ob_start();
    if (file_exists($link)) {
        require $link;
    } else {
        require VIEW_PATH . "errors/404.php";
    }
}

function getFooter($path)
{
    $link = VIEW_PATH . $path . ".php";
    ob_start();
    if (file_exists($link)) {
        require $link;
    } else {
        require VIEW_PATH . "errors/404.php";
    }
}