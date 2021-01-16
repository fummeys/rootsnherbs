<?php

Routes::set('', function(){
    ControllerRoutes::RenderPage('index');
});
Routes::set('/', function(){
    ControllerRoutes::RenderPage('index');
});

Routes::set('index', function(){
    ControllerRoutes::RenderPage('index');
});

Routes::set('404', function(){
    ControllerRoutes::RenderPage('404');
});