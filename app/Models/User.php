<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Degree;
use App\Models\Location;
use App\Models\Job;
use App\Models\Specialty;
use App\Models\Leave;
use App\Models\Demission;
use App\Models\Salary;
use App\Models\Bromotion;
use App\Models\Dept;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    use SoftDeletes;
    use HasRoles;
    /**
     * The attributes that are mass assignable. 
     *
     * @var string[]
     */
    use SoftDeletes;
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles_name' => 'array',
    ];

    

    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }

    public function dept()
    {
        return $this->belongsTo(Dept::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function leaves()
    {
         return $this->hasMany(Leave::class);
    } 

    public function bromotions()
    {
         return $this->hasMany(Bromotion::class);
    } 


    public function demissions()
    {
         return $this->hasMany(Demission::class);
    } 

    public function salary()
    {
        return $this->hasOne(Salary::class);
    }

}//end og model
