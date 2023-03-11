<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

//class BonusSalary extends Model
class BonusSalary extends Pivot
{
    use HasFactory;
    public $incrementing = true;

   
    
}
