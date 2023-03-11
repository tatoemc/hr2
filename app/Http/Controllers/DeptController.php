<?php

namespace App\Http\Controllers;

use App\Models\Dept;
use App\Models\College;
use App\Http\Requests\StoreDeptRequest;
use App\Http\Requests\UpdateDeptRequest;
use Illuminate\Http\Request;

class DeptController extends Controller
{
   
    public function index()
    {
        $depts =  Dept::all();
        $colleges =  College::all();
        return view ('depts.index',compact('depts','colleges'));
    }

   
    public function create()
    {
        //
    }

   
    public function store(StoreDeptRequest $request)
    {
        try {
            $validated = $request->validated();
            Dept::create([
                'name' => $request->name,
                'college_id' => $request->college_id,
               
                ]);
    
                session()->flash('Add_dept');
                return redirect('/depts');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

  
    public function show(Dept $dept)
    {
        return view ('depts.show',compact('dept'));
    }

    public function edit(Dept $dept)
    {
        $colleges =  College::all();
        return view ('depts.edit',compact('dept','colleges'));
    }

    
    public function update(UpdateDeptRequest $request, Dept $dept)
    {
        try {
                $validated = $request->validated();

                $dept = Dept::find($dept->id);
                $dept->update([
                'name' => $request->name,
                'college_id' => $request->college_id,
                ]);
            session()->flash('edit_dept');
            return redirect('/depts');
            }
            
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }

    }

   
    public function destroy(Request $request)
    {
        $dept = Dept::where('id', $request->dept_id)->first();
        $dept->delete();
        session()->flash('dept_dept');
        return redirect('/depts');
    }
}
