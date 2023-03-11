<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Job;
use App\Models\User;
use App\Models\Degree;
use App\Models\Specialty;
use App\Models\Dept;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Hash;
use Storage; 
use Image;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers =  User::where('user_type','teacher')->get();
        return view ('teachers.index',compact('teachers'));
    }

   
    public function create()
    {
        $degrees = Degree::all();
        $depts = Dept::all();
        $jobs = Job::all();
        $specialties= Specialty::all();
       
        return view('teachers.create',compact('jobs','depts','degrees','specialties')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request)
    {
        try {
       
                $user = new User;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make ($request->password);
                $user->user_type = $request->user_type;
                $user->gender = $request->gender;
                $user->phone = $request->phone;
                $user->job_id = $request->job_id;
                $user->dept_id = $request->dept_id;
                $user->degree_id = $request->degree_id;
                $user->address = $request->address;
                $user->specialty_id = $request->specialty_id;
        
                if ($request->hasFile('file')) {
                    $image = $request->file('file');
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                    $location = public_path('certificate/' . $filename);
                    Image::make($image)->resize(300, 300)->save($location);

                    $user->file = $filename; 
                } 
                
                $user->save();


                session()->flash('Add_trainee');
                return redirect('/teachers');
           }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

    
    public function show($id)
    {
    
        $user = User::where('id',$id)->first();
        return view('teachers.show',compact('user')); 
    }

   
    public function edit(Teacher $teacher)
    {
        //
    }

   
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        //
    }

   
    public function destroy(Request $request, $id)
    {
        User::find($request->user_id)->delete();
        session()->flash('user_delete');
        return redirect('/teachers');
    }
}
