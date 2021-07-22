<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use App\Models\Role;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

use function PHPUnit\Framework\isNull;

class GenerateStudentPassword extends Component
{
    protected $listeners = ['refreshTransactions' => '$refresh', 'generated' => '$refresh'];

    public $search;

    public $student_account;

    public $department;

    public $student_department;

    public $get_departments;


    public $showFilters;

    public $showEditModal = false;

    public $showDeleteModal = false;

    // public function generated(){

    //     $this->releaseBtn = false;
    // }

    public function generatePassword()
    {
        $this->validate([

            'department'     => 'required',

          ]);



        $students = Student::whereDepartmentId($this->student_department)->get();


        if($students){

           foreach($students as $student){

            DB::transaction(function () use($student) {

                 User::upsert([
                    'name' => $student->student_id_number,
                    'password' => Hash::make($student->student_id_number),
                ], ['name'], ['name'] , ['password']);

                //$roles = Role::find(13);

                $user = User::whereName($student->student_id_number)->first();

                $user ? Student::find($student->id)->update(['status_password' => 1]) : $user->roles()->attach($roles) ;

        });


                $this->emit('generated');

                $this->department = "";

                $this->render();

                $this->dispatchBrowserEvent('notify', 'Password Generated Successful');

            }

            }else{

            $this->dispatchBrowserEvent('notify', 'Student list not loaded');
        }

    }

    public function updatedDepartment($value){

        if($value != 'Select Department'){

            $this->resetValidation();
            $this->student_department = $value;

        }

    }


    public function render()
    {
        $this->get_departments =  Department::all();

        return view('livewire.admin.generate-student-password', ['students' => Student::whereDepartmentId($this->student_department)->whereStatusPassword(0)->get()]);
    }
}
