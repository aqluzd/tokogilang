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
$routes->group('store', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'StoreController::index');
    $routes->get('create', 'StoreController::create');
    $routes->post('store', 'StoreController::store');
    $routes->get('edit/(:num)', 'StoreController::edit/$1');
    $routes->post('update/(:num)', 'StoreController::update/$1');
    $routes->get('delete/(:num)', 'StoreController::delete/$1');
});
//Route Store Selector
$routes->get('store/setActive/(:num)', 'StoreController::setActive/$1');
$routes->get('set-active-store/(:num)', 'StoreSelectorController::setActive/$1');

//Route Product
$routes->group('product', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'ProductController::index');
    $routes->get('product/create', 'ProductController::create');
    $routes->post('product/store', 'ProductController::store');
    $routes->get('product/edit/(:num)', 'ProductController::edit/$1');
    $routes->post('product/update/(:num)', 'ProductController::update/$1');
    $routes->get('product/delete/(:num)', 'ProductController::delete/$1');
});

//Route Supplier
$routes->group('supplier', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'SupplierController::index');
    $routes->get('create', 'SupplierController::create');
    $routes->post('store', 'SupplierController::store');
    $routes->get('edit/(:num)', 'SupplierController::edit/$1');
    $routes->post('update/(:num)', 'SupplierController::update/$1');
    $routes->get('delete/(:num)', 'SupplierController::delete/$1');
});
