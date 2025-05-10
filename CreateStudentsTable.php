<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'auto_increment' => true],
            'student_name'    => ['type' => 'VARCHAR', 'constraint' => 100],
            'class_teacher_id'=> ['type' => 'INT'],
            'class'           => ['type' => 'VARCHAR', 'constraint' => 20],
            'admission_date'  => ['type' => 'DATE'],
            'yearly_fees'     => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'deleted_at'      => ['type' => 'DATETIME', 'null' => true],
            'created_at'      => ['type' => 'DATETIME', 'null' => true],
            'updated_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('class_teacher_id', 'teachers', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('students');
    }

    public function down()
    {
        $this->forge->dropTable('students');
    }
}
