<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use App\Models\Student;
use App\Http\Requests\StoreDocRequest;
use App\Http\Requests\UpdateDocRequest;
use Illuminate\Http\Request;

class DocController extends Controller
{
    
    public function index()
    {
        $docs =  Doc::all();
        return view ('docs.index',compact('docs'));
    }

    public function create()
    {
        //
    }

    public function store(StoreDocRequest $request)
    {
        //
    }

    public function show(Doc $doc)
    {
        //
    }

    public function edit(Doc $doc)
    {
        //
    }

    public function update(UpdateDocRequest $request, Doc $doc)
    {
        //
    }

    public function destroy(Request $request)
    {
       

        $doc = Doc::where('doc_id', $request->doc_id)->first();
        $doc->delete();
        $students = Student::where('doc_id', $request->doc_id)->get();
        foreach($students as $student)
                {
                    $student->delete();
                } 
        return redirect('/docs');

    }



}
