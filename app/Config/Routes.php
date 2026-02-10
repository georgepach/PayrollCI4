<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// --- ROUTE UNTUK PAYROLL SYSTEM ---

// 1. Dashboard Utama Payroll
$routes->get('payroll', 'Payroll::index');

// 2. Jalankan Mesin Hitung Gaji Massal (Generate)
$routes->get('payroll/generate', 'Payroll::generate');

// 3. Lihat Slip Gaji Individu (Menggunakan ID Payroll)
$routes->get('payroll/payslip/(:num)', 'Payroll::payslip/$1');

// 4. (Opsional) Update status bayar dari pending ke paid
$routes->get('payroll/bayar/(:num)', 'Payroll::updateStatus/$1');
$routes->get('employees', 'Employees::index');