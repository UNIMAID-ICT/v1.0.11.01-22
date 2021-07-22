<?php

namespace App\Http\Livewire\Student;

use App\Http\Traits\FeeTrait;
use App\Models\Exam;
use App\Models\Fee;
use App\Models\School;
use App\Models\Student;
use Livewire\Component;

class CheckFee extends Component
{
    use FeeTrait;

    public $student_id;

    public $selected_department;

    public $user;

    public $country;

    public $faculty_id;

    public $department_id;

    public $for_all_student_fees;

    public $for_all_student_fees_sum = 0;

    public $for_all_new_fees;

    public $for_all_new_fees_sum = 0;

    public $for_all_student_departmental_fees;

    public $total_for_all_student_departmental_fees = 0;

    public $for_all_student_gsts;

    public $for_all_student_foreign;

    public $gst331Fee = 0;

    public $gst331CoFee = 0;

    public $gstResults = [];

    public $gstResultLevels = [];

    public $gstFee = 0;

    public $gstCarryOverFee = 0;

    public $student;

    public $school;

    public $foreignTotal = 0;

    public $returingStd;

    public $minus;

    public $total_all_std_all_level = 0;

    public $pay_fee_modal = false;

    public $academic_session;


    public function updatedSelectedDepartment($value)
    {

        $std = Student::find($this->student->id)->update(['level' => $value]);

        // dd($std);

        $this->reset(['total_all_std_all_level',
                       'foreignTotal',
                       'gstCarryOverFee',
                       'gstFee',
                       'gst331CoFee',
                       'foreignTotal',
                       'for_all_new_fees_sum',
                       'for_all_student_foreign',
                       'for_all_student_fees',
                       'for_all_student_fees_sum',
                       'for_all_student_gsts',
                       'total_for_all_student_departmental_fees',
        ]);

        // $this->student = Student::whereStudentIdNumber($this->student->id)->first();

        if($this->student){

            $this->faculty_id = $this->student->department->school_id;

            $this->school = School::whereId($this->faculty_id)->first(['school_title']);

            $this->department_id = $this->student->department->id;

            $studentEntry = substr($this->student->student_id_number, 0 , 2);

            // dd($this->academic_session. '=='  .$studentEntry);
            if($this->academic_session ==  $studentEntry){

                $this->returingStd = 'NEW';

                $this->newStudent();

                $this->for_all_Student_all_level_fees();

                $this->total_all_std_all_level =  $this->total_all_std_all_level + $this->for_all_new_fees_sum;

            }else{

                $this->returingStd = 'RETURING';

                if(($this->student->level == 300)){

                    $this->gst331Fee = 1000;

                }

                $this->returningStudent($this->student->id);
            };
        }

    }

    public function updatedCountry($value)
    {

        $std = Student::find($this->student->id)->update(['country' => $value]);

        // dd($std);
        // dd($std);

        $this->reset(['total_all_std_all_level',
                       'foreignTotal',
                       'gstCarryOverFee',
                       'gstFee',
                       'gst331CoFee',
                       'foreignTotal',
                       'for_all_new_fees_sum',
                       'for_all_student_foreign',
                       'for_all_student_fees',
                       'for_all_student_fees_sum',
                       'for_all_student_gsts',
                       'total_for_all_student_departmental_fees',
        ]);

        // $this->student = Student::whereStudentIdNumber($this->student->id)->first();

        if($this->student){

            $this->faculty_id = $this->student->department->school_id;



            $this->school = School::whereId($this->faculty_id)->first(['school_title']);

            $this->department_id = $this->student->department->id;

            $studentEntry = substr($this->student->student_id_number, 0 , 2);

            // dd($this->academic_session. '=='  .$studentEntry);
            if($this->academic_session ==  $studentEntry){

                $this->returingStd = 'NEW';

                $this->newStudent();

                $this->for_all_Student_all_level_fees();

                $this->total_all_std_all_level =  $this->total_all_std_all_level + $this->for_all_new_fees_sum;

            }else{

                $this->returingStd = 'RETURING';

                if(($this->student->level == 300)){

                    $this->gst331Fee = 1000;

                }

                $this->returningStudent($this->student->id);
            };
        }

    }

