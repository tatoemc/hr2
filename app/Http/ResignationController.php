<?php

namespace App\Http\Controllers;

use App\Models\Resignation;
use App\Http\Requests\StoreResignationRequest;
use App\Http\Requests\UpdateResignationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
old

class ResignationController extends Controller
{
    public function index()
    {
        $Resignationes =  Resignation::all();
        
        return view ('Resignations.index',compact('Resignationes'));
                      
    }

   
    public function create()
    {
        $Resignationes = Resignation::all();
        return view ('Resignations.create',compact('Resignationes'));
    }

   
    public function store(StoreResignationRequest $request)
    {
        //dd( $request->all());
        try {
            $validated = $request->validated();
            Resignation::create([
                'user_id' => Auth::user()->id,
                'date' => $request->date,
                'note' => $request->note,
                ]);
    
                session()->flash('Add_Resignation');
                return redirect('/Resignationes');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
        

    }

    
    public function show($id)
    {
        
        $resignation = Resignation::where('id',$id)->first();
        
        return view ('Resignations.show',compact('resignation'));
    }

    
    public function edit($id)
    {
        $resignation = Resignation::where('id',$id)->first();
        return view ('Resignations.edit',compact('resignation'));
    }

   
    public function update(UpdateResignationRequest $request, $id)
    {
        $Resignation =Resignation::where('id',$id)->first();
       
        $Resignation->update([
          'date' => $request->date,
          'note' => $request->note,
        ]);
     session()->flash('edit_Resignation');
     return redirect('/Resignationes');
    }

    public function destroy(Request $request)
    {
        $Resignation = Resignation::where('id', $request->Resignation_id)->first();
        $Resignation->delete();
        session()->flash('resignationes_delete');
        return redirect('/Resignation');
    }
    
}
