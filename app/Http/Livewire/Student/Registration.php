<?php

namespace App\Http\Livewire\Student;

use App\Models\Department;
use App\Models\NextOfKin;
use App\Models\Program;
use App\Models\School;
use App\Models\Sponsor;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Registration extends Component
{
    use WithFileUploads;

    public $program_id;
    public $fac_dept;
    public $studentIdentification;
    public $stdId;
    // public $type;

    public $student_id;
    public $title;
    public $next_title;
    public $spon_title;

    public $fullname;
    public $next_fullname;
    public $spon_fullname;


    public $gender;
    public $next_gender;
    public $spon_gender;

    public $telephone;
    public $next_telephone;
    public $spon_telephone;

    public $email;
    public $student_photo;
    public $photo;
    public $nin;
    public $date_of_birth;
    public $country;
    public $state;
    public $lga;

    public $address;
    public $next_address;
    public $spon_address;

    public $blood_group;
    public $disability;
    public $medical_condition;
    public $level;

    public $next_rec;
    public $spon_record;
    public $validated_next_record;
    public $validated_spon_record;

    // public $subsidiaries;
    // public $all_sub_selected;
    // public $sub_selected = [];



    public function updatedStudentPhoto(){
        $this->validate(['student_photo' => 'required|image|max:20']);
    }

    public function updateBio(){

        $this->student_id = $this->stdId->id;
        // $uploadphoto = $this->student_photo->store('photos', 'public');

        $validatedData = $this->validate([
            'title'                => 'nullable',
            'fullname'             => 'required|required|regex:/^[a-zA-Z ]*$/',
            'gender'               => 'nullable',
            'telephone'            => 'required|starts_with:0|digits:11|different:nin',
            'email'                => ['required', 'string', 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', 'max:255', ],
            // 'student_photo'        => 'required|image|max:20',
            'nin'                  => 'nullable|digits:11',
            'date_of_birth'        => 'nullable|date',
            'country'              => 'required',
            'state'                => 'required_if:country,Nigeria',
            'lga'                  => 'required_if:country,Nigeria',
            'address'              => 'required|regex:/^[a-zA-Z0-9,. ]*$/',
            'blood_group'          => 'nullable',
            'disability'           => 'nullable',
            'medical_condition'    => 'nullable|alpha',
        ]);


        // $this->photo = $uploadphoto;

       Student::find($this->student_id)->update([
            'title'                =>$this->title,
            'fullname'             =>$this->fullname,
            'gender'               =>$this->gender,
            'telephone'            =>$this->telephone,
            'email'                =>$this->email,
            // 'photo'                =>$this->photo,
            'nin'                  =>$this->nin,
            'date_of_birth'        =>$this->date_of_birth,
            'country'              =>$this->country,
            'state'                =>$this->state,
            'lga'                  =>$this->lga,
            'address'              =>$this->address,
            'blood_group'          =>$this->blood_group,
            'disability'           =>$this->disability,
            'medical_condition'    =>$this->medical_condition,
       ]);

    }

    public function validateSponsor(){
        $this->student_id = $this->stdId->id;
        return  $this->validate([

            'student_id'                => 'nullable',
            'spon_title'                => 'nullable',
            'spon_fullname'             => 'required|regex:/^[a-zA-Z ]*$/',
            'spon_gender'               => 'required',
            'spon_telephone'            => 'required|starts_with:0|digits:11|different:nin',
            'spon_address'              => 'required|regex:/^[a-zA-Z0-9,. ]*$/',

        ]);
    }

    public function validateNext(){
        $this->student_id = $this->stdId->id;
        return  $this->validate([
            'student_id'                => 'nullable',
            'next_title'                => 'nullable',
            'next_fullname'             => 'required|regex:/^[a-zA-Z ]*$/',
            'next_gender'               => 'required',
            'next_telephone'            => 'required|starts_with:0|digits:11|different:nin',
            'next_address'              => 'required|regex:/^[a-zA-Z0-9,. ]*$/',

        ]);
    }

    public function mount(){


    }

    public function updateRecord(){

        DB::transaction(function () {

            $this->updateBio();

            $this->validated_next_record = $this->validateNext();
            $this->validated_spon_record = $this->validateSponsor();


            if($this->next_rec != null){
                NextOfKin::whereStudentId($this->student_id)->update($this->validated_next_record);
            }else{
                NextOfKin::create($this->validated_next_record);
            }

            if($this->spon_record != null){
                Sponsor::whereStudentId($this->student_id)->update($this->validated_spon_record);
            }else{
                Sponsor::create($this->validated_spon_record);
            }

            $this->dispatchBrowserEvent('notify', 'Record Updated');

        });
    }

    public function getStudentData($student){

        $this->student_id = $student->id;
        $this->studentIdentification =  $student->student_id_number;
        $this->title = $student->title;
        $this->fullname = $student->fullname;
        $this->gender = $student->gender;
        $this->telephone = $student->telephone;
        $this->email = $student->email;
        $this->photo = $student->photo;
        $this->nin = $student->nin;
        $this->date_of_birth = $student->date_of_birth;
        $this->country = $student->country;
        $this->state = $student->state;
        $this->lga = $student->lga;
        $this->address = $student->address;
        $this->blood_group = $student->blood_group;
        $this->disability = $student->disability;
        $this->medical_condition = $student->medical_condition;
        $this->level = $student->level;
    }

    public function getNextData(){
        $next = NextOfKin::whereStudentId($this->stdId->id)->first();
        $this->next_rec = $next;
        if($next){
            $this->next_title = $next->next_title;
            $this->next_fullname = $next->next_fullname;
            $this->next_gender = $next->next_gender;
            $this->next_telephone = $next->next_telephone;
            $this->next_address = $next->next_address;
        }
    }

    public function getSponsorData(){
         $sponsor = Sponsor::whereStudentId($this->stdId->id)->first();
         $this->spon_record = $sponsor;
        if($sponsor){
            $this->spon_title = $sponsor->spon_title;
            $this->spon_fullname = $sponsor->spon_fullname;
            $this->spon_gender = $sponsor->spon_gender;
            $this->spon_telephone = $sponsor->spon_telephone;
            $this->spon_address = $sponsor->spon_address;
        }
    }

    public function render(){
        $this->stdId = Student::whereUserId(Auth::id())->first();
        $sch_id = Department::whereId($this->stdId->department_id)->first();

        // dd($this->stdId->department_id);
        // $subCourses = CourseDepartment::whereDepartmentId($this->stdId->department_id)->first();

        $this->subsidiaries = Department::with(['courses' => function($query){
            $query->whereDepartmentId($this->stdId->department_id);
        }])->get();

        // dd($this->subsidiaries);

        $this->fac_dept = School::with(['departments' => function($query){
            $query->whereId($this->stdId->department_id);
        }])->whereId($sch_id->school_id)->get();

        $this->getStudentData($this->stdId);
        $this->getNextData();
        $this->getSponsorData();
        return view('livewire.student.registration');
    }
}
