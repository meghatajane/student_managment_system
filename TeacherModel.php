<?php

namespace App\Models;

use CodeIgniter\Model;

class TeacherModel extends Model
{
    protected $table = 'teachers';
    protected $allowedFields = ['teacher_name'];
    protected $useTimestamps = true;
}
