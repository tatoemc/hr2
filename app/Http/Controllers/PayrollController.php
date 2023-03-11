<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\User;
use App\Models\Salary;
use App\Http\Requests\StorePayrollRequest;
use App\Http\Requests\UpdatePayrollRequest;

class PayrollController extends Controller
{
   
    public function index()
    {
        $salaries =  Salary::withCount('bonuses')->get(); 
        return view ('payrolls.index',compact('salaries'));
    }

   
    public function create()
    {
        //
    }

    public function store(StorePayrollRequest $request)
    {

       try {
                $salaries = Salary::with('bonuses')->get();
                foreach($salaries as $salary)
                {
                    Payroll::create([
                        'user_id' => $salary->user_id,
                        'amount' => $salary->amount + $salary->bonuses->sum('amount'),
                        ]);
                }
                session()->flash('add_Payroll');
                return redirect('/payrolls');
           }

            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }


    }

    
    public function show(Payroll $payroll)
    {
        //
    }

    public function edit(Payroll $payroll)
    {
        //
    }

    public function update(UpdatePayrollRequest $request, Payroll $payroll)
    {
        //
    }

    public function destroy(Payroll $payroll)
    {
        //
    }




}
