<?php

Routes::set('', function(){
    ControllerRoutes::RenderPage('login');
});
Routes::set('/', function(){
    ControllerRoutes::RenderPage('login');
});


Routes::set('index', function(){
    ControllerRoutes::RenderPage('index');
});
Routes::set('login', function(){
    ControllerRoutes::RenderPage('login');
});
Routes::set('profile', function(){
    ControllerRoutes::RenderPage('profile');
});
Routes::set('registeradmin', function(){
    ControllerRoutes::RenderPage('registeradmin');
});
Routes::set('register', function(){
    ControllerRoutes::RenderPage('register');
});
Routes::set('rank', function(){
    ControllerRoutes::RenderPage('rank');
});
Routes::set('dashboard', function(){
    ControllerRoutes::RenderPage('dashboard');
});

Routes::set('forgot-password', function(){
    ControllerRoutes::RenderPage('forgot-password');
});



Routes::set('bonuses', function(){
    ControllerRoutes::RenderPage('bonuses');
});
Routes::set('issuebv', function(){
    ControllerRoutes::RenderPage('issuebv');
});
Routes::set('/users.php', function(){
    ControllerRoutes::RenderPage('users');
});

Routes::set('404', function(){
    ControllerRoutes::RenderPage('404');
});

