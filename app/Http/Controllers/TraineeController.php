<?php

namespace App\Http\Controllers;

use App\Models\Trainee;
use App\Models\Job;
use App\Models\User;
use App\Models\Degree;
use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTraineeRequest;
use App\Http\Requests\UpdateTraineeRequest;
use Hash;

class TraineeController extends Controller
{
   
    public function index()
    {
        $trainees =  User::where('user_type','trainee')->get();
        return view ('trainees.index',compact('trainees'));
    }

    public function create()
    {
        $degrees = Degree::all();
        $jobs = Job::all();
        $specialties= Specialty::all();
       
        return view('trainees.create',compact('jobs','degrees','specialties')); 
    }

    
    public function store(StoreTraineeRequest $request)
    {
        try {
            //$validated = $request->validated();
           User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make ($request->password),
            'user_type' => $request->user_type,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'user_type' => 'trainee',
            'job_id' => $request->job_id,
            'address' => $request->address,
            'specialty_id'  => $request->specialty_id,
                ]);
    
                session()->flash('Add_trainee');
                return redirect('/trainees');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

    
    public function show(Trainee $trainee)
    {
        //
    }

    
    public function edit(Trainee $trainee)
    {
        //
    }

  
    public function update(UpdateTraineeRequest $request, Trainee $trainee)
    {
        //
    }

   
    public function destroy(Trainee $trainee)
    {
        //
    }

    
}
