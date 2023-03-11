<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use App\Http\Requests\StoreSpecialtyRequest;
use App\Http\Requests\UpdateSpecialtyRequest;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    
    public function index()
    {
        $specialtys =  Specialty::all();
        return view ('specialtys.index',compact('specialtys'));
    }

    public function store(StoreSpecialtyRequest $request)
    {
        try {
            $validated = $request->validated();
            Specialty::create([
                'name' => $request->name,
                ]);
    
                session()->flash('Add_specialty');
                return redirect('/specialties');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

   
    public function show(Specialty $specialty)
    {
        return view ('specialtys.show',compact('specialty'));
    }

    public function edit(Specialty $specialty)
    {
        return view ('specialtys.edit',compact('specialty'));
    }

    public function update(UpdateSpecialtyRequest $request, Specialty $specialty)
    {
        try {
            $validated = $request->validated();
            $specialty = Specialty::find($specialty->id);
               $specialty->update([
                 'name' => $request->name,
               ]);
            session()->flash('edit_specialty');
            return redirect('/specialties');
            }
    
        catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
         
    }

    public function destroy(Request $request)
    {
        $specialty = Specialty::where('id', $request->specialty_id)->first();
        $specialty->delete();
        session()->flash('specialty_dept');
        return redirect('/specialties');
    }

}
