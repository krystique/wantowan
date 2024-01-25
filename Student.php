<?php

namespace App\Models;

use App\Models\Academic;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'student_id',
        'name',
        'age',
        'address',
    ];
    
    public function academic() 
    {
        return $this->hasOne(Academic::class, 'student_id','id','course','year');
    }

    public function country() 
    {
        return $this->hasOne(Country::class, 'student_id','id', 'continent', 'country_name', 'capital');
    }

}
