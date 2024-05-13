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
$routes->post('/user/getForm/(:num)', 'user::pesan', ['filter' => 'login']);
$routes->get('/worker', 'worker::index', ['role:worker', 'filter' => 'login']);
$routes->get('/worker/prosesOrder', 'worker::prosesOrder', ['role:worker', 'filter' => 'login']);

// $routes->get('/dashboard', 'Home::dashboard');
