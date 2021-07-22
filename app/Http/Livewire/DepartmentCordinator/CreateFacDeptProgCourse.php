<?php

namespace App\Http\Livewire\DepartmentCordinator;

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
    public $dept_code;
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
    public $dept;

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
    public $semester;
    public $level;


    public function rules(){
        return [
            'school_id'       => 'required',
            'school_title'       => 'required|regex:/^[a-zA-Z ]*$/',
            'school_code'       => 'required|alpha|max:8|min:3',
            'school_no'       => 'required|digits:2',
            'school_type'       => 'required',

            'department_id'   => 'required',
            'dept_title'    => 'required|regex:/^[a-zA-Z ]*$/',
            'dept_code'     => 'required|alpha',
            'dept_no'     => 'required|digits:2',

            'course_title'    => 'required|regex:/^[a-zA-Z ]*$/',
            'course_code'     => 'required|alpha|max:8|min:3',
            'course_no'     => 'required|digits:3',
            'units'     => 'required|digits:1',
            'semester'     => 'required',
            'level'     => 'required|digits:3',
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
        $this->course_no ='';
        $this->units ='';
        $this->semester ='';
        $this->level ='';
    }

    public function updatedSchoolId($school_id){
        $this->schools= School::with('departments')->whereId($school_id)->get(); 
        $this->departments = NULL;  
        $this->programCourse = NULL;  
    }

    public function updatedDepartmentId($department_id){

        $this->departments = Department::with('programs')->whereId($department_id)->get();
        $this->programCourse = NULL; 
        $this->department_data = NULL; 
        $this->program_data = NULL; 
    }

    public function updatedProgramId($program_id){

         $this->programCourse = Program::with('courses')->whereId($program_id)->get();
        //  $this->department_data = NULL; 
         
    }

    public function saveNewSchool(){

         $data =  $this->validate([
                    'school_title'       => 'required|alpha|max:50|min:4',
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
    }

    public function saveNewDepartment(){

        $data =   $this->validate([
                    'school_id'       => 'required',
                    'dept_title'        => 'required|regex:/^[a-zA-Z ]*$/',
                    'dept_code'         => 'required|alpha|min:3|max:3',
                    'dept_no'         => 'required|digits:2',
                  ]);

        $depts =  Department::create([
            'dept_title' => $this->dept_title,
            'dept_code' => $this->dept_code,
            'dept_no' => $this->dept_no,
        ]);
                       
        $sch = School::find($this->school_id);

        $sch->departments()->save($depts);
        
        $this->dept_title = '';
        $this->dept_code = '';
        $this->dept_no = '';
        $this->emit('saved');
        $this->schools= School::with('departments')->whereId($this->school_id)->get(); 
    }

    public function saveNewProgramme(){
        
        $this->validate([
            'school_id'       => 'required',
            'department_id'   => 'required',
            'pro_title'        => 'required|regex:/^[a-zA-Z ]*$/',
            'pro_code'         => 'required||regex:/^[a-zA-Z ]*$/|min:2|max:3',
        ]);

        $program =  Program::create([
            'pro_title' => $this->pro_title,
            'pro_code' => $this->pro_code
        ]);

        $dept = Department::find($this->department_id);
        
        $dept->programs()->save($program);
        
        $this->pro_title = '';
        $this->pro_code = '';
        
        $this->emit('saved');
        $this->departments = Department::with('programs')->whereId($this->department_id)->get();
    }

    public function saveNewCourse(){
        
           $this->validate([
                    'school_id'       => 'required',
                    'department_id'   => 'required',
                    'program_id'      => 'required',
                    'course_title'    => 'required|min:3|max:50|regex:/^[a-zA-Z ]*$/',
                    'course_code'     => 'required|alpha|min:3|max:8',
                    'course_no'       => 'required|digits:2',
                    'units'           => 'required|digits:1',
                    'semester'        => 'required|in:'.collect(Assets::SEMESTER)->keys()->implode(','),
                    'level'           => 'required|digits:3',
                  ]);
                  
        $course = Course::create([
            'course_title' => $this->course_title,
            'course_code' => $this->course_code,
            'course_no' => $this->course_no,
            'units' => $this->units,
            'semester' => $this->semester,
            'level' => $this->level,
        ]);

        

        $program =  Program::whereId($this->program_id)->first();
        $program->courses()->save($course);

        $this->course_title = '';
        $this->course_code = '';
        $this->units = '';
        $this->semester = '';
        $this->level = '';

        $this->emit('saved');
        $this->programCourse = Program::with('courses')->whereId($this->program_id)->get();
    }

    public function fetch_school()
    {
        $this->school_data = School::find($this->dept->school->id);
        $this->school_title = $this->school_data->school_title;
        $this->school_code = $this->school_data->school_code;
        $this->school_no = $this->school_data->school_no;
        $this->school_type = $this->school_data->school_type;
    }

    public function fetch_department()
    {
        $this->department_data = Department::find($this->department_id);
        $this->dept_title = $this->department_data->dept_title;
        $this->dept_code = $this->department_data->dept_code;
        $this->dept_no = $this->department_data->dept_no;
    }

    public function fetch_program()
    {
        $this->program_data = Program::find($this->program_id);
        $this->pro_title = $this->program_data->pro_title;
        $this->pro_code = $this->program_data->pro_code;
        $this->pro_no = $this->program_data->pro_no;
    }

    public function updateSchool()
    {
        $data =   $this->validate([
            'school_title'         => 'required|max:50|min:3|regex:/^[a-zA-Z ]*$/',
            'school_code'          => 'required|alpha|max:8|min:3',
            'school_no'            => 'required|numeric|max:8',
            // 'school_type'          => 'required',
          ]);
          
          School::find($this->school_id)->update($data);
          $this->dispatchBrowserEvent('notify', 'Record Updated');
    }

    public function update_department()
    {
        $data =   $this->validate([
            'school_id'         => 'required',
            'dept_title'        => 'required|regex:/^[a-zA-Z ]*$/',
            'dept_code'         => 'required|alpha|max:8|min:3',
            'dept_no'           => 'required|digits:2',
          ]);

        Department::find($this->department_id)->update([
            'dept_title' => $this->dept_title,
            'dept_code' => $this->dept_code,
            'dept_no' => $this->dept_no,
             ]);
        $this->dispatchBrowserEvent('notify', 'Record Updated');
    }

    public function update_program()
    {
        $data = $this->validate([
            'school_id'       => 'required',
            'department_id'   => 'required',
            'pro_title'        => 'required|regex:/^[a-zA-Z ]*$/',
            'pro_code'         => 'required||regex:/^[a-zA-Z]*$/|min:2|max:8',
            
        ]);

        Program::find($this->department_id)->update([
            'pro_title' => $this->pro_title,
            'pro_code' => $this->pro_code            
        ]);
        $this->dispatchBrowserEvent('notify', 'Record Updated');
    }

    public function mount()
    {        
        $this->faculty = DepartmentUser::whereUserId(Auth::id())->first(); 
        // get the courses for the programme  
        // $this->dept = Department::with('school')->whereId($this->faculty->department_id)->first(); 
        $this->departments = Department::with('programs')->whereId($this->faculty->department_id)->get();
        // dd($this->dept->school->id);
        // $this->faculities = School::whereId($this->dept->school_id)->get();   
         
    }

    public function render()
    {
        return view('livewire.department-cordinator.create-fac-dept-prog-course');
    }
}
