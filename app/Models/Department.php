<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Get the Faculty/college that owns the department.
     *
     * @return void
     */
    public function school(){
        return $this->belongsTo(School::class);
    }

    /**
     * Get the programmes for the department.
     *
     * @return void
     */
    public function programs(){
        return $this->hasMany(Program::class);
    }

    /**
     * Get students that belongs to the department
     *
     * @return void
     */
    public function students(){
        return $this->hasMany(Student::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    /**
     * courses
     *
     * @return void
     */
    public function courses(){

        return $this->belongsToMany(Course::class)->withTimestamps()->withPivot(['department_id', 'semester_offer', 'level', 'status']);
    }


    public function student_subsidiries()
    {

        return $this->belongsToMany(Course::class)
            ->withTimestamps()
            ->withPivot(['department_id', 'semester_offer', 'level', 'status']);
            // ->wherePivot('semester_offer', 'FIRST');
    }

    public function subsidiries()
    {
        // $department = DepartmentUser::whereUserId(auth()->id())->first();
        $departments =  $this->belongsToMany(Course::class)
            ->withTimestamps()
            ->withPivot(['department_id', 'semester_offer', 'level', 'status']);
            // ->wherePivot('department_id', $department->department_id);

        return $departments;
    }


    public function sumUnits(){

        // $student = Student::whereUserId(auth()->id())->first();
        // $courseId = CourseDepartment::whereDepartmentId($student->department_id)->whereSemesterOffer('First')->get();
        // $c = DB::table('course')->sum('units');
        // dd($c);
        // return $c;
    }


}
