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
        $students = Student::where( 'frmno', '=', $request->frmno)
        ->where( 'N1', 'LIKE', '%' . $request->N1 . '%' )
        ->Where ( 'N2', 'LIKE', '%' . $request->N2 . '%' )
        ->Where ( 'N3', 'LIKE', '%' . $request->N3 . '%' )
        ->Where ( 'N4', 'LIKE', '%' . $request->N4 . '%' )
        ->get ();
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
