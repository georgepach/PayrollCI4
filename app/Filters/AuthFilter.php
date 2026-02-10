<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Logic yang dijalankan SEBELUM request masuk ke Controller
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Jika session 'isLoggedIn' tidak ada atau bernilai false
        if (!session()->get('isLoggedIn')) {
            // Maka tendang paksa ke halaman login dengan pesan error
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu!');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Biasanya dibiarkan kosong untuk filter autentikasi
    }
}