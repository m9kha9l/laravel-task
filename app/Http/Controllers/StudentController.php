<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view ('students.index')->with('students', $students);
    }
 
    
    public function create()
    {
        
        return view('students.create');
    }
 
   
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'address' => ['required', 'min:3'],
            'mobile' => ['required', 'digits:11', ]
        ],
    ['name.required' => "Имя обязательно",
    'address.required' => "Адресс обязателен",
    'mobile.required' => "Номер телефона обязателен",
    'mobile.max' => "Номер не должен превышать 11 цифр"]);
        $input = $request->all();
        Student::create($input);
        return redirect('student')->with('flash_message', 'Student Addedd!');  
    }
 
    
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show')->with('students', $student);
    }
 
    
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit')->with('students', $student);
    }
 
  
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $input = $request->all();
        $request->validate([
            'name' => ['required'],
            'address' => ['required', 'min:3'],
            'mobile' => ['required', 'digits:11']
        ],
        ['name.required' => "Имя обязательно",
        'address.required' => "Адресс обязателен",
        'mobile.required' => "Номер телефона обязателен",
        'mobile.max' => "Номер не должен превышать 11 цифр"]);
        $student->update($input);
        return redirect('student')->with('flash_message', 'student Updated!');  
    }
 
   
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('student')->with('flash_message', 'Student deleted!');  
    }
}
