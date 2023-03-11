<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\Http\Requests\StoreBonusRequest;
use App\Http\Requests\UpdateBonusRequest;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    
    public function index()
    {
        $bonues =  Bonus::all();
        return view ('bonus.index',compact('bonues'));
    }

    
    public function create()
    {
        return view ('bonus.create');
    }

   
    public function store(StoreBonusRequest $request)
    {
        try {
            $validated = $request->validated();
            Bonus::create([
                'name' => $request->name,
                'amount' => $request->amount,
               
                ]);
    
                session()->flash('Add_bonue');
                return redirect('/bonues');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

    
    public function show($id)
    {
        $bonus = Bonus::where('id',$id)->first();
        return view ('bonus.show',compact('bonus'));
    }

    public function edit(Request $request, $id)
    {
        $bonus = Bonus::where('id',$id)->first();
        return view ('bonus.edit',compact('bonus'));
    }

  
    public function update(UpdateBonusRequest $request, Bonus $bonus)
    {
            try {
            $bonus = Bonus::find($request->id)->first();
            $bonus->update([
            'name' => $request->name,
            'amount' => $request->amount,
                ]);
            session()->flash('edit_bonues'); 
            return redirect('/bonues');
        }

        catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

   
    public function destroy(Request $request)
    {
        $bonus = Bonus::where('id', $request->bonus_id)->first();
        $bonus->delete();
        session()->flash('bonus_dept');
        return redirect('/bonues');
    }



}
