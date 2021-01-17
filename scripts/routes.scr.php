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


Routes::set('login', function(){
    ControllerRoutes::RenderPage('login');
});


Routes::set('register', function(){
    ControllerRoutes::RenderPage('register');
});