<?php

namespace App\Http\Livewire\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Models\Assets;
use App\Models\Department;
use App\Models\DepartmentUser;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateUser extends Component
{
    protected $listeners = ['updated' => '$refresh'];

     public $user_type;
     public $user_faculty;
     public $user_role;
     public $cor_level;
     public $name;
     public $email;
     public $school_id;
     public $department;
     public $departments;
     public $password;
     public $password_confirmation;

     public $change_password = true;
     public $user_check = false;

     public $role = [];

    public function rules(){
        return [
        'name' => 'required',
        'email' => 'email',
        'role' => 'required',
        'school_id' => 'required',
        'department' => 'required',
        'cor_level' => 'filled',
        'password' => 'required',
        'password_confirmation' => 'required',

        ];
    }

    public function done(){
        $this->change_password = false;
    }

    public function updatedSchoolId($value){
        $this->departments = Department::whereSchoolId($value)->get();
    }

    public function save_new_user()
    {

        DB::transaction(function(){

            $newUser = new CreateNewUser();
            $user = $newUser->create(['name'=> $this->name, 'email' => $this->email, 'password' => $this->password, 'password_confirmation' => $this->password_confirmation]);


            $user->roles()->sync($this->role);

            if(($this->user_type === 'VC')){

                $this->validate([
                    'user_type' => 'required|in:'.collect(Assets::USER_TYPE)->keys()->implode(','),
                    'role' => 'required',
                ]);

                $this->dispatchBrowserEvent('notify', 'VICE-CHANCELLOR CREATED');

            }elseif(($this->user_type === 'FACULTY REPRESENTATIVE') || ($this->user_type === 'DEAN')){

                $this->validate([
                    'school_id' => 'required',
                    'user_type' => 'required|in:'.collect(Assets::USER_TYPE)->keys()->implode(','),
                    'role' => 'required',
                ]);

                $user->schools()->sync($this->school_id);

                $this->dispatchBrowserEvent('notify', 'FACULTY USER CREATED');

            }else{


                $this->validate([

                    'user_type' => 'required|in:'.collect(Assets::USER_TYPE)->keys()->implode(','),
                    'department' => 'required',
                    'role' => 'required',
                    'cor_level' => ['required_if:user_type,DEPARTMENT CORDINATOR']
                ]);


                $user->departments()->sync($this->department);

                if($this->user_type === 'DEPARTMENT CORDINATOR'){
                    DepartmentUser::whereUserId($user->id)->update(['cor_level' => $this->cor_level]);
                }


                $this->dispatchBrowserEvent('notify', 'DEPARTMENT USER CREATED');
            }
        });

        $this->reset();
    }

    public function getRole($role_id)
    {
        $this->user_role = $role_id;
    }

    public function render(){
        // $this->user_check->created_at == $this->user_check->updated_at ? $this->change_password = true : $this->change_password = false;
        // if($this->user_type === 'FACULTY REPRESENTATIVE'){

        //     $this->department = null;

        // }else{

        //     $this->departments = Department::whereSchoolId($this->school_id)->get();
        // }

        return view('livewire.admin.create-user', ['roles' => Role::all()]);
    }
}
