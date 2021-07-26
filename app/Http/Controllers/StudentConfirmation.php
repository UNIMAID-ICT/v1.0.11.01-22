<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use App\Models\Student;
use App\Models\StudentToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentConfirmation extends Controller
{
    function getData(){
        return [
            "name" => "Buzax"
        ];
    }

    function getResponse(Request $req){

        $start_session = Academic::whereStatus('active')->first();

        // $stdId = User::whereId(auth()->id())->first();

        // $std = Student::whereStudentIdNumber($stdId->name)->first();


        $confirmation = new StudentToken;
        $confirmation->academic_id = $start_session->id;
        $confirmation->rrr = $req->rrr;
        $confirmation->channel = $req->channel;
        $confirmation->amount = $req->amount;
        $confirmation->transactiondate = $req->transactiondate;
        $confirmation->debitdate = $req->debitdate;
        $confirmation->bank = $req->bank;
        $confirmation->branch = $req->branch;
        $confirmation->serviceTypeId = $req->serviceTypeId;
        $confirmation->dateRequested = $req->dateRequested;
        $confirmation->orderRef = $req->orderRef;
        $confirmation->payerName = $req->payerName;
        $confirmation->payerPhoneNumber = $req->payerPhoneNumber;
        $confirmation->payerEmail = $req->payerEmail;
        $confirmation->uniqueIdentifier = $req->uniqueIdentifier;

        $result = $confirmation->save();

        if($result){
            return ["Result" => "Data saved"];
        }else{
            return ["Result" => "Error in saving data"];
        }


    }
}
