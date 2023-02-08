<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'teacher_id',
        'name',
        'image',
        'desc',
        'price',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function forms()
    {
        return $this->hasMany(Form::class);
    }

    public function getAvailableCoursesByCategory($category_id)
    {
        return Category::find($category_id)
            ->courses->where('status', 1);
    }

    public function getAvailableCourses($paginate)
    {
        return $this->where('status', 1)->paginate($paginate);
    }

    public function checkHaveCategory()
    {
        return count(Category::all());
    }

    public function checkHaveTeacher()
    {
        return count(Teacher::all());
    }
}
