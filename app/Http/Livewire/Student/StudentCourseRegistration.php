<?php

namespace App\Http\Livewire\Student;

use App\Models\Course;
use App\Models\CourseDepartment;
use App\Models\CourseStudent;
use App\Models\Department;
use App\Models\Level;
use App\Models\Program;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StudentCourseRegistration extends Component
{
    public $stdId;

    public $student_course_first= [];

    public $student_course_second= [];

    public $confirmed = true;

    public $department_id;

    public $student_level;

    public $second_selected = [];

    public $subsidiaries;

    public $elective_selected = [];


    public function updateStudentOffer()
    {
        //  dd($this->elective_selected.);
        //  dd($this->second_selected);
        //  dd($this->sub_selected);
        //  dd($this->sub_selected);

        foreach ($this->subsidiaries as $key => $department) {

            foreach ($department->student_subsidiries as $key => $course) {
                if(($course->pivot->level === $this->stdId->level) && ($course->pivot->semester_offer === 'FIRST') && ($course->elective != 'Elective')){
                    // dd($course->program_id.''.$course->course_code.''.$course->course_title);

                    $this->student_course_first[] = $course->id;
                }

                if(($course->pivot->level === $this->stdId->level) && ($course->pivot->semester_offer === 'SECOND') && ($course->elective != 'Elective')){
                    // dd($course->program_id.''.$course->course_code.''.$course->course_title);

                    $this->student_course_second[] = $course->id;
                }

            }

        }

        DB::transaction(function () {

            foreach ($this->student_course_first as $key => $course) {

                CourseStudent::upsert([['course_id' => $course, 'student_id' => $this->stdId->id]], ['course_id'], ['student_id']);
            }

            foreach ($this->student_course_second as $key => $course) {

                CourseStudent::upsert([['course_id' => $course, 'student_id' => $this->stdId->id]], ['course_id'], ['student_id']);
            }

            foreach ($this->elective_selected as $key => $course) {

                CourseStudent::upsert([['course_id' => $course, 'student_id' => $this->stdId->id]],  ['course_id'], ['student_id']);
            }

            // ->update(['course_set' => 1])

            // $student = Student::find($this->stdId->id);

            Level::create([
                'student_id' => $this->stdId->id,
                'student_level' => $this->stdId->level
            ]);

        });


        // $this->confirmed = false;

        // dd($this->student_course);
    }


    public function mount()
    {
        $this->user = User::whereId(auth()->id())->first();
    }

    public function render(){

        $this->stdId = Student::whereStudentIdNumber($this->user->name)->first();
        // dd($this->stdId->level);

        // $this->student_level = Level::whereStudentId($this->stdId->id)->whereStudentLevel($this->stdId->level)->first();

        // dd($this->student_level->student_level);

        $this->subsidiaries   = Department::with('student_subsidiries')->whereId($this->stdId->department_id)->get();

        // dd($this->subsidiaries);
        // $this->sumU ;


        // $courseId = CourseDepartment::whereDepartmentId($this->stdId->department_id)->whereSemesterOffer('First')->get();
        // $c = DB::table('courses')->sum('units');
        // dd($c);


        return view('livewire.student.student-course-registration');

    }
}
