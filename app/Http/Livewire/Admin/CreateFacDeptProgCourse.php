<?php

namespace App\Http\Livewire\Admin;

use App\Models\Assets;
use App\Models\Course;
use App\Models\Department;
use App\Models\DepartmentUser;
use App\Models\Program;
use App\Models\School;
use App\Models\SchoolUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateFacDeptProgCourse extends Component
{
    public $open_add_new_course = false;
    public $open_add_new_program = false;
    public $open_add_new_department = false;
    public $open_add_new_school = false;

    public $schools;
    public $school_id;
    public $school_title;
    public $school_code;
    public $school_no;
    public $school_type;

    public $departments;
    public $department_id;
    public $dept_title;
    public $dept_no;


    public $programs;
    public $program_id;
    public $pro_title;
    public $pro_code;
    public $pro_no;

    public $title;
    public $code;
    public $faculities;
    public $faculty;
    public $depts;

    public $programCourse;
    public $department_data;
    public $school_data;
    public $program_data;
    public $course_data;

    public $course_id;
    public $course_title;
    public $course_code;
    public $course_no;
    public $units;
    // public $semester;
    // public $level;


    public function rules(){
        return [
            'school_id'         => 'required',
            'school_title'      =>  ['required','min:3','max:150', 'regex:/^[\-a-zA-Z0-9(),.\'" ]*$/'],
            'school_code'       => 'required|alpha|max:8|min:3',
            'school_no'         => 'required|digits:2',
            'school_type'       => 'required',

            'department_id'   => 'required',
            'dept_title'      =>  ['required','min:3','max:150', 'regex:/^[\-a-zA-Z0-9(),.\'" ]*$/'],
            'dept_no'         => 'required|min:2|max:2',

            'course_title'    =>  ['required','min:3','max:150', 'regex:/^[\-a-zA-Z0-9(),.\'" ]*$/'],
            'course_code'     => 'required|min:3|max:15',
            'units'           => 'required|digits:1',
            // 'semester'     => 'required',
            // 'level'     => 'required|digits:3',
        ];
    }

    public function open_add_new_school_model()
    {
        $this->open_add_new_school = true;
    }

    public function done()
    {
        $this->open_add_new_course = false;
        $this->open_add_new_program = false;
        $this->open_add_new_department = false;
        $this->open_add_new_school = false;


        $this->resetValidation();
        $this->school_title ='';
        $this->school_code ='';
        $this->school_no ='';
        $this->school_type ='';
        $this->dept_title ='';
        $this->dept_code ='';
        $this->dept_no ='';
        $this->course_title ='';
        $this->course_code ='';
        $this->units ='';
        // $this->semester ='';
        // $this->level ='';
    }

    public function updatedSchoolId($school_id){
        $this->schools= School::with('departments')->whereId($school_id)->get();
        $this->departments = NULL;
        $this->programCourse = NULL;
    }

    public function updatedDepartmentId($value){
        $this->department_id = $value;
        $this->programs = Program::whereDepartmentId($value)->get();
        // dd($value);
        // $this->departments = Department::with('programs')->whereId($department_id)->get();
        $this->programCourse = NULL;
        $this->department_data = NULL;
        $this->program_data = NULL;
    }

    public function updatedProgramId($value){
        $this->program_id = $value;
        $this->programCourse = Course::whereProgramId($value)->get();
        // dd($this->programCourse);
         $this->department_data = NULL;

    }

    public function saveNewSchool(){

         $data =  $this->validate([
                    'school_title'       =>  ['required','min:3','max:150', 'regex:/^[\-a-zA-Z0-9(),.\'" ]*$/'],
                    'school_code'        => 'required|alpha|max:3|min:3',
                    'school_no'         => 'required|digits:2',
                    'school_type'         => 'required',
                  ]);

         School::create($data);

        $this->school_title = '';
        $this->school_code = '';
        $this->school_no = '';
        $this->school_type = '';
        $this->emit('saved');
        $this->schools= School::with('departments')->whereId($this->school_id)->get();
        $this->dispatchBrowserEvent('notify', 'Record Saved');
    }

    public function saveNewDepartment(){
        $this->school_id = $this->faculty->school_id;
        $data =   $this->validate([
                    'school_id'       => 'required',
                    'dept_title'        =>  ['required','min:3','max:150', 'regex:/^[\-a-zA-Z0-9(),.\'" ]*$/'],
                    'dept_no'         => 'required|min:2|max:2',
                  ]);

        $depts =  Department::create($data);

        $sch = School::find($this->school_id);

        $sch->departments()->save($depts);

        $this->dept_title = '';
        $this->dept_no = '';
        $this->emit('saved');
        $this->schools= School::with('departments')->whereId($this->school_id)->get();
        $this->dispatchBrowserEvent('notify', 'Record Saved');
    }

    public function saveNewProgramme(){

        $data = $this->validate([
            'department_id'   => 'required',
            'pro_title'        =>  ['required','min:3','max:150', 'regex:/^[\-a-zA-Z0-9(),.\'" ]*$/'],
            'pro_code'         => 'required|regex:/^[a-zA-Z ]*$/|min:2|max:15',
        ]);

        $program =  Program::create($data);

        $dept = Department::find($this->department_id);

        $dept->programs()->save($program);

        $this->pro_title = '';
        $this->pro_code = '';

        $this->emit('saved');
        $this->departments = Department::with('programs')->whereId($this->department_id)->get();
        $this->dispatchBrowserEvent('notify', 'Record Saved');
    }

    public function saveNewCourse(){

           $data = $this->validate([
                    // 'school_id'       => 'required',
                    // 'department_id'   => 'required',
                    'program_id'      => 'required',
                    'course_title'    =>  ['required','min:3','max:150', 'regex:/^[\-a-zA-Z0-9(),.\'" ]*$/'],
                    'course_code'     => 'required|min:3|max:15',
                    'units'           => 'required|digits:1',
                    // 'semester'        => 'required|in:'.collect(Assets::SEMESTER)->keys()->implode(','),
                    // 'level'           => 'required|in:'.collect(Assets::LEVEL)->keys()->implode(','),
                  ]);

        $course = Course::create($data);

        $program =  Program::whereId($this->program_id)->first();
        $program->courses()->save($course);

        $this->course_title = '';
        $this->course_code = '';
        $this->units = '';
        // $this->semester = '';
        // $this->level = '';

        $this->emit('saved');
        $this->programCourse = Program::with('courses')->whereId($this->program_id)->get();
        $this->dispatchBrowserEvent('notify', 'Record Saved');

    }

    // public function fetch_school()
        // {
        //     $this->school_data = School::find($this->dept->school->id);
        //     $this->school_title = $this->school_data->school_title;
        //     $this->school_code = $this->school_data->school_code;
        //     $this->school_no = $this->school_data->school_no;
        //     $this->school_type = $this->school_data->school_type;
    // }

    public function fetch_department()
    {
        $this->department_data = Department::find($this->department_id);
        $this->dept_title = $this->department_data->dept_title;
        $this->dept_no = $this->department_data->dept_no;
    }

    public function fetch_program()
    {
        $this->program_data = Program::find($this->program_id);
        $this->pro_title = $this->program_data->pro_title;
        $this->pro_code = $this->program_data->pro_code;
        $this->pro_no = $this->program_data->pro_no;
    }

    // public function updateSchool()
        // {
        //     $data =   $this->validate([
        //         'school_title'         => 'required|max:50|min:3|regex:/^[a-zA-Z ]*$/',
        //         'school_code'          => 'required|alpha|max:8|min:3',
        //         'school_no'            => 'required|numeric|max:8',
        //         // 'school_type'          => 'required',
        //       ]);

        //       School::find($this->school_id)->update($data);
        //       $this->dispatchBrowserEvent('notify', 'Record Updated');
    // }

    public function update_department()
    {
        $data =   $this->validate([
            'dept_title'        =>  ['required','min:3','max:150', 'regex:/^[\-a-zA-Z0-9(),.\'" ]*$/'],
            'dept_no'         => 'required|min:2|max:2',
          ]);

        Department::find($this->department_id)->update($data);
        $this->dispatchBrowserEvent('notify', 'Record Updated');
    }

    public function update_program()
    {
        $data = $this->validate([
            'pro_title'        =>  ['required','min:3','max:150', 'regex:/^[\-a-zA-Z0-9(),.\'" ]*$/'],
            'pro_code'         => 'required|regex:/^[a-zA-Z-]*$/|min:2|max:15',
        ]);

        Program::find($this->program_id)->update($data);
        $this->dispatchBrowserEvent('notify', 'Record Updated');
    }

    public function update_course()
    {
        $data = $this->validate([
            'pro_title'        =>  ['required','min:3','max:150', 'regex:/^[\-a-zA-Z0-9(),.\'" ]*$/'],
            'pro_code'         => 'required|regex:/^[a-zA-Z-]*$/|min:2|max:15',
        ]);

        Program::find($this->program_id)->update($data);
        $this->dispatchBrowserEvent('notify', 'Record Updated');
    }

    public function mount()
    {
        // $this->faculty = SchoolUser::whereUserId(auth()->id())->first();




    }

    public function render()
    {
        $depart = DepartmentUser::whereUserId(auth()->id())->first();

        $this->department = Department::whereId($depart->department_id)->first();

        // dd($this->department->school_id);

        $this->departments = Department::whereSchoolId($this->department->school_id)->get();

        $this->faculities = School::whereId($this->department->school_id)->first();

        return view('livewire.admin.create-fac-dept-prog-course');
    }
}
