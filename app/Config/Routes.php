<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'LoginController::index');

$routes->post('/login/authenticate', 'LoginController::authenticate');

// Routes for sign up
$routes->post('/signup', 'LoginController::createAccount');

// Route for logout
$routes->get('/logout', 'LoginController::logout');

$routes->post('user/saveBiodata', 'UserController::saveBiodata');

$routes->get('user/list', 'UserController::list');
$routes->get('user/editBiodata/(:num)', 'UserController::editBiodata/$1');
$routes->post('user/updateBiodata/(:num)', 'UserController::updateBiodata/$1');
$routes->get('user/delete/(:num)', 'UserController::delete/$1');




