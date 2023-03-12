<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Degree;
use App\Models\Specialty;
use App\Models\Job;
use Hash;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:عرض مستخدم', ['only' => ['index']]);
        $this->middleware('permission:اضافة مستخدم', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل مستخدم', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف مستخدم', ['only' => ['destroy']]);
    }
    
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(10);
         return view('users.index',compact('data'))
         ->with('i', ($request->input('page', 1) - 1) * 10);
    }

   
    public function create()
    {
        $jobs = Job::all();
        $degrees = Degree::all();
        $specialties= Specialty::all();
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles','jobs','degrees','specialties'));
    }

    
    public function store(StoreUserRequest $request)
    {
        try {
                $validated = $request->validated(); 

                if($request->roles_name[0] == 'مدير الموارد البشرية')
                {
                      $user = new User; 
                      $user->name = $request->name;
                      $user->email = $request->email;
                      $user->password =  Hash::make($request['password']);
                      $user->user_type = 'admin';
                      $user->roles_name = $request->roles_name;
                      $user->degree_id = $request->degree_id;
                      $user->job_id = $request->job_id;
                      $user->specialty_id = $request->specialty_id; 
                      $user->phone = $request->phone; 
                      $user->gender = $request->gender;
                      $user->address = $request->address;

                      if ($request->hasFile('file')) {
                        $image = $request->file('file');
                        $filename = time() . '.' . $image->getClientOriginalExtension();
                        $location = public_path('certificate/' . $filename);
                        Image::make($image)->resize(300, 300)->save($location);
    
                        $user->file = $filename; 
                       } 

                      $user->save();
                      
                      $user->assignRole($request['roles_name']); 
  
                }
                elseif($request->roles_name[0] == 'استاذ')
                {
                      $user = new User; 
                      $user->name = $request->name;
                      $user->email = $request->email;
                      $user->password =  Hash::make($request['password']);
                      $user->user_type = 'teacher';
                      $user->roles_name = $request->roles_name;
                      $user->degree_id = $request->degree_id;
                      $user->job_id = $request->job_id;
                      $user->specialty_id = $request->specialty_id; 
                      $user->phone = $request->phone; 
                      $user->gender = $request->gender;
                      $user->address = $request->address;

                      if ($request->hasFile('file')) {
                        $image = $request->file('file');
                        $filename = time() . '.' . $image->getClientOriginalExtension();
                        $location = public_path('certificate/' . $filename);
                        Image::make($image)->resize(300, 300)->save($location);
    
                        $user->file = $filename; 
                       } 

                      $user->save();
                      
                      $user->assignRole($request['roles_name']); 
  
                }
                elseif($request->roles_name[0] == 'موظف موارد بشرية')
                {
                      $user = new User; 
                      $user->name = $request->name;
                      $user->email = $request->email;
                      $user->password =  Hash::make($request['password']);
                      $user->user_type = 'user';
                      $user->roles_name = $request->roles_name;
                      $user->degree_id = $request->degree_id;
                      $user->job_id = $request->job_id;
                      $user->specialty_id = $request->specialty_id; 
                      $user->phone = $request->phone; 
                      $user->gender = $request->gender;
                      $user->address = $request->address;

                      if ($request->hasFile('file')) {
                        $image = $request->file('file');
                        $filename = time() . '.' . $image->getClientOriginalExtension();
                        $location = public_path('certificate/' . $filename);
                        Image::make($image)->resize(300, 300)->save($location);
    
                        $user->file = $filename; 
                       } 

                      $user->save();
                      
                      $user->assignRole($request['roles_name']); 
  
                }
                elseif($request->roles_name[0] == 'متدرب')
                {
                      $user = new User; 
                      $user->name = $request->name;
                      $user->email = $request->email;
                      $user->password =  Hash::make($request['password']);
                      $user->user_type = 'traine';
                      $user->roles_name = $request->roles_name;
                      $user->degree_id = $request->degree_id;
                      $user->job_id = $request->job_id;
                      $user->specialty_id = $request->specialty_id; 
                      $user->phone = $request->phone; 
                      $user->gender = $request->gender;
                      $user->address = $request->address;

                      if ($request->hasFile('file')) {
                        $image = $request->file('file');
                        $filename = time() . '.' . $image->getClientOriginalExtension();
                        $location = public_path('certificate/' . $filename);
                        Image::make($image)->resize(300, 300)->save($location);
    
                        $user->file = $filename; 
                       } 

                      $user->save();
                      
                      $user->assignRole($request['roles_name']); 
  
                }
                // $input = $request->except(['confirm-password']);
                // $input['password'] = Hash::make($input['password']);
                // $user = User::create($input); 
                // $user->assignRole($request->input('roles_name'));
 
                session()->flash('user_add'); 
                return redirect('/users');
            }
    
        catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }

            
           
    }

    
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $degrees =  Degree::all();
        $jobs =  Job::all();
        $specialties =  Specialty::all();
       
        return view('users.edit',compact('user','roles','userRole','degrees','jobs','specialties'));
    }

    
    public function update(Request $request, $id)
    {
        //dd($request->all());
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            ]);
            $input = $request->all();
            
            $user = User::find($id);
            $user->update($input);
            // DB::table('model_has_roles')->where('model_id',$id)->delete();
            // $user->assignRole($request->input('roles_name'));
           
            session()->flash('user_update');
            return redirect('/users');
            
    }

    public function destroy(Request $request, $id)
    {
        User::find($request->user_id)->delete();
        session()->flash('user_delete');
        return redirect('/users');
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
      }
      
      public function changePassword(Request $request){
      
       
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->withErrors(['error' => 'كلمة المرور غير صحيحة']);
        }
      
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->withErrors(['error' => 'لايمكن ادخال نفس كلمة المرور القديمة']);
        }
      
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
      
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
      
        session()->flash('change-password');
        return redirect()->back();
      
      }


}// End of controller
