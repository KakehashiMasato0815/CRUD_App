<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValiDemoRequest;
use Illuminate\Http\Request;
use App\Student;
use App\Http\Requests;

class StudentController extends Controller
{
    public function get_index(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Student::query();

        if (!empty($keyword))
        {
            $query->where('email', 'like', '%'.$keyword.'%')->orWhere('name', 'like', '%'.$keyword.'%');
        }

        $students = $query->orderBy('id', 'desc')->paginate(10);

        return view('student.list')->with('students', $students)->with('keyword', $keyword);

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

        return redirect()->to('student/list')->with('flashmessage', '登録が完了いたしました');
    }

    public function edit_index($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit_index')->with('student', $student);
    }

    public function edit_confirm(ValiDemoRequest $request)
    {
        $student = $request->all();
        return view('student.edit_confirm')->with('student', $student);
    }

    public function edit_finish(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->tel = $request->tel;

        $student->save();

        return redirect()->to('student/list')->with('flashmessage', '更新が完了しました');
    }

    public function show_index($id)
    {
        $student = Student::findOrFail($id);
        return view('student.show_index')->with('student',$student);
    }

    public function us_delete($id)
    {
        $user = Student::find($id);
        $user->delete();
        return redirect()->to('student/list')->with('flashmessage', '削除が完了しました');
    }

}
