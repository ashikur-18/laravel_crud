<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->data['students'] = Student::all();
        if(Session::has('message')){
            $this->data['message'] = Session::get('message');
        }
        return view('students.students',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
      $data = $request->all();
    
      if($request->file('photo')){
        $data['photo']  =  Storage::putFile('images',$request->file('photo'));
      }
      
      Student::create($data);
      Session::flash('message','Created successfully');
      return redirect()->to('students');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //  $data = Student::find($id);
        $this->data['student'] = $student;
        $this->data['student']->photo = Storage::url($student->photo);

        return view('students.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $this->data['student'] = $student;
        $this->data['student']->photo = Storage::url($student->photo);
        return view('students.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        $data = $request->all();
        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->roll = $data['roll'];
        $student->registration = $data['registration'];
        $student->address= $data['address'];
        if($request->file('photo')){
            if($student->photo){
                Storage::delete($student->photo);
            }
        $student->photo =  Storage::putFile('images',$request->file('photo'));
        }
        $student->save();

        Session::flash('message','Update successfully');
      
        return redirect()->to('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if($student->photo){
            Storage::delete($student->photo);
        }
       $student->delete();

        Session::flash('message','Delete successfully');
      
       return redirect()->to('students');
    }
}
