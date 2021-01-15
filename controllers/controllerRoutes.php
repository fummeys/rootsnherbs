<?php
class ControllerRoutes {
    public static function RenderPage ($route) {
        require_once('./pages/'.$route.'.php');
    }
}