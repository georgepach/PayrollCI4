<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\PayrollModel;

class Home extends BaseController
{
    public function index()
    {
        $empModel = new EmployeeModel();
        $payModel = new PayrollModel();

        $data = [
            'title'          => 'Dashboard | FocusHR',
            'nama_user'      => session()->get('username'),
            'total_employee' => $empModel->countAll(),
            'total_gaji'     => $payModel->selectSum('gaji_netto')
                                         ->where('bulan', date('m'))
                                         ->where('tahun', date('Y'))
                                         ->first()['gaji_netto'] ?? 0,
            'recent_payroll' => $payModel->select('payrolls.*, employees.nama')
                                         ->join('employees', 'employees.id = payrolls.employee_id')
                                         ->orderBy('payrolls.created_at', 'DESC')
                                         ->limit(5)
                                         ->findAll()
        ];

        return view('dashboard/index', $data);
    }
}