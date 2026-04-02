<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('startup', 'Startup::index');
$routes->get('/startup/tambah_startup', 'Startup::tambah_startup');

$routes->post('startup/simpan', 'Startup::simpan');

$routes->get('/startup/ubah_startup/(:any)', 'Startup::ubah_startup/$1');
$routes->post('/startup/update', 'Startup::update');

$routes->get('/startup/detail_startup/(:any)', 'Startup::detail_startup/$1');
$routes->get('/startup/generate-uuid', 'Startup::generate_uuid_existing');
$routes->post('startup/simpan_tim', 'Startup::simpan_tim');
$routes->post('startup/update_tim/(:num)', 'Startup::update_tim/$1');
$routes->post('startup/hapus_tim/(:num)', 'Startup::hapus_tim/$1');
$routes->post('startup/hapus/(:any)', 'Startup::hapus/$1');
