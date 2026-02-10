<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class Employees extends BaseController
{
    protected $employeeModel;

    public function __construct() {
        $this->employeeModel = new EmployeeModel();
    }

    public function index() {
        $data = [
            'title'     => 'Daftar Karyawan',
            'employees' => $this->employeeModel->findAll()
        ];
        return view('employees/index', $data);
    }

    public function store() {
        $this->employeeModel->save([
            'nama'            => $this->request->getPost('nama'),
            'posisi'          => $this->request->getPost('posisi'),
            'gaji_pokok'      => $this->request->getPost('gaji_pokok'),
            'tunjangan_tetap' => $this->request->getPost('tunjangan_tetap'),
        ]);

        return redirect()->to('/employees')->with('pesan', 'Karyawan berhasil ditambahkan!');
    }

    public function delete($id) {
        $this->employeeModel->delete($id);
        return redirect()->to('/employees')->with('pesan', 'Data karyawan dihapus.');
    }
}