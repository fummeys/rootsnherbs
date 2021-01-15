<?php


class Routes {
    public static $validpaths = [];
    public static function set($route, $function){
        self::$validpaths[] = $route;
        if ($_GET['url'] == $route) {
            // print_r(self::$validpaths);
            $function->__invoke();
        }
    }
}