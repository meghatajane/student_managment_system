<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\TeacherModel;
use CodeIgniter\Controller;

class StudentController extends Controller
{
    public function display()
    {
        return view('student');
    }
    public function index()
    {
        $studentModel = new StudentModel();
        $data['students'] = $studentModel->getStudentsWithTeacher();
        return view('students/index', $data);
    }

    public function create()
    {
        $teacherModel = new TeacherModel();
        $data['teachers'] = $teacherModel->findAll();
        return view('students/create', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'student_name'     => 'required',
            'class_teacher_id' => 'required|integer',
            'class'            => 'required',
            'admission_date'   => 'required|valid_date',
            'yearly_fees'      => 'required|decimal'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $studentModel = new StudentModel();
        $studentModel->save($this->request->getPost());
        return redirect()->to('students');
    }

    public function edit($id)
    {
        $studentModel = new StudentModel();
        $teacherModel = new TeacherModel();

        $data['student'] = $studentModel->find($id);
        $data['teachers'] = $teacherModel->findAll();
        return view('students/edit', $data);
    }

    public function update($id)
    {
        $studentModel = new StudentModel();
        $studentModel->update($id, $this->request->getPost());
        return redirect()->to('students');
    }

    public function delete($id)
    {
        $studentModel = new StudentModel();
        $studentModel->delete($id);
        return redirect()->to('students');
    }
}
