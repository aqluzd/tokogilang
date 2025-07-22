<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::doLogin');
$routes->get('/logout', 'Auth::logout');
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('manajemen-user', 'UserController::index');
$routes->get('/manajemen-user/create', 'UserController::create');
$routes->post('/manajemen-user/store', 'UserController::store');
$routes->get('/manajemen-user/edit/(:num)', 'UserController::edit/$1');
$routes->post('/manajemen-user/update/(:num)', 'UserController::update/$1');
$routes->get('/user/create', 'UserController::create');
$routes->post('/user/store', 'UserController::store');
$routes->get('/user/delete/(:num)', 'UserController::delete/$1');
$routes->get('user', 'UserController::index');

