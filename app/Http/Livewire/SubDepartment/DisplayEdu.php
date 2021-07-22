<?php

namespace App\Http\Livewire\SubDepartment;

use App\Models\Assets;
use App\Models\Course;
use App\Models\CourseDepartment;
use App\Models\Department;
use App\Models\DepartmentUser;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DisplayEdu extends Component
{
    protected $listeners = ['deleted' => '$refresh', 'updated' => '$refresh' , 'edited' => '$refresh'];

    public $student_courses;

    public $edit_student_courses;

    public $edit_course_modal = false;

    public $department;

    public $depart;

    public $course_id;

    public $course_title;

    public $course_code;

    public $units;

    public $mode;

    public $elective;

    public $pre_requisite;

    public $level;

    public $status;

    public $active;

    public $semester_offer;

    public $semester_pivot_offer;

    public $level_pivot_offer;

    public $semester;

    public $year;

    public $edu_department;

    public $biological;

    public $zoo;

    public $sortField = 'dept_title';

    public $sortDirection = 'desc';


    public function open_edit_modal($id , $dept_id, $created_at, $updated_at){

        $pivot_semester_level = CourseDepartment::whereCourseId($id)->whereDepartmentId($dept_id)->whereCreated_at($created_at)->whereUpdated_at($updated_at)->first();

        $this->edit_student_courses = Course::whereId($id)->first();

        $this->course_id = $id;

        $this->course_title   = $this->edit_student_courses->course_title;
        $this->course_code    = $this->edit_student_courses->course_code;
        $this->units          = $this->edit_student_courses->units;
        $this->mode           = $this->edit_student_courses->mode;
        $this->elective       = $this->edit_student_courses->elective;
        $this->pre_requisite  = $this->edit_student_courses->pre_requisite;

        $this->semester_pivot_offer = $pivot_semester_level->semester_offer;

        $this->level_pivot_offer    = $pivot_semester_level->level;

        $this->edit_course_modal = true;
    }

    public function confirmCourse($id , $dept_id, $created_at, $updated_at){

        $this->status = "approved";

        $PivotUpdate = $this->validate([
            'status' => 'required'
        ]);

        $updateCourse = CourseDepartment::whereCourseId($id)->whereDepartmentId($dept_id)->whereCreated_at($created_at)->whereUpdated_at($updated_at)->first();

        CourseDepartment::find($updateCourse->id)->update($PivotUpdate);

        $this->dispatchBrowserEvent('notify', 'Course Approved');

        $this->emit('updated');
    }

    public function deleteCourse($id , $dept_id, $created_at, $updated_at){

       $deleteCourse = CourseDepartment::whereCourseId($id)->whereDepartmentId($dept_id)->whereCreated_at($created_at)->whereUpdated_at($updated_at)->first();

        CourseDepartment::find($deleteCourse->id)->delete();

        $this->student_courses->refresh;

        // $this->student_courses  = Department::with(['subsidiries' => function($query){

        //     $query->whereLevel($this->edit_level)->whereSemesterOffer($this->semester)->get();

        // }])->whereId($this->depart->department_id)->get();

        $this->dispatchBrowserEvent('notify', 'Course Deleted');

    }

    public function updateCourse(){

        $Coursedata = $this->validate([
            'course_title'    => ['required','min:3','max:150', 'regex:/^[\-a-zA-Z0-9(),.\'" ]*$/'],
            'course_code'     => 'required|min:3|max:10',
            'units'           => 'nullable|digits:1',
            'mode'            => 'required|in:'.collect(Assets::MODE)->keys()->implode(','),
            'elective'        => 'required|in:'.collect(Assets::ELECTIVE)->keys()->implode(','),
            'pre_requisite'   => 'required|in:'.collect(Assets::PRE_REQUISITE)->keys()->implode(','),
          ]);


        $this->level = $this->level_pivot_offer;
        $this->semester_offer = $this->semester_pivot_offer;

        $Pivotdata = $this->validate([
            'level'           => 'required|in:'.collect(Assets::LEVEL)->keys()->implode(','),
            'semester_offer'        => 'required|in:'.collect(Assets::SEMESTER)->keys()->implode(','),
        ]);

        DB::transaction(function () use($Coursedata,  $Pivotdata) {

            Course::find($this->course_id)->update($Coursedata);

            CourseDepartment::whereCourseId($this->course_id)->update($Pivotdata);

        });

        $this->dispatchBrowserEvent('notify', 'Update was Successfull');
        $this->emit('edited');
        $this->edit_course_modal = false;

        $this->course_title = '';
        $this->course_code = '';
        $this->units = '';
        $this->mode = '';
        $this->elective = '';
        $this->pre_requisite = '';
        $this->level_pivot_offer = '';
        $this->semester_pivot_offer = '';
        // dd($course_id);
    }

    public function done(){
            $this->edit_course_modal = false;

            $this->course_title = '';
            $this->course_code = '';
            $this->units = '';
            $this->mode = '';
            $this->elective = '';
            $this->pre_requisite = '';
            // dd($course_id);
    }

    public function updatedEduDepartment($value){

        $this->active = $value;

        $this->department = Department::whereId($value)->first();

        $this->student_courses  = Department::with(['subsidiries' => function($query){
            $query->whereLevel($this->year)->whereSemesterOffer($this->semester)->get();
        }])->whereId($this->active)->get();
    }


    public function updatedSemester($value){

        $this->department = Department::whereId($value)->first();

        $this->student_courses  = Department::with(['subsidiries' => function($query){
            $query->whereLevel($this->year)->whereSemesterOffer($this->semester)->get();
        }])->whereId($this->active)->get();
    }

    public function updatedYear($value){

        $this->department = Department::whereId($value)->first();

        $this->student_courses  = Department::with(['subsidiries' => function($query){
            $query->whereLevel($this->year)->whereSemesterOffer($this->semester)->get();
        }])->whereId($this->active)->get();
    }

    public function render()
    {
        return view('livewire.sub-department.display-edu');
    }
}
