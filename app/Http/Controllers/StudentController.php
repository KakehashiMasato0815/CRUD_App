<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValiDemoRequest;
use Illuminate\Http\Request;
use App\Student;
use App\Http\Requests;

class StudentController extends Controller
{
    public function get_index()
    {
        $students = Student::query()->orderBy('id', 'desc')->paginate(10);

        return view('student.list')->with('students', $students);

    }

    public function new_index()
    {
        return view('student.new_index');
    }

    public function new_confirm(ValiDemoRequest $request)
    {
        $student = $request->all();

        return view('student.new_confirm')->with('student',$student);

    }

    public function new_finish(Request $request)
    {
        $student = new Student();

        $student->name = $request->name;
        $student->email = $request->email;
        $student->tel = $request->tel;

        $student->save();

        return redirect()->to('student/list');
    }

}
