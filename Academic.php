<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;

    protected $table = 'academic';

    protected $fillable = [
        'student_id',
        'course',
        'year',
    ];

    public function student()
    {
        return $this->belongTo(Student::class, 'student_id', 'id', 'course', 'year');
    }
}
