<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. RUTE PUBLIK (WAJIB DI LUAR GRUP FILTER)
// --------------------------------------------------------------------
// Halaman Login & Register harus bisa diakses tanpa login.
$routes->get('login', 'Auth::login'); 
$routes->get('register', 'Auth::register'); 

// Rute POST ini harus sesuai dengan action pada <form> Anda.
// Jika di view register.php action-nya "/auth/attemptRegister", maka tulis rutenya di sini.
$routes->post('auth/attemptRegister', 'Auth::attemptRegister'); 
$routes->post('auth/attemptLogin', 'Auth::attemptLogin'); 

// 2. RUTE TERPROTEKSI (Wajib Login)
// --------------------------------------------------------------------
// Semua rute di dalam grup ini akan diperiksa oleh 'auth' filter.
$routes->group('', ['filter' => 'auth'], function($routes) {

    // --- Home & Dashboard ---
    $routes->get('/', 'Home::index');
    $routes->get('dashboard', 'Home::index');

    // --- Manajemen Karyawan ---
    $routes->get('employees', 'Employees::index');
    $routes->post('employees/store', 'Employees::store');
    $routes->get('employees/delete/(:num)', 'Employees::delete/$1');

    // --- Manajemen Payroll (Khusus Admin) ---
    // Menggunakan filter 'admin' untuk proteksi ekstra.
    $routes->group('payroll', ['filter' => 'admin'], function($routes) {
        $routes->get('/', 'Payroll::index');              
        $routes->get('generate', 'Payroll::generate');    
        $routes->get('payslip/(:num)', 'Payroll::payslip/$1'); 
    });

    // --- Logout ---
    $routes->get('logout', 'Auth::logout');
});