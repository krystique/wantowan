<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'country';

    protected $fillable = [
        'student_id',
        'continent',
        'country_name',
        'capital',
    ];

    public function student()
    {
        return $this->belongTo(Student::class, 'student_id', 'id', 'continent', 'country_name', 'capital');
    }
}