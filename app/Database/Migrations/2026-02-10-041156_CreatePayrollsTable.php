<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePayrollsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
        'employee_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        'bulan'       => ['type' => 'INT', 'constraint' => 2],
        'tahun'       => ['type' => 'INT', 'constraint' => 4],
        'pokok_snapshot' => ['type' => 'DECIMAL', 'constraint' => '15,2'], // Simpan gaji saat itu (snapshot)
        'gaji_netto'     => ['type' => 'DECIMAL', 'constraint' => '15,2'],
        'status_bayar'   => ['type' => 'ENUM', 'constraint' => ['pending', 'paid'], 'default' => 'pending'],
        'created_at'     => ['type' => 'DATETIME', 'null' => true],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('employee_id', 'employees', 'id', 'CASCADE', 'CASCADE');
    $this->forge->createTable('payrolls');
    }

    public function down()
    {
        //
    }
}
