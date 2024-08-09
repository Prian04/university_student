<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('teacher')->whereNull('deleted_at')->paginate(10);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('students.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'student_name' => 'required|string',
        'class_teacher_id' => 'required|exists:teachers,id',
        'class' => 'required|string',
        'admission_date' => 'required|date',
        'yearly_fees' => 'required|numeric'
        ]);

        Student::create($request->all());
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $teachers = Teacher::all();
        return view('students.edit', compact('student', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
        'student_name' => 'required|string',
        'class_teacher_id' => 'required|exists:teachers,id',
        'class' => 'required|string',
        'admission_date' => 'required|date',
        'yearly_fees' => 'required|numeric'
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('update', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
         $student->delete();
       // return redirect()->route('students.index');
         return redirect()->route('students.index')->with('delete', 'Student deleted successfully.');
    }
}
