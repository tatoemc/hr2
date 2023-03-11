<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Dept;
use App\Models\User;
use App\Models\Payroll;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    
    public function index(Request $request)
    {
      // dd($request->all());
        

           try {

                if($request->rdio == 1)
                {
                    $depts = Dept::all();
                    return view ('reports.index',compact('depts'));

                }
                elseif($request->rdio == 2)
                {
                    $teachers = User::where('user_type','teacher')->get();
                    return view ('reports.index',compact('teachers'));
                }
                elseif($request->rdio == 3)
                {
                    $leaves = Leave::all();
                    return view ('reports.index',compact('leaves'));
                }
                elseif($request->rdio == 4)
                {
                  
                    $salaries = Payroll::select(
                        DB::raw('YEAR(created_at) as year'),
                        DB::raw('MONTH(created_at) as month'),
                        DB::raw('SUM(amount) as amount')
                    )->groupBy('month')->get();
                    return view ('reports.index',compact('salaries'));

                }
                
              }
       
            
           catch (\Exception $e){
             return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }

          

      

 
     
        

    }

   
    public function create(Request $request)
    {
        return view ('reports.create');
    
    }

    
    public function store(Request $request)
    {
        
     
    }

   
   

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
