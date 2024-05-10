<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(true);

$routes->get('/', 'user::index');
$routes->get('/admin', 'admin::index', ['filter' => 'role:admin,manager', 'login']);
$routes->get('/admin/index', 'admin::index', ['filter' => 'role:admin,manager', 'login']);
// $routes->get('/dashboard', 'Home::dashboard');
