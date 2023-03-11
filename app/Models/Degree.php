<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Leave;
use App\Models\User;
use App\Models\Bromotion;


class Degree extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];


    public function leaves()
    {
         return $this->hasMany(Leave::class);
    } 
    public function bromotions()
    {
         return $this->hasMany(Bromotion::class);
    } 

}
