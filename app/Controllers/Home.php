<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
{
    $db = \Config\Database::connect();
    
    $data = [
        'title' => 'Home | FocusHR',
        'nama_user' => 'SURYA',
        // Statistik (11)
        'total_karyawan' => $db->table('employees')->countAll(),
        'status_counts' => [
            'permanent' => $db->table('employees')->where('posisi', 'Permanent')->countAllResults(),
            'contract'  => $db->table('employees')->where('posisi', 'Contract')->countAllResults(),
        ]
    ];

    return view('dashboard/index', $data);
}
}
