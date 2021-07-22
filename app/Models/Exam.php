<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    /**
     * Get the courses for the exams
     *
     * @return void
     */
    public function courses()
    {
        return $this->hasMany(Exam::class);
    }
    
    /**
     * Get the result for the student
     *
     * @return void
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
