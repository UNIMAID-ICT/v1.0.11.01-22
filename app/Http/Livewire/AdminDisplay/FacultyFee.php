<?php

namespace App\Http\Livewire\AdminDisplay;

use App\Models\Fee;
use Livewire\Component;

class FacultyFee extends Component
{
    protected $listeners = ['fee_set' => '$refresh'];

    public $schID;

    public $edit_fee_modal = false;

    public $recID;

    public $amount;

    public function removeFee($id)
    {
        Fee::find($id)->delete();

    }

    public function open_amount_modal($id){
        $this->recID = $id;
        $amountF = Fee::find($id);
        $this->amount = $amountF->amount;
        $this->edit_fee_modal = true;
    }

    public function updateFee(){

        $amount = $this->validate([
            'amount'  => 'required',
        ]);

        Fee::find($this->recID)->update($amount);

        $this->emit('fee_set');
        $this->dispatchBrowserEvent('notify', 'Update was Successfull');
    }

    public function done(){
        $this->edit_fee_modal = false;

        $this->amount = '';

        // dd($course_id);
    }

    public function mount($id){

        $this->schID = $id;
    }

    public function render()
    {
        return view('livewire.admin-display.faculty-fee', ['fees' => Fee::whereSchoolId($this->schID)->get()]);
    }
}
