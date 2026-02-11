<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. RUTE PUBLIK (Bisa diakses siapa saja/tanpa login)
// --------------------------------------------------------------------
$routes->get('login', 'Auth::login');                 // Halaman form login
$routes->post('login', 'Auth::attemptLogin');         // Proses verifikasi login
$routes->get('register', 'Auth::register');           // Halaman form daftar
$routes->post('register', 'Auth::attemptRegister');   // Proses simpan user baru

// 2. RUTE TERPROTEKSI (Wajib Login)
// --------------------------------------------------------------------
// Kita menggunakan filter 'auth' untuk melindungi semua rute di dalam grup ini
$routes->group('', ['filter' => 'auth'], function($routes) {

    // --- Home & Dashboard ---
    $routes->get('/', 'Home::index');
    $routes->get('dashboard', 'Home::index');

    // --- Manajemen Karyawan ---
    $routes->get('employees', 'Employees::index');
    $routes->post('employees/store', 'Employees::store');
    $routes->get('employees/delete/(:num)', 'Employees::delete/$1');

    // --- Manajemen Payroll ---
    $routes->get('payroll', 'Payroll::index');              // Dashboard Payroll
    $routes->get('payroll/generate', 'Payroll::generate');  // Hitung Gaji Massal
    $routes->get('payroll/payslip/(:num)', 'Payroll::payslip/$1'); // Lihat Slip Gaji

    // --- Autentikasi Akhir ---
    $routes->get('logout', 'Auth::logout');
    $routes->get('login', 'Auth::login');
    $routes->get('register', 'Auth::register');
    $routes->post('auth/attemptRegister', 'Auth::attemptRegister');
    $routes->post('auth/attemptLogin', 'Auth::attemptLogin');
    
});