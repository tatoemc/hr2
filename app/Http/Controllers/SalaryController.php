<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\UpdateSalaryRequest;
use App\Models\User;
use App\Models\Bonus;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    
    public function index()
    {
        $salaries =  Salary::withCount('bonuses')->get(); 
        
        return view ('salaries.index',compact('salaries'));
    } 
    public function getSalaries()
    {
        $salaries =  Salary::withCount('bonuses')->get(); 
        $sumation = Salary::withSum('bonuses','amount')->get();

       
        return view ('salaries.getSalaries',compact('salaries'));
    } 

   
    public function create()
    {
        try {
           
        $users = User::where('user_type','teacher')
        ->Where('salary','0')
        ->orWhere('user_type','user')
        
        ->get();
        $bonues =  Bonus::all();
        return view ('salaries.create',compact('users','bonues'));
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }

    }

   
    public function store(StoreSalaryRequest $request)
    {
        //dd($request->all());
        try {
            $validated = $request->validated();
                $salary=  Salary::create([
                    'user_id' => $request->user_id,
                    'amount' => $request->amount,
                    ]);
                   
                $salary->bonuses()->sync($request->bonues);

                $user = User::where('id', $request->user_id)->first();
                $user->update([
                    'salary' => '1',
                  ]);
                session()->flash('Add_salary');
                return redirect('/salaries');
               }

            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }

    }

    public function show(Salary $salary)
    {
       // dd($salary->bonuses);
        return view ('salaries.show',compact('salary'));
    }

   
    public function edit(Salary $salary)
    {
        // dd($salary->bonuses);
        // $users = User::where('user_type','teacher')
        // ->orWhere('user_type','user')
        // ->get();
        
        // // $bonues =  Bonus::where('salary_id',$salary->id)->get();
        // // dd($bonues->pivot);
        // return view ('salaries.edit',compact('users','bonues','salary'));
    }

   
    public function update(UpdateSalaryRequest $request, Salary $salary)
    {
        //
    }

   
    public function destroy(Request $request)
    {
        $salary = Salary::where('id', $request->salary_id)->first();
        $salary->delete();
        session()->flash('delete_salary');
        return redirect('/salaries');
    }




}
