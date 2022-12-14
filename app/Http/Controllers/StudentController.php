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

    function __construct()
    { 
 
      $this->middleware('permission:حذف طالب', ['only' => ['destroy']]);
      $this->middleware('permission:استيراد ملف', ['only' => ['create','import']]);
      $this->middleware('permission:بحث', ['only' => ['GetSearchView']]);
      $this->middleware('permission:عرض طالب', ['only' => ['show']]);
      

     }

    
    public function import(Request $request)
    {
        //validate request
            $validatedData = $request->validate([
                'file' => 'required|mimes:xls,xlsx',
            ],[
    
                'file.required' =>'يرجي اختيار الملف ',
                'file.mimes' =>'يجب ان يكون نوع الملف اكسل'
            ]);

        DB::beginTransaction();
        try {
              //store file in storge and DB
                $fileName = time() .'-'.$request->file->getClientOriginalName();
                //$filePath = 'uploads/' . $fileName;
                $filePath = '/' . $fileName;
                $path = Storage::disk('public_uploads')->put($filePath, file_get_contents($request->file));

                Doc::create([ 
                'name' => $fileName,
                'user_id' => Auth::user()->id,
                ]); 
                //insert Excel into DB
               Excel::import(new ImportStudent,$request->file('file'));
                DB::commit();
               session()->flash('Add_file'); 
               return redirect()->back()->with('success','تم أضافة الملف بنجاح');
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
        //dd($request->all());
     try {


        if (Auth::user()->user_type == 'admin')
        {

            if ($request->frmno)
            {
                $students = Student::Where('frmno',$request->frmno)->paginate(10);
            }
            elseif ($request->N1)
            {
               
                $students = Student::Where('N1', 'like', '%' . $request->N1 . '%')
                ->Where('N2', 'like', '%' . $request->N2 . '%')
                ->Where('N3', 'like', '%' . $request->N3 . '%')
                ->Where('N4', 'like', '%' . $request->N4 . '%')
                ->paginate(10);
            }

        }
        else
        {
           if ($request->frmno)
           {
            $students = Student::Where('college_id',Auth::user()->college_id)
            ->Where('frmno',$request->frmno)->paginate(10);
           }
           elseif ($request->N1)
           {
           
            $students = Student::Where('college_id',Auth::user()->college_id)
            ->Where('N1', 'like', '%' . $request->N1 . '%')
            ->Where('N2', 'like', '%' . $request->N2 . '%')
            ->Where('N3', 'like', '%' . $request->N3 . '%')
            ->Where('N4', 'like', '%' . $request->N4 . '%')
            ->paginate(10);
           }

        }

        




       } //end of try
    
      catch (\Exception $e){
    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     }
       
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

  
    public function destroy(Request $request)
    {
        $id = $request->student_id;
        $student = Student::Where('id',$id)->first();
        $student->delete();
        return view('students.search')->with('danger','تم حذف الطالب بنجاح');
    }

    


    
}
