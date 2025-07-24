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

//Route manajemen User
$routes->get('manajemen-user', 'UserController::index');
$routes->get('/manajemen-user/create', 'UserController::create');
$routes->post('/manajemen-user/store', 'UserController::store');
$routes->get('/manajemen-user/edit/(:num)', 'UserController::edit/$1');
$routes->post('/manajemen-user/update/(:num)', 'UserController::update/$1');
$routes->get('/user/create', 'UserController::create');
$routes->post('/user/store', 'UserController::store');
$routes->get('/user/delete/(:num)', 'UserController::delete/$1');
$routes->get('user', 'UserController::index');
$routes->get('user/edit/(:num)', 'UserController::edit/$1');
$routes->post('user/update/(:num)', 'UserController::update/$1');

//Route manajemen toko
$routes->get('store', 'StoreController::index', ['filter' => 'auth']);
$routes->get('store/create', 'StoreController::create', ['filter' => 'auth']);
$routes->post('store/store', 'StoreController::store', ['filter' => 'auth']);
$routes->get('store/edit/(:num)', 'StoreController::edit/$1', ['filter' => 'auth']);
$routes->post('store/update/(:num)', 'StoreController::update/$1', ['filter' => 'auth']);
$routes->get('store/delete/(:num)', 'StoreController::delete/$1', ['filter' => 'auth']);
