<?php

namespace App\Http\Controllers;

use App\Models\Vacation;
use App\Http\Requests\StoreVacationRequest;
use App\Http\Requests\UpdateVacationRequest;
use Illuminate\Http\Request;

class VacationController extends Controller
{
   
    public function index()
    {
        $vacations =  Vacation::all();
        return view ('vacations.index',compact('vacations'));
    }

    public function store(StoreVacationRequest $request)
    {
        try {
            $validated = $request->validated();
            Vacation::create([
                'name' => $request->name,
                ]);
    
                session()->flash('Add_vacation');
                return redirect('/vacations');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

    public function edit(Vacation $vacation)
    {
        return view ('vacations.edit',compact('vacation'));
    }

    public function update(UpdateVacationRequest $request, Vacation $vacation)
    {
        $vacation = Vacation::find($vacation->id);
               $vacation->update([
                 'name' => $request->name,
               ]);
            session()->flash('edit_vacation');
            return redirect('/vacations');
    }

    public function destroy(Request $request)
    {
        $vacation = Vacation::where('id', $request->vacation_id)->first();
        $vacation->delete();

        session()->flash('delete_vacation'); 
        return redirect('/vacations'); 
    }
}
