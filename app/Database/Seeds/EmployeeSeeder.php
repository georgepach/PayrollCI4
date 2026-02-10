<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'           => 'Budi Santoso',
                'posisi'         => 'Software Engineer',
                'gaji_pokok'     => 12000000,
                'tunjangan_tetap' => 1500000,
                'created_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'nama'           => 'Siti Aminah',
                'posisi'         => 'HR Manager',
                'gaji_pokok'     => 15000000,
                'tunjangan_tetap' => 2000000,
                'created_at'     => date("Y-m-d H:i:s"),
            ],
            // Tambahkan data lainnya jika perlu
        ];

        // Insert ke database
        $this->db->table('employees')->insertBatch($data);
    }
}
