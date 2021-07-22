<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DepartmentSchool extends Pivot
{
    use HasFactory;

    // public function department($school_id)
    // {        
    //     return $this->belongsTo(Applicant::class, 'applicant_id');
    // }
     
}
