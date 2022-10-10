<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Doc;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportStudent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Auth;


class StudentController extends Controller
{
    
    public function import(Request $request)
    {
       
        DB::beginTransaction();
        try {
            /*
               $validatedData = $request->validate([
                'file' => 'required|csv,txt,xlx,xls,pdf|max:2048',
        
                ]);
                */
              //store file in storge and DB
                $fileName = time() .'-'.$request->file->getClientOriginalName();
                $filePath = 'uploads/' . $fileName;
                $path = Storage::disk('public')->put($filePath, file_get_contents($request->file));

                Doc::create([
                'name' => $fileName,
                'user_id' => Auth::user()->id,
                ]); 
                //insert Excel into DB
               Excel::import(new ImportStudent,$request->file('file'));
                DB::commit();
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
        $students = DB::table('students')
        ->Where('N1', 'LIKE', '%' . $request->N1 . '%')
        ->Where('N2', 'LIKE', '%' . $request->N2 . '%')
        ->Where('N3', 'LIKE', '%' . $request->N3 . '%')
        ->Where('N4', 'LIKE', '%' . $request->N4 . '%')
        ->orwhere( 'frmno', '=', $request->frmno)
        ->paginate(10);
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
