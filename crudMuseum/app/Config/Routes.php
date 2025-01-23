<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Ruta para la bienvenida
$routes->get('/', 'WelcomeController::index');  // Esta carga la vista welcome

// Rutas para Crud (Usuarios)
$routes->get('/users', 'Crud::index');  // Muestra la lista de usuarios
$routes->get('/getUser/(:any)', 'Crud::getUser/$1');
$routes->get('/delete/(:any)', 'Crud::delete/$1');
$routes->post('/create', 'Crud::create');
$routes->post('/update/(:num)', 'Crud::update/$1');

// Rutas para Museums
$routes->get('/museums', 'MuseumController::index'); // Muestra todos los museos
$routes->get('/getMuseum/(:num)', 'MuseumController::getMuseum/$1'); // Muestra el formulario de edición para un museo específico
$routes->post('/museums/update/(:num)', 'MuseumController::update/$1'); // Actualiza un museo específico
$routes->get('/museums/delete/(:num)', 'MuseumController::delete/$1'); // Elimina un museo específico
$routes->post('/museums/create', 'MuseumController::create'); // Procesa el formulario para crear un museo

