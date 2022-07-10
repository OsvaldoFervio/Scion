<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/signup', 'Register::index');
$routes->post('/signup/new', 'Register::create');
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::post');
$routes->post('/logout', 'Logout::post');

$routes->group('admin', function($routes) {
    $routes->get('/events/new', 'Admin\Events::new');
    $routes->post('/events/create', 'Admin\Events::create');
    $routes->get('/events/edit/(:num)', 'Admin\Events::edit/$1');
    $routes->put('/events/(:num)', 'Admin\Events::updated/$1');
    $routes->delete('/events/delete/(:num)', 'Admin\Events::delete/$1');

    $routes->group('teams', static function($routes) {
        $routes->post('create', 'Admin\Teams::create');
        $routes->post('(:num)/participants', 'Admin\Participants::join/$1');
    });

    $routes->group('videogames', function($routes) {
        $routes->get('/', 'Admin\Videogames::index');
        $routes->get('/new', 'Admin\Videogames::new');
        $routes->post('/create', 'Admin\Videogames::create');
        $routes->get('(:num)', 'Admin\Videogames::show/$1');
        $routes->get('/edit/(:num)', 'Admin\Videogames::edit/$1');
        $routes->put('/update/(:num)', 'Admin\Videogames::update/$1');
        $routes->delete('/delete/(:num)', 'Admin\Videogames::delete/$1');
    });
});

$routes->get('/events/(:num)', 'Events::show/$1');
$routes->group('teams', function($routes) {
    $routes->get('/', 'Teams::index');
    $routes->get('new', 'Teams::new');
    $routes->post('/teams/create', 'Teams::create');
    $routes->get('(:num)', 'Teams::show/$1');
    $routes->get('/edit/(:num)', 'Teams::edit/$1');
    $routes->put('/update/(:num)', 'Teams::update/$1');
    $routes->delete('/delete/(:num)', 'Teams::delete/$1');
});
$routes->get('/api/users', 'Api\ApiController::index');
$routes->get('/api/users/verify', 'Api\ApiController::verify');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
