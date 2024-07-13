<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/team', 'Home::team');

//admin
$routes->get('/login', 'Auth::login');
$routes->post('/auth/loginCheck', 'Auth::loginCheck');
$routes->get('/auth/logout', 'Auth::logout');

$routes->get('/admin/dashboard', 'Admin::dashboard');

$routes->get('/admin/Penyakit', 'Admin::penyakit');
$routes->get('/admin/Penyakit', 'Admin::addPenyakit');
$routes->post('/admin/savePenyakit', 'Admin::savePenyakit');
$routes->get('/delete-penyakit/(:num)', 'Admin::deletePenyakit/$1');

$routes->get('/admin/Gejala', 'Admin::gejala');
$routes->get('/admin/Gejala', 'Admin::addGejala');
$routes->post('/admin/saveGejala', 'Admin::saveGejala');
$routes->get('/delete-gejala/(:num)', 'Admin::deleteGejala/$1');

$routes->get('/admin/Rule', 'Admin::rule');
$routes->get('/admin/Rule', 'Admin::addRule');
$routes->post('/admin/saveRule', 'Admin::saveRule');
$routes->get('/delete-rule/(:num)', 'Admin::deleteRule/$1');

$routes->get('/admin/Solusi', 'Admin::solusi');
$routes->get('/admin/Solusi', 'Admin::addSolusi');
$routes->post('/admin/saveSolusi', 'Admin::saveSolusi');

//user
$routes->get('/', 'Konsultasi::index');
$routes->get('/konsultasi', 'Konsultasi::konsultasi');
$routes->post('/konsultasi/start', 'Konsultasi::start');
$routes->get('/pertanyaan', 'Konsultasi::pertanyaan');
$routes->post('/konsultasi/jawaban', 'Konsultasi::jawaban');
$routes->get('/hasil', 'Konsultasi::hasil');
$routes->post('/konsultasi/cekHasil', 'Konsultasi::cekHasil');
//$routes->get('/cetak_laporan', 'Laporan::cetakPDF');
$routes->get('/laporan_pdf', 'Konsultasi::cetakPDF');
$routes->get('/cetak_laporan', 'Konsultasi::cetakPDF');




