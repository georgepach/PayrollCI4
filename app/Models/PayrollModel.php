<?php

namespace App\Models;

use CodeIgniter\Model;

class PayrollModel extends Model
{
    protected $table            = 'payrolls';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;

    // WAJIB DIISI agar data bisa disimpan
    protected $allowedFields    = [
        'employee_id', 
        'bulan', 
        'tahun', 
        'pokok_snapshot', 
        'gaji_netto', 
        'status_bayar'
    ];

    // Aktifkan timestamps karena ada kolom created_at di migrasi
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; // Kosongkan jika tidak ada di migrasi
}