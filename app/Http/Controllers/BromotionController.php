<?php

namespace App\Http\Controllers;

use App\Models\Bromotion;
use App\Models\Degree;
use App\Models\User;
use App\Http\Requests\StorebromotionRequest;
use App\Http\Requests\UpdatebromotionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage; 
use Image;

class BromotionController extends Controller
{
    
    public function index()
    {

        if(Auth::user()->user_type == 'admin')
        {
            $bromotions =  Bromotion::where('status',1)->get();
            
        }
        else{ 
            $bromotions =  Bromotion::where('user_id',Auth::user()->id)
            ->where('status',1)
            ->get();
        }
        
        return view ('bromotions.index',compact('bromotions'));

    }

   
    public function create()
    {
        $degrees =  Degree::all();
        $users = User::where('user_type','teacher')
        ->orWhere('user_type','user')
        ->get();
        
        return view ('bromotions.create',compact('users','degrees'));
    }

   
    public function store(StorebromotionRequest $request)
    {
        try {

            $bromotion = new Bromotion;
            $bromotion->note = $request->note;
            $bromotion->user_id = Auth::user()->id;
            $bromotion->degree_id = Auth::user()->degree_id;

            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('certificate/' . $filename);
                Image::make($image)->resize(300, 300)->save($location);
    
                $bromotion->file = $filename; 
            } 
            $bromotion->save();
            session()->flash('Add_bromotions');
                return redirect('/bromotions');

           }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }


    }

   
    public function show(Bromotion $bromotion)
    {
        //
    }

   
    public function edit($id)
    {
        
        $user = User::find($id);
        $degrees =  Degree::all();
        return view ('bromotions.edit',compact('user','degrees'));
    }
 
    
    public function update(Request $request)
    {
       $user = User::find($request->user_id);
      
       $user->update([
        'degree_id' => $request->degree_id,
      ]);

      Bromotion::create([
        'user_id' => $request->user_id,
        'degree_id' => $request->degree_id,
        'status' => '1',
      
        ]);

      
      
      return redirect('/bromotions');
    }

   
    public function destroy(Bromotion $bromotion)
    {
        //
    }


}
