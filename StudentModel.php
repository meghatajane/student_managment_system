<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'student_name',
        'class_teacher_id',
        'class',
        'admission_date',
        'yearly_fees'
    ];
    protected $useTimestamps = true;

    public function getStudentsWithTeacher()
    {
        return $this->select('students.*, teachers.teacher_name')
                    ->join('teachers', 'teachers.id = students.class_teacher_id')
                    ->findAll();
    }
}
