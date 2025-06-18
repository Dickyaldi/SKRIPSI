<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'auth::register');
$routes->get('/bimbingan', 'BimbinganController::index');
$routes->get('/bimbingan/create', 'BimbinganController::create');
$routes->post('/bimbingan/store', 'BimbinganController::store');
$routes->get('/bimbingan/edit/(:num)', 'BimbinganController::edit/$1');
$routes->post('/bimbingan/update/(:num)', 'BimbinganController::update/$1');
$routes->get('/bimbingan/delete/(:num)', 'BimbinganController::delete/$1');
$routes->get('/bimbingan', 'Bimbingan::index');
$routes->get('/bimbingan/create', 'Bimbingan::create');
$routes->post('/bimbingan/store', 'Bimbingan::store');
$routes->get('bimbingan', 'BimbinganController::index');
$routes->get('bimbingan/create', 'BimbinganController::create');
$routes->post('bimbingan/store', 'BimbinganController::store');
$routes->get('bimbingan/edit/(:num)', 'BimbinganController::edit/$1');
$routes->post('bimbingan/update/(:num)', 'BimbinganController::update/$1');
$routes->get('bimbingan/delete/(:num)', 'BimbinganController::delete/$1');

$routes->get('/login', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/dashboard/mahasiswa', 'Dashboard::mahasiswa', ['filter' => 'auth']);
$routes->get('/dashboard/dosen', 'Dashboard::dosen', ['filter' => 'auth']);
$routes->get('/dashboard/mahasiswa', 'Mahasiswa::mahasiswa');

$routes->get('bimbingan', 'BimbinganController::index');
$routes->get('bimbingan/index', 'BimbinganController::index'); // <- Tambahan ini
$routes->get('bimbingan/create', 'BimbinganController::create');
$routes->post('bimbingan/store', 'BimbinganController::store');
$routes->get('bimbingan/edit/(:num)', 'BimbinganController::edit/$1');
$routes->post('bimbingan/update/(:num)', 'BimbinganController::update/$1');
$routes->get('bimbingan/delete/(:num)', 'BimbinganController::delete/$1');
$routes->post('/bimbingan/store', 'BimbinganController::store');


$routes->get('/seminar', 'JadwalSeminar::index');
$routes->get('/seminar/create', 'JadwalSeminar::create');
$routes->post('/seminar/store', 'JadwalSeminar::store');
$routes->get('/seminar/delete/(:num)', 'JadwalSeminar::delete/$1');

$routes->get('/monitoring', 'Monitoring::index');

$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::storeRegister');

$routes->get('/dashboard/mahasiswa', 'Dashboard::mahasiswa', ['filter' => 'auth']);
$routes->post('/skripsi/upload', 'Dashboard::uploadSkripsi', ['filter' => 'auth']);

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('/dashboard/mahasiswa', 'Dashboard::mahasiswa', ['filter' => 'auth']);

$routes->get('/dashboard/dosen', 'Dashboard::dosen', ['filter' => 'auth']);

