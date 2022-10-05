<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportStudent;

class StudentController extends Controller
{
    
    public function import(Request $request)
    {
        //dd($request->all());
        try {
               Excel::import(new ImportStudent,$request->file('file'));
               session()->flash('Add_file'); 
               return redirect()->back();
            }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }

    }
  
    public function create()
    {
        return view ('students.create');
    }
   
    public function store(StoreStudentRequest $request)
    {
        //
    }

    public function GetSearchView()
    {
        return view ('students.search');
    }

    public function show($id)
    {
        
        $student = Student::where('id', $id)->first();
        return view ('students.show',compact('student'));
    }

    public function search(Request $request)
    {
        $students = Student::where( 'f_name', 'LIKE', '%' . $request->f_name . '%' )
        //->where( 'f_name', 'LIKE', '%' . $request->f_name . '%' )
        ->Where ( 's_name', 'LIKE', '%' . $request->s_name . '%' )
        ->Where ( 't_name', 'LIKE', '%' . $request->t_name . '%' )
        ->Where ( 'fo_name', 'LIKE', '%' . $request->fo_name . '%' )
        ->get ();
        //dd($);
        return view ('students.search',compact('students'));
    }

    public function edit(Student $student)
    {
        //
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

  
    public function destroy(Student $student)
    {
        //
    }


    
}
