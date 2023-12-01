<?php

namespace Core;

class View 
{
    public string $path;
    public array $params;

    public function __construnt($path, $params)
    {
        $this->path = $path;
        $this->params = $params;
    }

    public static function make(string $path, array $params = null)
    {
        $path = VIEW_PATH . $path . ".php";
        ob_start();
        if(!is_null($params)){
            extract($params);
        }
        if (file_exists($path)) {
            require $path;
        } else {
            require VIEW_PATH . "errors/404.php";
        }

        return ob_get_clean();
    }
}