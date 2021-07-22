<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the programme that owns the course.
     *
     * @return void
     */
    public function program(){
        return $this->belongsTo(Program::class);
    }

    /**
     * Get the Department that owns the courses
     *
     * @return void
     */
    public function departments(){
        return $this->belongsToMany(Department::class)
        ->withTimestamps()
        ->withPivot(['department_id', 'semester_offer', 'level', 'status']);
    }


    public function student_course()
    {
        $std = Student::whereUserId(auth()->id())->first();

        return CourseDepartment::whereDepartmentId($std->department_id)->get();

    }

    // public function subsidiries(){

    //     $department = DepartmentUser::whereUserId(auth()->id())->first();
    //     return $this->belongsToMany(Department::class)->withPivot(['department_id','course_code','course_title','semester_offer','level'])
    //     ->wherePivot('department_id', $department->department_id)
    //     ->wherePivot('level', 100);
    // }

    /**
     * Get the exam record for the course
     *
     * @return void
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function student()
    {
        return $this->belongsToMany(Student::class);
    }
}
