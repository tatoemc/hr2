<?php

namespace App\Http\Controllers;

use App\Models\Demission;
use App\Http\Requests\StoreDemissionRequest;
use App\Http\Requests\UpdateDemissionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DemissionController extends Controller
{
    
    public function index()
    {  
        $demissions =  Demission::all();
      
        return view ('demissions.index',compact('demissions'));
    }

   
    public function create()
    {
        return view ('demissions.create');
    }
    public function updatedemission (Request $request)
    {
         
         $demission = Demission::find($request->id);
         $demission->update([
            'status' => $request->status,
         ]);
         
         session()->flash('edit_demission');
        return redirect('/demissions');  
    }

  
    public function store(StoreDemissionRequest $request)
    {
        try {
            $validated = $request->validated();
            Demission::create([
                'user_id' => Auth::user()->id,
                'date' => $request->date,
                'note' => $request->note,
                ]);
    
                session()->flash('Add_demission');
                return redirect('/demissions');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

   
    public function show(Demission $demission)
    {
         return view ('demissions.show',compact('demission'));
    }

    
    public function edit(Demission $demission)
    {
         return view ('demissions.edit',compact('demission'));
    }

    
    public function update(UpdateDemissionRequest $request, Demission $demission)
    {
        try {

            $demission->update([
                'date' => $request->date,
                'note' => $request->note,
                ]);
                session()->flash('edit_resignation');
                return redirect('/demissions');
            }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
    }

   
    public function destroy( Request $request)
    {
        $demission = Demission::where('id', $request->demissioneid)->first();
        $demission->delete();
        session()->flash('delete_demission');
        return redirect('/demission');
    }




}
