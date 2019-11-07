<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Http\Requests;

class StudentController extends Controller
{
    public function getIndex()
    {
        $query = Student::query();

        $students = $query->orderBy('id', 'asc')->paginate(10);
        return view('student.list')->with('students', $students);
    }
}
