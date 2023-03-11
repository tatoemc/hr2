<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use App\Http\Requests\StoreDegreeRequest;
use App\Http\Requests\UpdateDegreeRequest;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    
    public function index()
    {
        $degrees =  Degree::all();
        return view ('degrees.index',compact('degrees'));
    }

   
    public function create()
    {
        //
    }

   
    public function store(StoreDegreeRequest $request)
    {
        try {
            $validated = $request->validated();
            Degree::create([
                'name' => $request->name,
               
                ]);
    
                session()->flash('Add_degree');
                return redirect('/degrees');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

   
    public function show(Degree $degree)
    {
        return view ('degrees.show',compact('degree'));
    }

    
    public function edit(Degree $degree)
    {
        return view ('degrees.edit',compact('degree'));
    }

   
    public function update(UpdateDegreeRequest $request, Degree $degree)
    {
        try {
                $degree = Degree::find($degree->id);
                $degree->update([
                'name' => $request->name,
                ]);
            session()->flash('edit_degree');
            return redirect('/degrees');
            }
    
        catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }

   
    public function destroy(Request $request)
    {
        try {

        $degree = Degree::where('id', $request->degree_id)->first();
        $degree->delete();
        session()->flash('degree_dept');
        return redirect('/degrees');
             }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }
}
