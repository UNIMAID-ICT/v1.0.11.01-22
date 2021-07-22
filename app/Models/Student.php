<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     *Get the Student that owns the user Account.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the Student department
     *
     * @return void
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the student exams
     *
     * @return void
     */
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    // public function photoUrl(){
    //     return $this->photo ? Storage::disk('photos')->url($this->photo)
    //     : url('ICjwqSwSezoM74SRDOiRdY1LjeVffWyOCa3B2gHy.png');
    // }

    public function courses(){
        return $this->belongsToMany(Course::class);
    }

    public function levels(){
        return $this->belongsTo(Level::class);
    }
}
