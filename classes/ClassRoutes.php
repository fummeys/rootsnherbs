<?php
include_once('./scripts/config.scr.php');


class Routes {
    public static $validpaths = [];
    public static function set($route, $function){
        self::$validpaths[] = $route;
        global $uri;
        if ($uri == $route) {
            // print_r(self::$validpaths);
            $function->__invoke();
        }
    }
}