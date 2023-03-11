<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Http\Requests\StoreCollegeRequest;
use App\Http\Requests\UpdateCollegeRequest;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    
    public function index()
    {
        $colleges =  College::all();
        return view ('colleges.index',compact('colleges'));
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
        return view ('colleges.show',compact('college'));
    }

   
    public function edit(College $college)
    {
        return view ('colleges.edit',compact('college'));
    }

    
    public function update(UpdateCollegeRequest $request, College $college)
    {
        try {
        $college = College::find($college->id);
               $college->update([
                 'name' => $request->name,
               ]);
            session()->flash('edit_college');
            return redirect('/colleges');
        }
    
        catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
         
    }

   
    public function destroy(Request $request) 
    {
        $college = College::where('id', $request->college_id)->first();
        $college->delete();
        session()->flash('college_dept');
        return redirect('/colleges');
    }
}