    public function getStudent(){

        $this->reset(['total_all_std_all_level',
                       'foreignTotal',
                       'gstCarryOverFee',
                       'gstFee',
                       'gst331CoFee',
                       'foreignTotal',
                       'for_all_new_fees_sum',
                       'for_all_student_foreign',
                       'for_all_student_fees',
                       'for_all_student_fees_sum',
                       'for_all_student_gsts',
                       'total_for_all_student_departmental_fees',
        ]);


        if($this->student){

            $this->faculty_id = $this->student->department->school_id;

            $this->school = School::whereId($this->faculty_id)->first(['school_title']);

            $this->department_id = $this->student->department->id;

            $studentEntry = substr($this->student->student_id_number, 0 , 2);

            // dd($this->academic_session. '=='  .$studentEntry);
            if($this->academic_session ==  $studentEntry){

                $this->returingStd = 'NEW';

                $this->newStudent();

                $this->for_all_Student_all_level_fees();

                $this->total_all_std_all_level =  $this->total_all_std_all_level + $this->for_all_new_fees_sum;

            }else{

                $this->returingStd = 'RETURING';

                if(($this->student->level == 300)){

                    $this->gst331Fee = 1000;

                }

                $this->returningStudent($this->student->id);
            }

             // Hod View for fee
        }
    }

    public function render()
    {
        if($this->student_id){
            $this->student = Student::whereStudentIdNumber($this->student_id)->first();
            $this->getStudent();
        }

       return view('livewire.student.check-fee');
    }

    // calculs new students
    public function newStudent(){

        $this->for_all_new_fees = Fee::whereSchoolId($this->faculty_id)->whereLevel($this->student->level)->where('student_type', 'New')->get();

        foreach ($this->for_all_new_fees as $amount) {

            $this->for_all_new_fees_sum = $this->for_all_new_fees_sum + $amount->amount;

        }
    }

    public function returningStudent($studentId)
    {
        $gstExamResults = Exam::whereStudentId($studentId)->whereRemark('FAIL')->get();

        foreach ($gstExamResults as $result) {

            $this->gstResults[] =  $result->course_id;

            // if the stu has proceed to level 300 with carry over of gst

            if(($result->course_id == 4178)){

                $this->gst331CoFee = 1000;

            }


            if(($this->student->level >= 300) && ($result->course_id != 4178)){

                $this->gstCarryOverFee = 1000;

            }else{

                 $this->total_all_std_all_level =  $this->total_all_std_all_level + $this->for_all_new_fees_sum;
            }
        }


        // dd($this->gstResults);
        // foreach($this->gstResults as $courseId){
        //     dd($courseId);
        //     $courseDept = CourseDepartment::whereCourseId($courseId)->first();
        //     $this->gstResultLevels[] = $courseDept->level;
        // }
        // dd($this->gstResultLevels);

        $this->for_all_Student_all_level_fees();
    }

    // Get the students nationality
    public function nationality(){

        if ($this->student->country != 'Nigeria') {

            $this->for_all_student_foreign = Fee::whereSchoolId($this->faculty_id)->whereLevel('All')->where('student_type', 'Foreign')->first();

            $this->foreignTotal =  $this->for_all_student_foreign->amount;

        }
    }

    // calculate fees that applies for all students for all levels  and Gst for student @ there respective levels (faculty wise)
    public function for_all_Student_all_level_fees(){

            $this->for_all_student_fees = Fee::whereSchoolId($this->faculty_id)->whereLevel('All')->where('student_type', 'All')->get();

            if($this->returingStd == 'NEW'){

                $this->for_all_student_gsts = Fee::whereSchoolId($this->faculty_id)->whereLevel($this->student->level)->where('student_type', 'All')->get();

                    if ($this->for_all_student_gsts) {

                        foreach ($this->for_all_student_gsts as $amount) {

                        $this->gstFee = $this->gstFee + $amount->amount;

                    }
                }
            }

            else{

                $this->for_all_student_gsts = Fee::whereSchoolId($this->faculty_id)->whereLevel($this->student->level)->where('student_type', 'All')->get();

                    if ($this->for_all_student_gsts) {

                        foreach ($this->for_all_student_gsts as $amount) {

                        $this->gstFee = $this->gstFee + $amount->amount;
                    }
                }
            }

            foreach ($this->for_all_student_fees as $amount) {

                $this->for_all_student_fees_sum = $this->for_all_student_fees_sum + $amount->amount;

            }

            $this->nationality();

            $this->for_all_student_departmental_fees = Fee::whereSchoolId($this->faculty_id)->whereLevel('All')->whereDepartmentId($this->department_id)->get();

            if($this->for_all_student_departmental_fees) {

                foreach ($this->for_all_student_departmental_fees as $dept) {

                    $this->total_for_all_student_departmental_fees =  $this->total_for_all_student_departmental_fees +  $dept->amount;
                }
            }

            // dd($this->department_id);
            $this->add_minus();

           $this->total_all_std_all_level = $this->gstFee + $this->for_all_student_fees_sum +

           $this->foreignTotal + $this->total_for_all_student_departmental_fees + $this->gstCarryOverFee + $this->gst331CoFee - $this->minus;
    }
}
