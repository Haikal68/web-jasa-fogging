<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(true);

$routes->get('/', 'user::index');
$routes->get('/admin', 'admin::index', ['filter' => 'role:admin,manager', 'login']);
$routes->get('/admin/orders', 'admin::orders', ['filter' => 'role:admin,manager', 'login']);
$routes->get('/admin/services', 'admin::Services', ['filter' => 'role:admin,manager', 'login']);
$routes->get('/admin/detailOrder/(:num)', 'admin::detailorder', ['filter' => 'role:admin,manager', 'login']);
$routes->get('/admin/index', 'admin::index', ['filter' => 'role:admin,manager', 'login']);
$routes->get('/admin/filterOrders', 'admin::filterOrders', ['filter' => 'role:manager', 'login']);
$routes->get('/user/getForm/(:num)', 'user::getForm/$1', ['filter' => 'login']);
$routes->get('/worker', 'worker::index', ['filter' => 'role:worker', 'login']);
$routes->get('/worker/orderan', 'worker::order', ['filter' => 'role:worker',  'login']);
$routes->get('/worker/prosesOrder', 'worker::prosesOrder', ['filter' => 'role:worker', 'login']);

// $routes->get('/dashboard', 'Home::dashboard');
