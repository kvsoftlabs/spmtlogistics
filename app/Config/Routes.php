<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultController('Main\Home'); // Set default controller
$routes->setDefaultMethod('index'); // Default method
$routes->get('/', 'Main\Home::index'); // Map '/' to Main/Home
$routes->get('/about', 'Main\About::index'); // Map '/' to Main/About
$routes->get('/service', 'Main\Service::index'); // Map '/' to Main/Service
$routes->get('/contact', 'Main\Contact::index'); // Map '/' to Main/Appointment

$routes->post('trip/submit', 'Main\TripController::submit');

// Admin routes
$routes->get('/admin', 'Auth::login'); // Map '/' to Admin/Login
$routes->post('/auth/loginSubmit', 'Auth::loginSubmit');
$routes->get('/logout', 'Auth::logout');
$routes->get('admin/dashboard', 'Dashboard');

$routes->get('trip/accept/(:num)', 'TripController::accept/$1');  // Accept a trip
$routes->get('trip/delete/(:num)', 'TripController::delete/$1');  // Delete a trip

$routes->get('admin/drivers', 'DriverController::index');  // Show the list of drivers
$routes->post('admin/drivers/store', 'DriverController::store');  // Store a new driver
$routes->get('admin/drivers/delete/(:num)', 'DriverController::delete/$1');

$routes->get('admin/customers', 'CustomerController::index');
$routes->post('admin/customers/store', 'CustomerController::store');
$routes->get('admin/customers/delete/(:num)', 'CustomerController::delete/$1');

$routes->get('admin/vehicles', 'VehicleController::index');
$routes->post('admin/vehicles/store', 'VehicleController::store');
$routes->post('admin/vehicles/update', 'VehicleController::update');
$routes->get('admin/vehicle/delete/(:num)', 'VehicleController::delete/$1');


