<?php

Routes::set('', function(){
    ControllerRoutes::RenderPage('login');
});
Routes::set('/', function(){
    ControllerRoutes::RenderPage('login');
});


Routes::set('index.php', function(){
    ControllerRoutes::RenderPage('index');
});
Routes::set('/login.php', function(){
    ControllerRoutes::RenderPage('login');
});
Routes::set('/profile.php', function(){
    ControllerRoutes::RenderPage('profile');
});
Routes::set('/registeradmin.php', function(){
    ControllerRoutes::RenderPage('registeradmin');
});
Routes::set('/register.php', function(){
    ControllerRoutes::RenderPage('register');
});
Routes::set('/rank.php', function(){
    ControllerRoutes::RenderPage('rank');
});
Routes::set('/dashboard.php', function(){
    ControllerRoutes::RenderPage('dashboard');
});


Routes::set('/bonuses.php', function(){
    ControllerRoutes::RenderPage('bonuses');
});
Routes::set('/issuebv.php', function(){
    ControllerRoutes::RenderPage('issuebv');
});

Routes::set('404', function(){
    ControllerRoutes::RenderPage('404');
});