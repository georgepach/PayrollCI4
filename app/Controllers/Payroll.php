<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\PayrollModel;

class Payroll extends BaseController
{
    public function index()
    {
        $payrollModel = new PayrollModel();
        // Ambil riwayat payroll terbaru untuk ditampilkan di dashboard
        $data = [
            'title'   => 'Payroll Management',
            'payrolls' => $payrollModel->select('payrolls.*, employees.nama, employees.posisi')
                                      ->join('employees', 'employees.id = payrolls.employee_id')
                                      ->orderBy('payrolls.created_at', 'DESC')
                                      ->findAll()
        ];
        return view('payroll/index', $data);
    }
    
    public function generate()
    {
        $employeeModel = new EmployeeModel();
        $payrollModel  = new PayrollModel();

        $employees = $employeeModel->findAll();
        $bulan     = date('m'); // Bisa dimodifikasi jadi input dari form
        $tahun     = date('Y');

        $count = 0;
        foreach ($employees as $emp) {
            // 1. CEK: Apakah karyawan ini sudah gajian di bulan & tahun ini?
            $sudahAda = $payrollModel->where([
                'employee_id' => $emp['id'],
                'bulan'       => $bulan,
                'tahun'       => $tahun
            ])->first();

            if (!$sudahAda) {
                // 2. LOGIKA PAYROLL ENGINE
                $gajiPokok = $emp['gaji_pokok'];
                $tunjangan = $emp['tunjangan_tetap'];
                
                // Simulasi Potongan (Misal BPJS 1% dari gaji pokok)
                $potongan = $gajiPokok * 0.01;

                // Rumus:
                // $$Gaji\ Bersih = (Gaji\ Pokok + Tunjangan) - Potongan$$
                $gajiNetto = ($gajiPokok + $tunjangan) - $potongan;

                // 3. SIMPAN SNAPSHOT
                $payrollModel->save([
                    'employee_id'    => $emp['id'],
                    'bulan'          => $bulan,
                    'tahun'          => $tahun,
                    'pokok_snapshot' => $gajiPokok,
                    'gaji_netto'     => $gajiNetto,
                    'status_bayar'   => 'pending'
                ]);
                $count++;
            }
        }

        return redirect()->to('/payroll')->with('pesan', "$count Gaji karyawan berhasil diproses untuk periode " . date('F Y'));
    }
}