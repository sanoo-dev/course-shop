<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'student_name',
        'student_email',
        'student_phone',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
