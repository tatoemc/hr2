<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Vacation;
use App\Http\Requests\StoreLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;
use Illuminate\Http\Request;
use App\Models\Resignation;
use Illuminate\Support\Facades\Auth;
class LeaveController extends Controller
{
   
    public function index() 
    { 
        if(Auth::user()->user_type == 'admin')
        {
            $leaves =  Leave::all();
        }
        else{ 
            $leaves =  Leave::where('user_id',Auth::user()->id)->get();
        }
        
        return view ('leaves.index',compact('leaves'));
    }

  
    public function create()
    {
        $vacations = Vacation ::all();
        return view ('leaves.create',compact('vacations'));
    }

   
    public function store(StoreLeaveRequest $request)
    {
        try {
            $validated = $request->validated();
            Leave::create([
                'user_id' => Auth::user()->id,
                'vacation_id' => $request->vacation_id,
                'B_date' => $request->B_date,
                'E_date' => $request->E_date,
                'note' => $request->note,
                ]);
    
                session()->flash('Add_leave');
                return redirect('/leaves');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

    
    public function show(Leave $leave,$id)
    {
        
        $leave = Leave::where('id',$id)->first();
        return view ('Leaves.show',compact('leave')); 
    }

  
    public function edit(Leave $leave,$id)
    {
        $vacations = Vacation ::all();
        $leave = Leave::where('id',$id)->first();
        return view ('Leaves.edit',compact('leave','vacations'));  
    }

   
    public function update(UpdateLeaveRequest $request, Leave $leave,$id)
    {
        try {
                $validated = $request->validated();
                $leave = Leave::find($id);
                $leave->update([
                'vacation_id' => $request->vacation_id,
                'B_date' => $request->B_date,
                'E_date' => $request->E_date,
                'note' => $request->note,
                    ]);
                session()->flash('edit_leave');
                return redirect('/leaves');  
            }
    
        catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }

    }

    public function leaveUpdate (Request $request)
    {
         
         $leave = Leave::find($request->id);
         $leave->update([
            'status' => $request->status,
         ]);
         
         session()->flash('edit_leave');
        return redirect('/leaves');  
    }

    // public function tato (Request $request)
    // {
         
    //      $resignation = Resignation::find($request->id);
    //      $resignation->update([
    //         'status' => $request->status,
    //      ]);
         
    //      session()->flash('edit_leave');
    //     return redirect('/resignationes');  
    // }
    
   
    public function destroy(Request $request)
    {
        $Leave = Leave::where('id', $request->leave_id)->first();
        $Leave->delete();
        session()->flash('leave_delete');
        return redirect('/leaves');
    }
    }




