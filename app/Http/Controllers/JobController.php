<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Http\Request;

class JobController extends Controller
{
   
    public function index()
    {
        $jobs =  Job::all();
        return view ('jobs.index',compact('jobs'));
    }

   
    public function store(StoreJobRequest $request)
    {
        try {
            $validated = $request->validated();
            Job::create([
                'name' => $request->name,
               
                ]);
    
                session()->flash('Add_job');
                return redirect('/jobs');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
           
    }

    
    public function show(Job $job)
    {
        return view ('jobs.show',compact('job'));
    }

   
    public function edit(Job $job)
    {
        return view ('jobs.edit',compact('job'));
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        try {
                $job = Job::find($job->id);
                    $job->update([
                        'name' => $request->name,
                    ]);
                    session()->flash('edit_job');
                    return redirect('/jobs');
           }
    
        catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }

    }

    public function destroy(Request $request)
    {
       
        $job = Job::where('id', $request->job_id)->first();
        $job->delete();
        session()->flash('job_dept');
        return redirect('/jobs');
    }
}
