<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Http\Requests\StoreCollegeRequest;
use App\Http\Requests\UpdateCollegeRequest;
use Illuminate\Http\Request;

class CollegeController extends Controller
{

    function __construct()
   { 

     $this->middleware('permission:عرض كلية', ['only' => ['index']]);
     $this->middleware('permission:اضافة كلية', ['only' => ['create','store']]);
     $this->middleware('permission:تعديل كلية', ['only' => ['edit','update']]);
     $this->middleware('permission:حذف كلية', ['only' => ['destroy']]);

    }
 

   
    public function index()
    {
        $colleges =  College::all();
        return view ('colleges.index',compact('colleges'));
    }

   
    public function create()
    {
        //
    }
 
    
    public function store(StoreCollegeRequest $request)
    {
        try {
            $validated = $request->validated();
            College::create([
                'name' => $request->name,
                ]);
    
                session()->flash('Add_college');
                return redirect('/colleges');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }


    public function show(College $college)
    {
        //
    }

    public function edit(College $college)
    {
        //
    }

    public function update(UpdateCollegeRequest $request, College $college)
    {
        //
    }

    public function destroy(Request $request)
    {
        
        $college = College::where('id', $request->college_id)->first();
        $college->delete();

        session()->flash('delete_college');
        return redirect('/colleges');
    }


    
}
